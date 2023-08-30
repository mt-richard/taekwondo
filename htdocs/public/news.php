
<?php include '../includes/navbar.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $news = $db->getAll('news');
    }
?>
<body>
    <style>
        .active-btn{
            background-color: #2563eb;
            padding-left: 8px;
            padding-right: 8px;
            border-radius: 3px;
            color: white;
        }
    </style>

<div>
    <div class="bg-gray-100 md:py-10">
        <div class="w-full flex flex-col justify-center items-center py-5">
            <h2 class="text-2xl font-bold">News List</h2>
            <p class="font-light">Let's see what's trending</p>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="w-full grid md:flex gap-2 justify-center">
            <div class="md:w-3/5 flex flex-col w-full">
                <div id="newsContainer" class="newslist grid md:grid-cols-2 lg:grid-cols-3 gap-5 md:py-10">
                </div>
                <div class="pagination flex justify-between items-center py-5">
                    <div class="flex gap-1">
                        <button id="prevBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&lt;</button>
                        <span id="pageInfo" class="hidden p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
                        <span id="pageList" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
                        <button id="nextBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&gt;</button>
                    </div>
                </div>
            </div>
            <div class="md:w-[350px] latest py-10">
                <div class="w-full mb-2 p-5 bg-white rounded">
                    <form action="">
                        <input type="search" id="liveSearch" class="outline-none focus:border-blue-400 w-full bg-white border rounded px-10 py-2" placeholder="Search here ..">
                    </form>
                </div>
                <div class="w-full mb-2 p-5 bg-white rounded">
                    <h2 class="text-xl font-bold pb-3">Categories</h2>
                    <ul>
                        <li class="font-light text-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>world champion</li>
                        <li class="font-light text-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>region champion</li>
                        <li class="font-light text-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>events</li>
                        <li class="font-light text-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>Competitions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>

<script>
$(document).ready(function() {
    const newsContainer = $('#newsContainer');
    const prevBtn = $('#prevBtn');
    const nextBtn = $('#nextBtn');
    const pageInfo = $('#pageInfo');
    const pageList = $('#pageList');

    const newsData = <?php echo json_encode($news)?>;

    const itemsPerPage = 12;
    let currentPage = 1;

    function showNews(page, data) {
        newsContainer.empty();
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        for (let i = startIndex; i < endIndex && i < data.length; i++) {
            const newsItem = data[i];
            const newsCard = `
                <div class="max-w-sm bg-white drop-shadow-xl rounded drop-shadow-xl newcard">
                    <a href="#">
                        <div>
                            <img class="w-full h-60 object-cover" src="${newsItem.photo.substring(3)}" alt="" />
                        </div>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${newsItem.title}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${newsItem.content.substr(0, 80)} ...</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </a>
                </div>
            `;
            newsContainer.append(newsCard);
        }
        
        if (data.length === 0) {
            newsContainer.append('<p>No news found.</p>');
        }
    }

    function updatePagination() {
        const totalPages = Math.ceil(newsData.length / itemsPerPage);

        const pageLinks = [];
        for (let i = 1; i <= Math.min(totalPages, 10); i++) {
            pageLinks.push(i);
        }

        if (totalPages > 10) {
            pageLinks.push('Last Page');
        }

        pageList.empty();
        pageLinks.forEach(page => {
            const link = $('<span></span>').addClass('p-[3px] rounded text-lg flex gap-2 cursor-pointer').text(page);
            link.on('click', function() {
                if (page === 'Last Page') {
                    currentPage = totalPages;
                } else {
                    currentPage = page;
                }
                showNews(currentPage, newsData);
                updatePagination();
            });

            if ((page === currentPage) || (page === 'Last Page' && currentPage === totalPages)) {
                link.addClass('active-btn');
            }

            pageList.append(link);
        });
    }

    function filterNews(searchText, data) {
        const filteredNews = data.filter(newsItem => {
            const titleMatches = newsItem.title.toLowerCase().includes(searchText.toLowerCase());
            const contentMatches = newsItem.content.toLowerCase().includes(searchText.toLowerCase());
            return titleMatches || contentMatches;
        });
        return filteredNews;
    }

    function updateNewsList(searchText) {
        const filteredNews = filterNews(searchText, newsData);

        if (filteredNews.length === 0) {
            currentPage = 1;
        }

        showNews(currentPage, filteredNews);
        updatePagination();
    }

    $('#liveSearch').on('input', function() {
        const searchText = $(this).val();
        updateNewsList(searchText);
    });

    showNews(currentPage, newsData);
    updatePagination();

    prevBtn.on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showNews(currentPage, newsData);
            updatePagination();
        }
    });

    nextBtn.on('click', function() {
        if (currentPage < Math.ceil(newsData.length / itemsPerPage)) {
            currentPage++;
            showNews(currentPage, newsData);
            updatePagination();
        }
    });
});
</script>
