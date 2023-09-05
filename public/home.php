<?php 
 include "../includes/navbar.php";
 $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $eventsurl = dirname($currentURL) . "/events";
?>

<style>
    .eventbanner {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.9)), url('../assets/images/52221968793_3490622dbb_b.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
       
  }
  
    .textcontent{
         white-space: pre-line;
    }
   
</style>

<body>
<!-- home banner -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $state= 'top';
    $limit = 3;
    $news = $db->getNews('news', $state, $limit);

    $slides = [];
    foreach ($news as $new) {
        $slide = [
            'image' => substr($new['photo'], 3),
            'title' => $new['title'],
            'content' => substr($new['content'], 0, 300)
        ];
        $slides[] = $slide;
    }
    $slidesJSON = json_encode($slides);
}
?>
<div class="w-full ">
    <div id="myDiv" class=" w-full mx-auto py-20 md:py-40 h-[150vh] md:h-[85vh] lg:h-[90vh] flex flex-col md:justify-center items-center">
       
        <div class="md:full lg:w-4/5 xl:w-3/5 md:flex md:justify-center items-center md:gap-20">
            <div class="slideshow-text md:w-2/3  px-5 py-0 md:py-10 mb-5  " >
            </div>
            <div class="relative w-full md:w-1/3 md:px-2 ">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                    $champion = $db->getChampion();
                    if ($champion){?>
                    <div class="absolute  z-1 w-full rounded-t ">
                        <h1 class="text-gray-100 py-3 font-bold uppercase text-xl"><?php echo $champion['period']; ?> &nbsp; Champion</h1>
                        <h1 class="absolute bg-gray-950 opacity-2 bottom-20 md:bottom-20 lg:bottom-20 left-0 md:px-5 md:py-3 p-3 flex justify-center text-white  font-bold text-xl uppercase flex flex-col"><?php echo $champion['name'];?> <span class="font-light text-[15px]"><?php echo $champion['title'];?></span></h1>
                        <img src="<?php echo substr($champion['photo'], 3); ?>" alt=""  class=" object-cover w-full  lg:h-[400px] h-100 md:h-96 rounded-t-xl">
                    </div>

               <?php  }  } ?>
            </div>
        </div>
    </div>
</div>

<script>
  // home slide
  window.addEventListener('DOMContentLoaded', function() {
    var slideshow = document.getElementById('myDiv');
    var textContainer = slideshow.querySelector('.slideshow-text');

    var slides = <?php echo $slidesJSON; ?>; 

    var currentIndex = 0;

    function changeSlide() {
        slideshow.style.backgroundPosition = '75% 25%';
        slideshow.style.backgroundSize = 'cover';
      slideshow.style.backgroundImage = `linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(${slides[currentIndex].image})`;
      textContainer.innerHTML = `
        <h1 class="text-left drop-shadow-xl text-white font-black text-2xl md:text-5xl pb-5">${slides[currentIndex].title}</h1>
        <p class="text-left text-white drop-shadow font-light text-sm md:text-lg xl:text-xl leading-6 md:leading-8 py-5">${slides[currentIndex].content} ...</p>
        <a href="<?php echo $contactUrl; ?>" type="button" class="bg-blue-500 px-6 rounded-3xl py-3 uppercase font-semibold text-white border-none outline-none hover:bg-white hover:text-blue-600 hover:shadow">get in touch</a>

      `;
      currentIndex = (currentIndex + 1) % slides.length;
    }

    changeSlide();
    setInterval(changeSlide, 5000);
  });
</script>

<!-- mission an dvission -->

<div>
    <div class=" md:grid grid-cols-2 lg:grid-cols-3 xl:flex justify-center md:gap-10 lg:gap-3 md:py-20 px-5">
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl mb-2">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-mission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Mission</h1>
            <p class="font-light leading-8 ">Develop and grow Taekwondo throughout the world, from a grass roots level all the way through to an elite level, to provide all with the opportunity to play, watch and enjoy the sport regardless of age, gender, religion, ethnicity or ability.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl mb-2">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-vission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Vission</h1>
            <p class="font-light leading-8 ">Taekwondo For All.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl mb-2">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-values-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our values</h1>
            <ul class="font-light leading-6">
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Inclusiveness</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Leadership</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Respect</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Tolerance</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Excellence</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Integrity</li>
            </ul>
        </div>

        <div class="md:w-full lg:w-full xl:w-2/5 px-10 py-10 flex justify-center items-center flex-col">
            <img src="../assets/images/banner_sarajevo_2023_wt_cadet_sub_230707.png" alt="">
            <h1 class="text-gray-800 font- text-center">Are you ready to showcase your talents and skills? Join us for an incredible opportunity to compete against the best and win amazing prizes!</h1>
        </div>
    </div>
