

<?php include '../../includes/header.php'; ?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- dashboard content -->
    <main class="w-full px-5 md:px-20 py-10 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashboard</h2>

        <div class="">
            <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 grid-cols-4 gap-10 ">
                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10  flex justify-center  justify-between ">
                    <div class="absolute top-0 bg-blue-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-member-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Users</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $users = $db->countTotal('users');
                                     echo $users; 
                                     } ?>
                        </h1>
                    </div>
                </div>

                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10 flex  justify-center justify-between ">
                    <div class="absolute top-0 bg-purple-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-member-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Committe</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $members = $db->countTotal('members');
                                     echo $members; 
                            } ?>
                        </h1>
                    </div>
                </div>

                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10 flex  justify-center justify-between ">
                    <div class="absolute top-0 bg-green-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-member-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Champions</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $champions = $db->countTotal('champions');
                                   echo $champions; 
                                 } ?>
                        </h1>
                    </div>
                </div>

                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10 flex  justify-center justify-between ">
                    <div class="absolute top-0 bg-cyan-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-events-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Events</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $events = $db->countTotal('events');
                                    echo $events; 
                             } ?>
                        </h1>
                    </div>
                </div>

                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10 flex  justify-center justify-between ">
                    <div class="absolute top-0 bg-pink-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-knock-down-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Athletes</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $athletes = $db->getOverview();
                                     echo $athletes['athletes']; 
                            } ?>
                        </h1>
                    </div>
                </div>

                <div class="relative w-full bg-white shadow-lg rounded-xl px-10 py-10 flex  justify-center justify-between ">
                    <div class="absolute top-0 bg-red-400 rounded-xl p-3">
                        <img src="../../assets/icons/icons8-winners-medal-80.png" alt="" class="w-10">
                    </div>
                    <span></span>
                    <div class="text-right">
                        <h3 class="">Total Awards</h3>
                        <h1 class="text-4xl font-bold">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    $athletes = $db->getOverview();
                                     echo $athletes['awards']; 
                            } ?>
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

