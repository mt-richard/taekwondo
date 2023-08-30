<?php include '../includes/navbar.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $news = $db->getEvents('events', 'event_date', 'ASC');
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
        <div class="w-full flex flex-col justify-center items-center mb-5 py-5">
            <h2 class="text-2xl font-bold">All Event Archive</h2>
            <p class="font-light">Let's see what's trending</p>
        </div>
                <div class="w-full mb-2 p-5 rounded flex items-center justify-center">
                    <form action="">
                        <input type="search" id="liveSearch" class="outline-none focus:border-blue-400 w-100 bg-white border rounded-lg px-10 py-4" placeholder="Search here ..">
                    </form>
                </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="w-full grid md:flex gap-2 justify-center">
            <div class=" flex flex-col">
                <div id="newsContainer" class="newslist  md:py-10">
                </div>
                <div class="pagination flex justify-center items-center py-5">
                    <div class="flex gap-1">
                        <button id="prevBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&lt;</button>
                        <button id="pageInfo" class="hidden p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</button>
                        <button id="pageList" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</button>
                        <button id="nextBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&gt;</button>
                    </div>
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

    const itemsPerPage = 10;
    let currentPage = 1;

    function showNews(page, data) {
    newsContainer.empty();
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, data.length);

    for (let i = startIndex; i < endIndex; i++) {
        const newsItem = data[i];
        const eventStartDate = new Date(newsItem.event_date);
        const currentDate = new Date();
        const interval = eventStartDate - currentDate;

        const remainingDays = eventStartDate > currentDate ? Math.floor(interval / (1000 * 60 * 60 * 24)) : 0;
        const remainingHours = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) : 0;
        const remainingMinutes = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60)) : 0;
        const remainingSeconds = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60)) / 1000) : 0;

        const status = eventStartDate > currentDate ? 'Remaining' : 'Passed';
        const statusColor = status === 'Passed' ? 'text-red-600' : 'text-gray-600';

        const newsCard = `
        <div class=" w-full flex flex-col justify-center items-center mb-5">
                <div class="w-full md:w-full lg:w-4/5 xl:w-4/5 bg-blue-400">
                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                        <div class="image-container md:w-1/2 lg:w-1/3 pb-5 md:pb-0">
                            <img src="${newsItem.photo.substring(3)}" alt="" class=" rounded w-full h-60 md:h-96 object-cover">
                        </div>
                        <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center">
                            <div class="flex gap-2 md:gap-5">
                                <div>
                                    <h2 class="text-white capitalize">days</h2>
                                    <h1 id="days-${newsItem.id}" class="bg-gray-950 text-white px-5 py-3">${remainingDays}</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">hr</h2>
                                    <h1 id="hours-${newsItem.id}" class="bg-gray-950 text-white px-5 py-3">${remainingHours}</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">min</h2>
                                    <h1 id="minutes-${newsItem.id}" class="bg-gray-950 text-white px-5 py-3">${remainingMinutes}</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">sec</h2>
                                    <h1 id="seconds-${newsItem.id}" class="bg-gray-950 text-white px-5 py-3">${remainingSeconds}</h1>
                                </div>
                                <h2 class="md:px-10 py-2 font-bold text-2xl capitalize ${statusColor}">${status}</h2>
                            </div>
                            <div class="md:py-5">
                                <h2 class="text-white font-bold py-3 text-4xl">${newsItem.title}</h2>
                                <p class="text-white font-light">${newsItem.event_desc}</p>
                            </div>
                            <div class="pt-5 flex justify-between ">
                                <button class="border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                                <h2 class="text-gray-800 leading-8 font-bold flex justify-center px-5 py-2 border-2 border-yellow-300"><span class="font-light">Venue Details :</span> ${newsItem.venue}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        newsContainer.append(newsCard);

        // Call the updateCountdown function immediately
        updateCountdown(newsItem.id, eventStartDate);

        // Set interval to update countdown every second
        setInterval(() => {
            updateCountdown(newsItem.id, eventStartDate);
        }, 1000);
    }

    if (data.length === 0) {
        newsContainer.append('<p>No event found.</p>');
    }
}

function updateCountdown(newsItemId, eventStartDate) {
    const now = new Date();
    const timeRemaining = eventStartDate - now;

    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    const daysElement = document.getElementById(`days-${newsItemId}`);
    const hoursElement = document.getElementById(`hours-${newsItemId}`);
    const minutesElement = document.getElementById(`minutes-${newsItemId}`);
    const secondsElement = document.getElementById(`seconds-${newsItemId}`);

    if (eventStartDate > now) {
        daysElement.textContent = days;
        hoursElement.textContent = hours;
        minutesElement.textContent = minutes;
        secondsElement.textContent = seconds;
    } else {
        daysElement.textContent = '00';
        hoursElement.textContent = '00';
        minutesElement.textContent = '00';
        secondsElement.textContent = '00';
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
            const descMatches = newsItem.event_desc.toLowerCase().includes(searchText.toLowerCase());
            const venueMatches = newsItem.venue.toLowerCase().includes(searchText.toLowerCase());
            const dateMatches = newsItem.event_date.toLowerCase().includes(searchText.toLowerCase());
            return titleMatches || descMatches || venueMatches || dateMatches;
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