</div>

<!-- upcoming event -->
<div class="relative bg-white pt-5">
        

             <!-- event -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $event = $db->getlatestEvent();
                    
                    if ($event) {
                        
                            $eventStartDate = new DateTime($event['event_date']); 
                            $currentDate = new DateTime();
                            $interval = $eventStartDate->diff($currentDate);

                            $remainingDays = $eventStartDate > $currentDate ? $interval->d : 0;
                            $remainingHours = $eventStartDate > $currentDate ? $interval->h : 0;
                            $remainingMinutes = $eventStartDate > $currentDate ? $interval->i : 0;
                            $remainingSeconds = $eventStartDate > $currentDate ? $interval->s : 0;

                            // $status = $eventStartDate > $currentDate ? 'Remaining' : 'Passed';
                            // $statusColor = $status === 'Passed' ? 'text-red-600' : 'text-gray-600'; 
                            if($eventStartDate > $currentDate ){
                                $status = 'Remaining';
                                $statusColor = "bg-gray-600";
                          }else if($eventStartDate < $eventCloseDate && $eventCloseDate > $currentDate){
                               $status = 'Ongoing';
                               $statusColor = "bg-green-600";
                          }else{
                               $status = 'Passed'; 
                               $statusColor = "bg-red-600";
                          }
                            ?>
                            
                            <div class="flex flex-col justify-center items-center mb-5">

                            <div class="bg-gray-600 py-5 px-2 md:px-10 absolute top-0 md:ml-[60%] ">
                                <h2 class="uppercase text-white font-light">upcoming event</h2>
                            </div>
                                <div class="w-full md:w-full lg:w-4/5 xl:w-4/5 2xl:w-3/5 bg-blue-400">
                                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                                        <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0">
                                            <img src="<?php echo substr($event['photo'], 3); ?>" alt="" class="rounded w-full h-96 object-cover">
                                        </div>
                                        <div class="md:w-2/3 md:px-5 py-5 flex flex-col justify-center"> 
                                            <div class="flex gap-2 md:gap-5 justify-between">
                                                <div class="flex gap-2 ">
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
                                                </div>
                                                <div class="bg-white flex items-center h-10 px-3 mt-6 <?php echo $statusColor; ?>">
                                                    <h2 class="md:text-xl capitalize  items-center text-white "><?php echo $status; ?></h2>
                                                </div>
                                            </div>
                                            <div class="md:py-5">
                                                <h2 class="text-white font-bold py-3 text-2xl tmd:ext-4xl"><?= $event['title']; ?></h2>
                                                <p class="text-white font-light"><?= $event['event_desc']; ?></p>
                                            </div>
                                            <div class="md:flex justify-between items-center">
                                                <button class="border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2 mb-2">join with us</button>
                                                <div class="h-[80%] text-[15px] md:text-normal text-gray-800 py-2 font-bold flex justify-center items-center px-3 border-2 border-yellow-300">
                                                    <span class="font-light">Venue Details :</span><span> <?= $event['venue']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function updateCountdown_<?php echo $event['id']; ?>() {
                                    const eventStartDate_<?php echo $event['id']; ?> = new Date('<?php echo $event['event_date']; ?>');
                                    const now_<?php echo $event['id']; ?> = new Date();
                                    const timeRemaining_<?php echo $event['id']; ?> = eventStartDate_<?php echo $event['id']; ?> - now_<?php echo $event['id']; ?>;

                                    const days_<?php echo $event['id']; ?> = Math.floor(timeRemaining_<?php echo $event['id']; ?> / (1000 * 60 * 60 * 24));
                                    const hours_<?php echo $event['id']; ?> = Math.floor((timeRemaining_<?php echo $event['id']; ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    const minutes_<?php echo $event['id']; ?> = Math.floor((timeRemaining_<?php echo $event['id']; ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    const seconds_<?php echo $event['id']; ?> = Math.floor((timeRemaining_<?php echo $event['id']; ?> % (1000 * 60)) / 1000);

                                    document.getElementById('days-<?php echo $event['id']; ?>').textContent = days_<?php echo $event['id']; ?>;
                                    document.getElementById('hours-<?php echo $event['id']; ?>').textContent = hours_<?php echo $event['id']; ?>;
                                    document.getElementById('minutes-<?php echo $event['id']; ?>').textContent = minutes_<?php echo $event['id']; ?>;
                                    document.getElementById('seconds-<?php echo $event['id']; ?>').textContent = seconds_<?php echo $event['id']; ?>;
                                }

                                updateCountdown_<?php echo $event['id']; ?>();
                                setInterval(updateCountdown_<?php echo $event['id']; ?>, 1000);
                            </script>
                            <?php
                        
                    }
                }
            ?>

    <div id="eventbanner" class="eventbanner py-10 md:flex gap-10 justify-center items-center bg-gray-800">
        <div class="md:py-0 py-2 flex justify-center items-center">
            <h2 class="text-2xl text-center md:text-4xl text-white font-bold">Get more infomation about Events</h2>
        </div>
        <div class="md:py-0 py-2 flex justify-center items-center">
            <a href="<?php echo $eventsurl;?>" class="rounded-2xl py-2 px-10 bg-white text-gray-950 uppercase hover:bg-blue-400 hover:text-white">View More Events</a>
        </div>
    </div>
</div>

<!-- hot news  -->
<div>
    <div class="w-full lg:flex justify-center md:gap-10 px-2 lg:px-10 py-10 md:py-20 bg-gray-100">
        <?php

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $hot = $db->getHotNews();
                    if ($hot) {?>
                
        <div class="md:w-full lg:w-1/2 2xl:w-1/2 h-[600px] md:px-10 ">
            <img src="<?php echo substr($hot['photo'], 3); ?>" alt="" class="w-full h-full object-cover rounded-xl rounded-br-2xl">
        </div>
        <div class="md:w-full lg:w-1/2 2xl:w-1/3 flex flex-col justify-center  px-3 md:px-1">
            <div class="flex gap-1 py-5">
                <img src="../assets/icons/icons8-rating-30.png" alt="">
                <img src="../assets/icons/icons8-rating-30.png" alt="">
                <img src="../assets/icons/icons8-rating-30.png" alt="">
                <img src="../assets/icons/icons8-rating-30.png" alt="">
                <img src="../assets/icons/icons8-rating-30.png" alt="">
            </div>
            <h1 class="font-bold py-3 text-2xl md:text-3xl"><?php echo $hot['title']; ?></h1>
            <p class="textcontent font-light md:leading-8 2xl:text-lg py-5 mb-2 md:mb-5"><?php echo substr($hot['content'], 0, 500); ?> ...</p>
        </div>
        <?php }} ?>
    </div>
</div>

<!-- quick review -->
<div>
    <div class="w-full md:flex gap-2 justify-center bg-gray-950 py-20">
        <div class="flex gap-6 md:w-1/6 rounded justify-center">
            <img src="../assets/icons/icons8-member-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $athletes = $db->getOverview();
                        ?>
                        <h2 class="font text-4xl"><?php echo $athletes['athletes']; ?></h2>
                <?php } ?>
                <span class="capitalize ">Athletes</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-knock-down-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $clubs = $db->countTotal('clubs');
                        ?>
                        <h2 class="font text-4xl"><?php echo $clubs; ?></h2>
                <?php } ?>
                <span class="capitalize ">Clubs</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-member-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $athletes = $db->getOverview();
                        ?>
                        <h2 class="font text-4xl"><?php echo $athletes['awards']; ?></h2>
                <?php } ?>
                <span class="capitalize ">Awards</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-events-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $events = $db->countTotal('events');
                        ?>
                        <h2 class="font text-4xl"><?php echo $events; ?></h2>
                <?php } ?>
                <span class="capitalize ">events</span>
            </div>
        </div>
    </div>
