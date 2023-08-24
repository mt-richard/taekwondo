<?php include '../../includes/header.php'; ?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 md:px-20 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashbord</h2>

        <div class="text-gray-900 tracking-wider leading-normal">

            <div class="container w-full mx-auto px-2">

                <!-- add user -->

                    <div class="py-5"> 
                        <button onclick="openModal()" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="openModalBtn" class="block text-white bg-blue-400 hover:bg-blue-600   font-medium rounded-lg text-sm px-10 py-2.5 text-center " type="button">
                            Add user
                        </button>
                    </div>
                
                    
                    <!-- Main modal -->

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            include '../../config/dbconnection.php';
                            $data = file_get_contents('php://input');
                            $obj = json_decode($data);
                            var_dump($obj);
                            // echo json_encode($data);
                            $userData = [
                                "username" =>$obj->username,
                                "email" =>$obj->email,
                                "phone" =>$obj->phone,
                                "address" =>$obj->address,
                                "password" =>$obj->password];
                            $add = new dbconnection();
                            $result = $add->save("users", $userData);
                            $response = ["message"=>"Failed to add student".$result, "status"=>0];
                            if(is_int($result)){
                                $response = ["message"=>"record added", "status" =>1, "id"=>$result];
                            }
                            echo (json_encode($response));
                            // $add->save("users", [$_POST['username'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['password']]);
                        }
                    ?>

                    <section  id="overlay"  class="bg-gray-700 opacity-95 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 md:inset-0 h-[calc(100%)] max-h-full flex flex-col justify-center items-center min-h-screen antialiased bg-gray-100 bg-gray-100 min-w-screen">
                        <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-1/5 rounded-lg shadow-lg md:mt-20">
                            <div class="md:w-full pb-5">
                                <div class="w-full justify-center">
                                    <span onclick="closeModal()" class="text-2xl cursor-pointer rounded-full p-2 w-5 h-5">&times;</span>
                                </div>
                                <div class="py-5 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Add User Here</h2>
                                </div>
                                <form action="" method="POST">
                                    <div class=" mb-4 px-3">
                                        <input type="text" id="name" required name="username" placeholder="Enter userName" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <input type="email" id="name" required name="email" placeholder="Enter Email address" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <input type="text" id="name" required name="phome" placeholder="Enter phone" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <input type="text" id="name" required name="address" placeholder="Enter address" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                    <input type="password" id="password" required name="password" placeholder="********" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="adduser" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Add user</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </section>

                <!-- end add user -->

                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">Username</th>
                                <th data-priority="2">Email</th>
                                <th data-priority="3">Address</th>
                                <th data-priority="4">Phone</th>
                                <th data-priority="5">Created At</th>
                                <th data-priority="6">Action</th>
                            </tr>
                        </thead>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            include '../../config/dbconnection.php';
                            $users = new dbconnection();
                            $all =  $users->getAll("users");
                            if(!empty($all)) {
                                foreach ($all as $user) {?>
                       
                        <tbody class="font-light">
                           
                            <tr>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['address']; ?></td>
                                <td>2011/01/25</td>
                                <td>$112,000</td>
                            </tr>
                        
                        <?php }}} ?>
                    </tbody>

                    </table>
                </div>

            </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {

                    var table = $('#example').DataTable({
                            responsive: true
                        })
                        .columns.adjust()
                        .responsive.recalc();
                });

            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const modal = document.getElementById('overlay');
            // const overlay = document.getElementById('overlay');

            function openModal() {
                modal.style.display = 'block';
                // overlay.style.display = 'block';
            }

            function closeModal() {
                modal.style.display = 'none';
                // overlay.style.display = 'none';
            }

            openModalBtn.addEventListener('click', openModal);
            closeModalBtn.addEventListener('click', closeModal);


            </script>

        </div>
    </main>
</div>
</html>


