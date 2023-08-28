
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

    

    <div class="events py-10">
        <div >

            <!-- event -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    include '../config/dbconnection.php';
                    $db = new dbconnection();
                    $events = $db->getEvents('events', 'event_date', 'ASC');
                    
                    
                    foreach ($events as $event) {
                        $eventStartDate = new DateTime($event['event_date']);
                        $currentDate = new DateTime();
                    
                        if ($eventStartDate <= $currentDate) {
                            $status = 'passed';
                            $data = [
                                'status' => $status
                            ];
                            $updateStatus = $db->update("events",$data,$event['id']);
                            // echo json_encode($updateStatus);
                        }
                    
                        
                        $interval = $eventStartDate->diff($currentDate);

                        $remainingDays = $eventStartDate > $currentDate ? $interval->d : 0;
                        $remainingHours = $eventStartDate > $currentDate ? $interval->h : 0;
                        $remainingMinutes = $eventStartDate > $currentDate ? $interval->i : 0;
                        $remainingSeconds = $eventStartDate > $currentDate ? $interval->s : 0;

                        $status = $eventStartDate > $currentDate ? 'Remaining' : 'Passed';
                        $statusColor = $status === 'Passed' ? 'text-red-600 ' : 'text-gray-600'; 
                        ?>
                        
                        <div class="flex flex-col justify-center items-center mb-5 ">
                            <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                                <div class="md:flex gap-6 px-5 py-5 md:px-10">
                                    <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                                        <img src="<?php echo substr($event['photo'], 3); ?>" alt="" class="rounded w-full h-96 object-cover">
                                    </div>
                                    <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                                        <div class="flex gap-2 md:gap-5">
                                            <div>
                                                <h2 class="text-white capitalize">days</h2>
                                                <h1 id="days-<?php echo $event['id']; ?>" class="bg-gray-950 text-white px-5 py-3"><?= $remainingDays ?></h1>
                                            </div>
                                            <div>
                                                <h2 class="text-white capitalize">hr</h2>
                                                <h1 id="hours-<?php echo $event['id']; ?>" class="bg-gray-950 text-white px-5 py-3"><?= $remainingHours ?></h1>
                                            </div>
                                            <div>
                                                <h2 class="text-white capitalize">min</h2>
                                                <h1 id="minutes-<?php echo $event['id']; ?>" class="bg-gray-950 text-white px-5 py-3"><?= $remainingMinutes ?></h1>
                                            </div>
                                            <div>
                                                <h2 class="text-white capitalize">sec</h2>
                                                <h1 id="seconds-<?php echo $event['id']; ?>" class="bg-gray-950 text-white px-5 py-3"><?= $remainingSeconds ?></h1>
                                            </div>
                                            <h2 class="md:px-10 py-2 font-bold text-2xl capitalize <?php echo $statusColor ?>"><?=  $status ?></h2>
                                        </div>
                                        <div class="md:py-5">
                                            <h2 class="text-white font-bold py-3 text-4xl" ><?php echo $event['title'];?></h2>
                                            <p class="text-white font-light"><?php echo $event['event_desc'];?></p>
                                        </div>
                                        <div class="pt-5">
                                            <button class="border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    }
                    ?>
                    <script>
                        const events = <?php echo json_encode($events); ?>;
                        
                        function updateCountdown(event) {
                            const eventStartDate = new Date(event.event_date);
                            const now = new Date();
                            const timeRemaining = eventStartDate - now;

                            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                            const daysElement = document.getElementById(`days-${event.id}`);
                            const hoursElement = document.getElementById(`hours-${event.id}`);
                            const minutesElement = document.getElementById(`minutes-${event.id}`);
                            const secondsElement = document.getElementById(`seconds-${event.id}`);

                        

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
                        
                        function updateAllCountdowns() {
                            events.forEach(event => {
                                updateCountdown(event);
                            });
                        }
                        
                        updateAllCountdowns();
                        setInterval(updateAllCountdowns, 1000);
                    </script>
                    <?php
                }
                ?>

        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>