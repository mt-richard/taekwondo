
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

  <aside class="bg-gray-800 text-white md:w-80 md:min-h-screen h-full w-full  p-4">
    <nav>
      <ul class="space-y-2">
        <a href="<?php echo $dashboardUrl;?>" class="<?php echo strpos($currentURL, 'dashboard') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  <span>Dashboard</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $overviewUrl;?>" class="<?php echo strpos($currentURL, 'overview') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-eye mr-2"></i>
                  <span>Overview</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $usersUrl;?>" class="<?php echo strpos($currentURL, 'users') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-users mr-2"></i>
                <span>Users</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $clubsUrl;?>" class="<?php echo strpos($currentURL, 'clubs') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-running mr-2"></i>
                  <span>Clubs</span>
                </div>
              </div>
            </li>
        </a>

          <a href="<?php echo $membersUrl;?>" class="<?php echo strpos($currentURL, 'members') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-users mr-2"></i>
                  <span>Committe</span>
                </div>
              </div>
            </li>
          </a>

          <a href="<?php echo $championsUrl;?>" class="<?php echo strpos($currentURL, 'champions') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-trophy mr-2"></i>
                  <span>Champions</span>
                </div>
              </div>
            </li>
          </a>

          <a href="#" class=" <?php echo strpos($currentURL, 'event') !== false ? 'text-blue-400' : ''; ?>">
            <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                  <i class="fas fa-calendar-alt mr-2"></i>
                  <span>Events</span>
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
                <span>News</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $commentsUrl;?>" class="<?php echo strpos($currentURL, 'comment') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-newspaper mr-2"></i>
                <span>Comments</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $notificationUrl;?>" class="<?php echo strpos($currentURL, 'notifications') !== false ? 'text-blue-400' : ''; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-bell mr-2"></i>
                <span>Notifications</span>
              </div>
            </div>
          </li>
        </a>
        <a href="<?php echo $logoutUrl;?>" >
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span>Logout</span>
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
  </script>
</body>
</html>