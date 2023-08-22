<?php
 include '../includes/head.php';
 $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $encodedURL = urlencode($currentURL);
?>

<navbar>
  <div class="sticky top-0 z-2 w-full bg-gray-950 ">
    <div class="md:flex items-center justify-between mx-auto py-2 px-5 md:px-5 lg:px-20 xl:px-40 2xl:px-60">
      <div class="flex justify-between justify-center">
       <h1 class="md:w-60 w-60 text-white font-black text-2xl py-2"> TAEKWONDO  </h1>

       <div class="md:flex justify-center ">
        <img src="../icons/icons8-menu-50.png" alt="menu" class="w-8 hidden md:hidden  ">
       </div>
      </div>

      <div id="myTopnav" class=" navlink md:block  md:pt-0 px-3 md:px-0 md:bg-black">
        <ul class="text-gray-400 md:flex md:gap-1 gap-5 items-center hidden md:block">
           <li class="text-center cursor-pointer">
                <a href="" class="bg-blue-400 mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 ">home</a>
           </li>
           <li class="text-center cursor-pointer">
                <a href="" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 ">about us</a>
           </li>
           <li class="cursor-pointer">
            <a href="" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 ">Media</a>
                <ul class="absolute rounded-b md:bg-gray-900 hidden text-white capitalize w-full md:w-40 py-2">
                    <li><a href="" class=" mynavlink w-full px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Events</a></li>
                    <li><a href="" class=" mynavlink w-full px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Athletes</a></li>
                    <li><a href="" class=" mynavlink w-full px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold hover:text-blue-600">Gallery</a></li>
                </ul>
            </li>
            <li class="text-center cursor-pointer">
                <a href="" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 ">News</a>
            </li>
            
            <li class="text-center cursor-pointer">
                <a href="<?php echo $currentURL; ?>/contact" class=" mynavlink md:px-2 py-6 lg:px-5 capitalize lg:text-[12px] md:text-[12px] text-white font-bold md:uppercase hover:text-blue-600 ">Contact us</a>
            </li>
        
        </ul>

      </div>

      <div class="flex gap-2 hidden md:flex">
        <a href=""><img src="../icons/icons8-facebook.svg"></a>
        <a href=""><img src="../icons/icons8-instagram.svg"></a>
        <a href=""><img src="../icons/icons8-twitter.svg"></a>
      </div>

    </div>
  </div>
</navbar>