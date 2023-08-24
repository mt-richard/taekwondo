<?php 
 include "../includes/navbar.php";
?>

<style>
    .eventbanner {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.9)), url('../assets/images/52221968793_3490622dbb_b.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
  }
</style>

<body>
<!-- home banner -->
<div class="w-full">
    <div id="myDiv" class="w-full mx-auto md:py-40 md:h-[85vh] lg:h-[80vh]">
        <div class="w-full z-10 md:flex justify-center md:gap-20">
            <div class="md:w-1/3 px-5 py-5 md:py-10">
                <div>
                    <h4 class="drop-shadow-xl text-white font-bold text-3xl">Welcome to RFT</h4>
                </div>
                <div class="w-full items-center">
                    <h1 class="drop-shadow-xl text-gray-200 font-bold text-4xl md:text-6xl py-2">Rwanda TAEKWONDO Federation</h1>
                </div>
                <div class="pb-10">
                    <p class="text-white drop-shadow font-light text-xl py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel itaque sit dignissimos, quasi soluta unde quia excepturi consequuntur maiores, velit enim sed inventore eveniet perspiciatis non, placeat tempore natus hic..</p>
                </div>
                
                <a href="" type="button" class="bg-blue-500 px-6 rounded-3xl py-3 uppercase font-semibold text-white border-none outline-none hover:bg-white hover:text-main hover:shadow">get in touch</a>
            </div>

            <div class=" relative z-1 md:w-1/2 lg:w-2/5 xl:w-1/3 2xl:w-1/4 rounded-t px-10 py-10 md:mt-52 lg:mt-40 md:right-20">
                <h1 class="text-gray-100 py-3 font-bold uppercase text-xl">2023 Champion</h1>
                <h1 class="absolute bg-gray-950 opacity-2 bottom-20 md:bottom-20 lg:bottom-20 left-0 md:px-5 md:py-3 p-3 flex justify-center text-white  font-bold text-xl uppercase">Cheick Cisse</h1>
                <img src="../assets/images/Cheick-Cisse.webp" alt="" class="object-cover w-full rounded-t-xl">
            </div>
        </div>
    </div>
</div>

<!-- mission an dvission -->

<div>
    <div class=" md:grid grid-cols-2 lg:grid-cols-3 xl:flex justify-center md:gap-10 lg:gap-3 md:py-20 px-10">
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-mission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Mission</h1>
            <p class="font-light leading-8 ">Develop and grow Taekwondo throughout the world, from a grass roots level all the way through to an elite level, to provide all with the opportunity to play, watch and enjoy the sport regardless of age, gender, religion, ethnicity or ability.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-vission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Vission</h1>
            <p class="font-light leading-8 ">Taekwondo For All.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
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
    <div class="flex flex-col justify-center items-center mb-5 ">
        <div class="absolute top-0 md:right-80 bg-gray-950 md:px-10 py-5">
            <h2 class="uppercase text-white">upcoming event</h2>
        </div>
        <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
            <div class="md:flex gap-6 px-5 py-5 md:px-10">
                <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                    <img src="../assets/images/brochureFile_5.jpg" alt="" class="rounded w-full h-96 object-cover">
                </div>
                <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                    <div class="flex gap-2 md:gap-5">
                        <div>
                            <h2 class="text-white capitalize">days</h2>
                            <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                        </div>
                        <div>
                            <h2 class="text-white capitalize">hr</h2>
                            <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                        </div>
                        <div>
                            <h2 class="text-white capitalize">min</h2>
                            <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                        </div>
                        <div>
                            <h2 class="text-white capitalize">sec</h2>
                            <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                        </div>
                        <h2 class="text-white font-bold tetx-2xl capitalize">remaining</h2>
                    </div>
                    <div class="md:py-5">
                        <h2 class="text-white font-bold py-3 text-4xl" >We are going to arrange an event</h2>
                        <p class="text-white font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, labore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, neque?</p>
                    </div>
                    <div class="pt-5">
                        <button class=" border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="eventbanner" class="eventbanner py-10 md:flex gap-10 justify-center items-center bg-gray-800">
        <div>
            <h2 class="text-4xl text-white font-bold">Get more infomation about Events</h2>
        </div>
        <div>
            <button class="rounded-2xl py-2 px-10 bg-white text-gray-950 uppercase hover:bg-blue-400 hover:text-white">View More Evente</button>
        </div>
    </div>
</div>

<!-- more info about rtf -->

<div>
    <div class="w-full lg:flex justify-center md:gap-10 px-10 py-10 md:py-20 bg-gray-100">
        <div class="md:w-full lg:w-1/3 h-[600px] ">
            <img src="../assets/images/FWvAzJxWYAEIMPQ.jpeg" alt="" class="w-full h-full object-cover rounded-tl-2xl rounded-br-2xl">
        </div>
        <div class="md:w-full lg:w-1/3 flex flex-col justify-center  px-5 md:px-1">
            <h1 class="font-bold py-3 text-4xl">Get more info about RTF</h1>
            <p class="font-light leading-8 py-5 mb-5">World Taekwondo (WT) is the International Federation (IF) governing the sport of Taekwondo and is a member of the Association of Summer Olympic International Federations (ASOIF) and International Paralympic Committee (IPC). WT leads the most inclusive and accessible combat sport, which combines the values of an ancient Asian heritage with the values of a global elite sport. Taekwondo evolves on a solid base, mixing the traditional and the modern. The values recognized by practitioners and partners are the strength of our sport. They are distilled from those found in our society: the search for pleasure, surpassing oneself, perseverance, moral and physical strength, and respect for others.</p>
        </div>
    </div>
</div>

<!-- quick review -->
<div>
    <div class="w-full md:flex gap-2 justify-center bg-gray-950 py-20">
        <div class="flex gap-6 md:w-1/6 rounded justify-center">
            <img src="../assets/icons/icons8-member-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">200</h2>
                <span class="capitalize ">members</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-knock-down-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">455</h2>
                <span class="capitalize ">Athletes</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-winners-medal-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">432</h2>
                <span class="capitalize ">awards</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-events-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">120</h2>
                <span class="capitalize ">events</span>
            </div>
        </div>
    </div>
</div>

<!-- News -->

<div class="w-full px-5 py-10 md:py-20">
    <div class="flex flex-col justify-center items-center  w-full py-5">
        <h1 class="uppercase font-bold text-2xl">recent news</h1>
    </div>
    <div class="grid md:flex justify-center items-center gap-5">
        <div class="max-w-sm bg-white drop-shadow-xl newcard mb-3">
            <a href="#">
                <img class="w-full h-80 object-cover" src="../assets/images/GettyImages-591755236 (1).jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Best Match for 2021 Competions</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, beatae?</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="max-w-sm bg-white drop-shadow-xl newcard mb-3 ">
            <a href="#">
                <img class="w-full h-80 object-cover" src="../assets/images/1stpressreleasemontreuxphoto.webp" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Best Match for 2021 Competions</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, beatae?</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="max-w-sm bg-white drop-shadow-xl newcard mb-3 ">
            <a href="#">
                <img class="w-full h-80 object-cover" src="../assets/images/52222939374_7fb699d8dd_b.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Best Match for 2021 Competions</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, beatae?</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
    <div class="flex justify-center items-center pt-10">
        <a href="#" class="inline-flex items-center px-10 py-3 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Navigate to more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
        </a>
    </div>
    
</div>


<?php  include "../includes/footer.php";  ?>
</body>

<script src="../assets/js/slides.js"></script>






