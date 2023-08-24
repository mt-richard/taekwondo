

<body class="bg-gray-100">
  

  <aside class="bg-gray-800 text-white md:w-80 md:min-h-screen w-full  p-4">
    <nav>
      <ul class="space-y-2">
        <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>Dashboard</span>
              </div>
            </div>
          </li>
        <li class="opcion-con-desplegable">
          <div class="flex items-center justify-between p-2 hover:bg-gray-700">
            <div class="flex items-center">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>users</span>
            </div>
          </div>
        </li>
        <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>Athletes</span>
              </div>
            </div>
          </li>
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>Committe</span>
              </div>
            </div>
          </li>
        <li class="opcion-con-desplegable">
          <div class="flex items-center justify-between p-2 hover:bg-gray-700">
            <div class="flex items-center">
              <i class="fas fa-money-bill-wave mr-2"></i>
              <span>Events</span>
            </div>
            <i class="fas fa-chevron-down text-xs"></i>
          </div>
        </li>
        <li class="opcion-con-desplegable">
          <div class="flex items-center justify-between p-2 hover:bg-gray-700">
            <div class="flex items-center">
              <i class="fas fa-chart-bar mr-2"></i>
              <span>News</span>
            </div>
            <i class="fas fa-chevron-down text-xs"></i>
          </div>
        </li>
        <li class="opcion-con-desplegable">
          <div class="flex items-center justify-between p-2 hover:bg-gray-700">
            <div class="flex items-center">
              <i class="fas fa-file-alt mr-2"></i>
              <span>Gallery</span>
            </div>
            <i class="fas fa-chevron-down text-xs"></i>
          </div>
          <ul class="desplegable ml-4 hidden">
            <li>
              <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                <i class="fas fa-chevron-right mr-2 text-xs"></i>
                Home Page
              </a>
            </li>
            <li>
              <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                <i class="fas fa-chevron-right mr-2 text-xs"></i>
                About page
              </a>
            </li>
            <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Contact page
                </a>
            </li>
          </ul>
        </li>
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