</div>

<!--Normal News -->

<div class="w-full px-5 py-10 md:py-20">
    <div class="flex flex-col justify-center items-center  w-full py-5">
        <h1 class="uppercase font-bold text-2xl">recent news</h1>
    </div>
    <div class="grid md:flex justify-center items-center gap-5">

    <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $state = 'NORMAL';
                    $limit = 3;
                    $news = $db->getNews("news", $state, $limit);
                    // echo json_encode($news);
                   
                    foreach ($news as $new){
                    
                    ?>

                    <div class="max-w-sm bg-white drop-shadow-xl rounded drop-shadow-xl newcard ">
                    <a href="<?php echo $newpageUrl; ?>?id=<?php echo base64_encode($new['id']); ?>">

                        <div>
                            <img class="w-full h-60 object-cover" src="<?php echo substr($new['photo'], 3); ?>" alt="" />
                        </div>
                        <div class="p-5">
                           
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?php echo $new['title']; ?></h5>
                            
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo substr($new['content'], 0, 80); ?> ...</p>
                            <a href="<?php echo $newpageUrl; ?>?id=<?php echo base64_encode($new['id']); ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </a>
                    </div>
                <?php }} ?>



    </div>
    <div class="flex justify-center items-center pt-10">
        <a href="<?php echo $newsUrl; ?>" class="inline-flex items-center px-10 py-3 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Navigate to more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
        </a>
    </div>
    
</div>


<?php  include "../includes/footer.php";  ?>
</body>

<!-- <script src="../assets/js/slides.js"></script> -->

                   






