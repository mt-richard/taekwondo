<?php 
    include '../includes/navbar.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $events = $db->getEvents('events', 'event_date', 'ASC');
    }
?>
<body>

<div class="py-10">
    <div class="w-full flex flex-col justify-center items-center mb-5 py-5">
        <h2 class="text-2xl font-bold">All Event Archive</h2>
        <p class="font-light">Let's see what's trending</p>
    </div>

    <div class="filter py-5"> 
        <div class="flex justify-center items-center py-5">
            <input class="form-control border-end-0 border w-1/3 py-3 px-10 rounded-xl outline-none" type="search" id="searchInput" placeholder="Search here ...">
        </div>
    </div>

    <div id="eventsContainer" class="events py-10">
        <!-- Events will be dynamically added here -->
    </div>

    <div class="pagination flex justify-between py-5">
        <span></span>
        <div class="flex gap-1">
            <button id="prevBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&lt;</button>
            <span id="pageInfo" class="hidden p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
            <span id="pageList" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
            <button id="nextBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer ">&gt;</button>
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>

<script>

$(document).ready(function() {
    const eventsContainer = $('#eventsContainer'); // Container for event cards
    const prevBtn = $('#prevBtn'); // Previous button
    const nextBtn = $('#nextBtn'); // Next button
    const pageInfo = $('#pageInfo'); // Page info (not used in this script)
    const pageList = $('#pageList'); // Page list for pagination

    const eventsData = <?php echo json_encode($events) ?>; // Event data from PHP

    const itemsPerPage = 3; // Number of events per page
    let currentPage = 1; // Current page

    function showEvents(page, data) {
        eventsContainer.empty(); // Clear the container
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        for (let i = startIndex; i < endIndex && i < data.length; i++) {
            const event = data[i];
            const eventDiv = document.createElement('div');
            eventDiv.className = 'flex flex-col justify-center items-center mb-5';
            eventDiv.innerHTML = `
                                    <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                                        <div class="md:flex gap-6 px-5 py-5 md:px-10">
                                            <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0">
                                                <img src="${event.photo.substring(3)}" alt="" class="rounded w-full h-96 object-cover">
                                            </div>
                                            <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center">
                                                <div class="flex gap-2 md:gap-5">
                                                    <div>
                                                        <h2 class="text-white capitalize">days</h2>
                                                        <h1 id="days-${event.id}" class="bg-gray-950 text-white px-5 py-3">${remainingDays}</h1>
                                                    </div>
                                                    <div>
                                                        <h2 class="text-white capitalize">hr</h2>
                                                        <h1 id="hours-${event.id}" class="bg-gray-950 text-white px-5 py-3">${remainingHours}</h1>
                                                    </div>
                                                    <div>
                                                        <h2 class="text-white capitalize">min</h2>
                                                        <h1 id="minutes-${event.id}" class="bg-gray-950 text-white px-5 py-3">${remainingMinutes}</h1>
                                                    </div>
                                                    <div>
                                                        <h2 class="text-white capitalize">sec</h2>
                                                        <h1 id="seconds-${event.id}" class="bg-gray-950 text-white px-5 py-3">${remainingSeconds}</h1>
                                                    </div>
                                                    <h2 class="md:px-10 py-2 font-bold text-2xl capitalize ${statusColor}">${status}</h2>
                                                </div>
                                                <div class="md:py-5">
                                                    <h2 class="text-white font-bold py-3 text-4xl">${event.title}</h2>
                                                    <p class="text-white font-light">${event.event_desc}</p>
                                                </div>
                                                <div class="pt-5">
                                                    <button class="border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                                eventContainer.appendChild(eventDiv);
        }

        // If no events found, show a message
        if (data.length === 0) {
            eventsContainer.append('<p>No events found.</p>');
        }
    }

    function updatePagination() {
        const totalPages = Math.ceil(eventsData.length / itemsPerPage);

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
                showEvents(currentPage, eventsData);
                updatePagination();
            });

            if ((page === currentPage) || (page === 'Last Page' && currentPage === totalPages)) {
                link.addClass('active-btn');
            }

            pageList.append(link);
        });
    }

    // Similar to your news filtering logic
    function filterEvents(searchText, data) {
        // Customize this function according to your event data structure
        const filteredEvents = data.filter(event => {
            const titleMatches = event.title.toLowerCase().includes(searchText.toLowerCase());
            const descriptionMatches = event.event_desc.toLowerCase().includes(searchText.toLowerCase());
            return titleMatches || descriptionMatches;
        });
        return filteredEvents;
    }

    function updateEventList(searchText) {
        const filteredEvents = filterEvents(searchText, eventsData);

        // Reset the page to 1 when filtering results in no events
        if (filteredEvents.length === 0) {
            currentPage = 1;
        }

        showEvents(currentPage, filteredEvents);
        updatePagination();
    }

    // Input event listener for live search
    $('#searchInput').on('input', function() {
        const searchText = $(this).val();
        updateEventList(searchText);
    });

    // Initial load of events and pagination
    showEvents(currentPage, eventsData);
    updatePagination();

    // Previous button click event
    prevBtn.on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showEvents(currentPage, eventsData);
            updatePagination();
        }
    });

    // Next button click event
    nextBtn.on('click', function() {
        if (currentPage < Math.ceil(eventsData.length / itemsPerPage)) {
            currentPage++;
            showEvents(currentPage, eventsData);
            updatePagination();
        }
    });
});

                       
</script>

</body>

  
                    <script>
                        
                       
</script>
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>