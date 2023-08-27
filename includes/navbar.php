<?php
 include '../includes/head.php';
 $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $aboutUrl = dirname($currentURL) . "/about";
 $contactUrl = dirname($currentURL) . "/contact";
 $homeUrl = dirname($currentURL) . "/home";
 $newsUrl = dirname($currentURL) . "/news";
 $newpageUrl = dirname($currentURL) . "/newpage";
 $eventsUrl = dirname($currentURL) . "/events";
 $athletesUrl = dirname($currentURL) . "/athletes";
 $galleryUrl = dirname($currentURL) . "/gallery";
 $championUrl = dirname($currentURL) . "/champions";
 $encodedURL = urlencode($currentURL);

?>

<navbar>
  <div class="sticky top-0 z-2 w-full bg-gray-950 ">
    <div class="md:flex items-center justify-between mx-auto py-2 px-5 md:px-5 lg:px-20 xl:px-40 2xl:px-60">
      <div class="flex justify-between justify-center">
       <h1 class="md:w-60 w-60 text-white font-black text-2xl py-2"> RTFederation  </h1>

       <div class="md:flex justify-center ">
        <img src="../assets/icons/icons8-menu-50.png" alt="menu" class="w-8 hidden md:hidden  ">
       </div>
      </div>

      <div id="myTopnav" class=" navlink md:block  md:pt-0 px-3 md:px-0 ">
        <ul class="text-gray-400 md:flex md:gap-1 gap-5 items-center hidden md:block">
           <li class="text-center cursor-pointer">
                <a href="<?php echo $homeUrl;?>" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 <?php if ($currentURL ==  'http://localhost/taekwondo/public/index.php' || $currentURL ==  'http://localhost/taekwondo/public/' || $currentURL ==  'http://localhost/taekwondo/public/home'  ) echo'bg-blue-400' ;?> ">home</a>
           </li>
           <li class="text-center cursor-pointer">
                <a href="<?php echo $aboutUrl;?>" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 <?php if ( $currentURL ==  'http://localhost/taekwondo/public/about.php' || $currentURL == 'http://localhost/taekwondo/public/about') echo 'bg-blue-400'; ?>">about us</a>
           </li>
           <li class="cursor-pointer">
            <a href="#" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 <?php if ($currentURL ==  'http://localhost/taekwondo/public/events' || $currentURL ==  'http://localhost/taekwondo/public/athletes' || $currentURL ==  'http://localhost/taekwondo/public/gallery' || $currentURL ==  'http://localhost/taekwondo/public/champions' ) echo 'bg-blue-400'; ?>">Media</a>
                <ul class="absolute rounded-b md:bg-gray-900 hidden text-white capitalize w-full md:w-52 py-2">
                    <a href="<?php echo $eventsUrl;?>" class=" mynavlink w-full"><li class="hover:bg-blue-400 hover:text-white py-3 w-full px-5 py-2 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Events</li></a>
                    <a href="<?php echo $athletesUrl;?>" class=" mynavlink w-full"><li class="hover:bg-blue-400 hover:text-white py-3 w-full px-5 py-2 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Athletes</li></a>
                    <a href="<?php echo $galleryUrl;?>" class=" mynavlink w-full"><li class="hover:bg-blue-400 hover:text-white py-3 w-full px-5 py-2 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Gallery</li></a>
                    <a href="<?php echo $championUrl;?>" class=" mynavlink w-full"><li class="hover:bg-blue-400 hover:text-white py-3 w-full px-5 py-2 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">our champions</li></a>
                </ul>
            </li>
            <li class="text-center cursor-pointer">
                <a href="<?php echo $newsUrl;?>" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 <?php if ($currentURL ==  'http://localhost/taekwondo/public/news.php' || $currentURL ==  'http://localhost/taekwondo/public/news' || $currentURL ==  'http://localhost/taekwondo/public/newpage' ) echo'bg-blue-400' ;?>">News</a>
            </li>
            
            <li class="text-center cursor-pointer">
                <a href="<?php echo $contactUrl; ?>" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 <?php if ($currentURL ==  'http://localhost/taekwondo/public/contact.php' || $currentURL ==  'http://localhost/taekwondo/public/contact'  ) echo'bg-blue-400' ;?> ">Contact us</a>
            </li>
        
        </ul>

      </div>

      <div class="flex gap-2 hidden md:flex">
        <a href=""><img src="../assets/icons/icons8-facebook.svg"></a>
        <a href=""><img src="../assets/icons/icons8-instagram.svg"></a>
        <a href=""><img src="../assets/icons/icons8-twitter.svg"></a>
      </div>

    </div>
  </div>
</navbar>