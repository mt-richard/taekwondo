
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
 

 $encodedURL = urlencode($currentURL);

?>

<body class="bg-gray-100">

  <aside class="bg-gray-800 text-white md:w-80 md:min-h-screen w-full  p-4">
    <nav>
      <ul class="space-y-2">
        <a href="<?php echo $dashboardUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/dashboard.php' || $currentURL == 'http://localhost/taekwondo/public/admin/dashboard') echo "text-blue-400"; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  <span>Dashboard</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $overviewUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/overview.php' || $currentURL == 'http://localhost/taekwondo/public/admin/overview') echo "text-blue-400"; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-eye mr-2"></i>
                  <span>Overview</span>
                </div>
              </div>
          </li>
        </a>
        <a href="<?php echo $usersUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/users.php' || $currentURL == 'http://localhost/taekwondo/public/admin/users') echo "text-blue-400"; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-users mr-2"></i>
                <span>Users</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $clubsUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/clubs.php' || $currentURL == 'http://localhost/taekwondo/public/admin/clubs') echo "text-blue-400"; ?>">
          <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-running mr-2"></i>
                  <span>Clubs</span>
                </div>
              </div>
            </li>
        </a>

          <a href="<?php echo $membersUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/members.php' || $currentURL == 'http://localhost/taekwondo/public/admin/members') echo "text-blue-400"; ?>">
            <li class="opcion-con-desplegable">
              <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                <div class="flex items-center">
                  <i class="fas fa-users mr-2"></i>
                  <span>Committe</span>
                </div>
              </div>
            </li>
          </a>

          <a href="#" class=" <?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/events.php' || $currentURL ==  'http://localhost/taekwondo/public/admin/eventcategory'  || $currentURL == 'http://localhost/taekwondo/public/admin/events') echo "text-blue-400"; ?>">
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

        <a href="<?php echo $newsUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/news.php' || $currentURL == 'http://localhost/taekwondo/public/admin/news') echo "text-blue-400"; ?>">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-newspaper mr-2"></i>
                <span>News</span>
              </div>
            </div>
          </li>
        </a>

        <a href="<?php echo $notificationUrl;?>" class="<?php if ( $currentURL ==  'http://localhost/taekwondo/public/admin/notifications.php' || $currentURL == 'http://localhost/taekwondo/public/admin/notifications') echo "text-blue-400"; ?>">
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