
<?php
 include '../includes/head.php';
 $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $dashboardUrl = dirname($currentURL) . "/dashboard";
 $usersUrl = dirname($currentURL) . "/users";
 $clubsUrl = dirname($currentURL) . "/clubs";
 $newsUrl = dirname($currentURL) . "/news";
 $eventsUrl = dirname($currentURL) . "/events";
 $eventcategoryUrl = dirname($currentURL) . "/eventcategory";
 $galleryUrl = dirname($currentURL) . "/gallery";
 $championsUrl = dirname($currentURL) . "/champions";
 $membersUrl = dirname($currentURL) . "/members";
 $logoutUrl = dirname($currentURL) . "/logout";
 $overviewUrl = dirname($currentURL) . "/overview";
 $notificationUrl = dirname($currentURL) . "/notifications";
 $commentsUrl = dirname($currentURL) . "/comments";

 $encodedURL = urlencode($currentURL);

?>

<body class="bg-gray-100">
        <div class=" md:hidden absolute right-0" id="openbtn">
            <button class="bg-gray-500 p-2 text-[12px] rounded text-gray-700"><img src="../../assets/icons/icons8-menu-50.png" class="w-5 h-5"></button>
          </div>

  <aside id="menu" class="hidden md:block bg-gray-800 text-white lg:w-40 2xl:w-80 md:min-h-screen h-full w-full  p-4">
          
    <nav >
      <ul class="space-y-2">
        <a href="<?php echo $dashboardUrl;?>" class="<?php echo strpos($currentURL, 'dashboard') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  <span class="md:hidden lg:block">Dashboard</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $overviewUrl;?>" class="<?php echo strpos($currentURL, 'overview') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-eye mr-2"></i>
                  <span class="md:hidden lg:block">Overview</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $usersUrl;?>" class="<?php echo strpos($currentURL, 'users') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-users mr-2"></i>
                <span class="md:hidden lg:block">Users</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $clubsUrl;?>" class="<?php echo strpos($currentURL, 'clubs') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-running mr-2"></i>
                  <span class="md:hidden lg:block">Clubs</span>
                </div>
              </div>
            </li>
        </a>

          <a href="<?php echo $membersUrl;?>" class="<?php echo strpos($currentURL, 'members') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-users mr-2"></i>
                  <span class="md:hidden lg:block">Committe</span>
                </div>
              </div>
            </li>
          </a>

          <a href="<?php echo $championsUrl;?>" class="<?php echo strpos($currentURL, 'champions') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-trophy mr-2"></i>
                  <span class="md:hidden lg:block">Champions</span>
                </div>
              </div>
            </li>
          </a>

          <a href="#" class=" <?php echo strpos($currentURL, 'event') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                  <i class="fas fa-calendar-alt mr-2"></i>
                  <span class="md:hidden lg:block">Events</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <a href="<?php echo $eventsUrl;?>" >
                <li>
                  <div class="block p-2 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                    Events List
                 </div>
                </li>
              </a>
              <a href="<?php echo $eventcategoryUrl;?>" >
                <li>
                  <div class="block p-2 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                    Category
                  </div>
                </li>
              </a>
            </ul>
          </li>
          </a>

        <a href="<?php echo $newsUrl;?>" class="<?php echo strpos($currentURL, 'news') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-newspaper mr-2"></i>
                <span class="md:hidden lg:block">News</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $commentsUrl;?>" class="<?php echo strpos($currentURL, 'comment') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-newspaper mr-2"></i>
                <span class="md:hidden lg:block">Comments</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $notificationUrl;?>" class="<?php echo strpos($currentURL, 'notifications') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-bell mr-2"></i>
                <span class="md:hidden lg:block">Notifications</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?php echo $logoutUrl;?>" >
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span class="md:hidden lg:block">Logout</span>
              </div>
            </div>
          </li>
        </a>

      </ul>
    </nav>
  </aside>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

      opcionesConDesplegable.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
          const desplegable = opcion.querySelector(".desplegable");

          desplegable.classList.toggle("hidden");
        });
      });
    });

    let openbtn = document.getElementById('openbtn');
    let menu = document.getElementById('menu');
    let menuVisible = true; 

    openbtn.addEventListener('click', function () {
      if (menuVisible) {
        menu.style.display = 'none';
      } else {
        menu.style.display = 'block';
      }
      menuVisible = !menuVisible; 
    });
     
    
  </script>
</body>
</html>