
<?php include '../includes/navbar.php'; ?>
<body>

<div class="py-10">
    <div class="w-full flex flex-col justify-center items-center mb-5py-5 ">
        <h2 class="text-2xl font-bold">All Event Archive</h2>
        <p class="font-light">Let see whats trending</p>
    </div>


    <div class="filter py-5"> 
        <div class="flex justify-center items-center py-5">
            <input class="form-control border-end-0 border w-1/3 py-3 px-10 rounded-xl outline-none " type="search" id="searchInput" class="form-control" placeholder="Search by here .....">
        </div>
    </div>


    <!-- Pagination -->
    <div class="pagination flex justify-center items-center py-5">
        <button id="prevEventPageBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&lt;</button>
        <span id="eventPageInfo" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
        <span id="eventPageList" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
        <button id="nextEventPageBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&gt;</button>
    </div>
</div>

<!-- Rest of the content -->

<script>
$(document).ready(function() {
    const eventsContainer = $('.events');
    const prevEventPageBtn = $('#prevEventPageBtn');
    const nextEventPageBtn = $('#nextEventPageBtn');
    const eventPageInfo = $('#eventPageInfo');
    const eventPageList = $('#eventPageList');
    const searchInput = $('#searchInput');

    const events = <?php echo json_encode($events); ?>;
    const itemsPerPage = 3;
    let currentEventPage = 1;
    
    // Function to display events for a specific page
    function showEvents(page, data) {
        eventsContainer.empty();

        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        
        for (let i = startIndex; i < endIndex && i < data.length; i++) {
    const event = data[i];
    const eventDiv = document.createElement('div');
    eventDiv.className = 'flex flex-col justify-center items-center mb-5';

    const eventStartDate = new Date(event.event_date);
    const currentDate = new Date();
    const interval = eventStartDate - currentDate;

    const remainingDays = eventStartDate > currentDate ? Math.floor(interval / (1000 * 60 * 60 * 24)) : 0;
    const remainingHours = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) : 0;
    const remainingMinutes = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60 * 60)) / (1000 * 60)) : 0;
    const remainingSeconds = eventStartDate > currentDate ? Math.floor((interval % (1000 * 60)) / 1000) : 0;

    const status = eventStartDate > currentDate ? 'Remaining' : 'Passed';
    const statusColor = status === 'Passed' ? 'text-red-600 ' : 'text-gray-600';

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
                        <!-- Similar code for hours, minutes, and seconds -->
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

    eventsContainer.append(eventDiv);
}
    }

    // Function to update pagination UI
    function updateEventPagination() {
        const totalPages = Math.ceil(events.length / itemsPerPage);
        const pageLinks = [];

        for (let i = 1; i <= totalPages; i++) {
            pageLinks.push(i);
        }

        eventPageList.empty();

        pageLinks.forEach(page => {
            const link = $('<span></span>').addClass('p-[3px] rounded text-lg flex gap-2 cursor-pointer').text(page);

            if (page === currentEventPage) {
                link.addClass('active-btn');
            }

            link.on('click', function() {
                currentEventPage = page;
                showEvents(currentEventPage, events);
                updateEventPagination();
            });

            eventPageList.append(link);
        });
    }

    // Function to filter events based on search input
    function filterEvents(searchText, data) {
        if (!searchText) {
            return data;
        }

        return data.filter(event => {
            return event.title.toLowerCase().includes(searchText.toLowerCase()) ||
                event.event_desc.toLowerCase().includes(searchText.toLowerCase());
        });
    }

    // Function to update events based on search input
    function updateEventList(searchText) {
        const filteredEvents = filterEvents(searchText, events);
        currentEventPage = 1;
        showEvents(currentEventPage, filteredEvents);
        updateEventPagination();
    }

    // Live search input event handler
    searchInput.on('input', function() {
        const searchText = $(this).val();
        updateEventList(searchText);
    });

    // Initial page load
    showEvents(currentEventPage, events);
    updateEventPagination();

    prevEventPageBtn.on('click', function() {
        if (currentEventPage > 1) {
            currentEventPage--;
            showEvents(currentEventPage, events);
            updateEventPagination();
        }
    });

    nextEventPageBtn.on('click', function() {
        const totalPages = Math.ceil(events.length / itemsPerPage);
        if (currentEventPage < totalPages) {
            currentEventPage++;
            showEvents(currentEventPage, events);
            updateEventPagination();
        }
    });
});
</script>
