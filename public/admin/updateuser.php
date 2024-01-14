
<?php include '../../includes/header.php';
?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 md:px-20 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashboard / Update User</h2>

        <div class="text-gray-900 tracking-wider leading-normal">

            <div class="container w-full mx-auto px-2">

            
                    <!-- modal -->

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                            $userid  = $_GET['editid'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            // $status = $_POST['status'];
                            $password = $_POST['password'];
                            
                            $userData = [
                                "username" => $username,
                                "email" => $email,
                                "phone" => $phone,
                                "address" => $address,
                                // "status" => $status,
                                "password" => $password
                            ];
                            
                            $result = $db->update("users", $userData, $userid);
                            
							if ($result['status'] == 'success') {
								$response = $result['message'];
							}else{
								$response = "Failed to update User";
							}
							$message = json_encode($response);
							echo "<script>alert('$message'); window.history.pushState({}, '', 'users'); window.location.reload();</script>";

							}
                        ?>

                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $userid = $_GET['editid'];
                                $user = $db->getByid('users', $userid);
                                // echo json_encode($user);
                                if($user){
                        ?>
                   
                        <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-3/5 rounded-lg shadow-lg md:mt-20">
                            <div class="md:w-full pb-5">
                               
                                <div class="py-5 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Update User Here</h2>
                                </div>
                                <form action="" method="POST">
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Username : </label>
                                        <input type="text" id="name" required name="username" placeholder="Enter userName"  value="<?php echo $user['username']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Email : </label>
                                        <input type="email" id="name" required name="email" placeholder="Enter Email address" value="<?php echo $user['email']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Phone : </label>
                                        <input type="text" id="name" required name="phone" placeholder="Enter phone" value="<?php echo $user['phone']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Address : </label>
                                        <input type="text" id="name" required name="address" placeholder="Enter address" value="<?php echo $user['address']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Password : </label>
                                        <input type="password" id="password" required name="password" placeholder="********" value="<?php echo $user['password']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="updates" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Update user</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <?php } }?>
                    

                <!-- end add user -->

</div>
</div>
</main>