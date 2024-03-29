
<?php include '../../includes/header.php';
?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 md:px-20 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashboard / Update Member</h2>
        <div class="text-gray-900 tracking-wider leading-normal">
            <div class="container w-full mx-auto px-2">
                    <!-- modal -->

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $id = $_GET['editid'];
                            $name = $_POST['name'];
                            $post = $_POST['post'];
                            $photo = $_FILES['photo'];

                            $userData = [
                                "name" => $name,
                                "post" => $post,
                            ];

                            if (!empty($photo['name'])) {
                                // Image was selected, handle the image upload
                                $photoName = $photo['name'];
                                $photoTmpName = $photo['tmp_name'];
                                $photoError = $photo['error'];

                                $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                                $uploadedExtension = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));

                                if (!in_array($uploadedExtension, $allowedExtensions)) {
                                    $response = "Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF.";
                                } elseif ($photoError === UPLOAD_ERR_OK) {
                                    $uniqueFilename = date('YmdHis') . '_' . uniqid() . '-' .$photoName;
                                    $targetDirectory =  '../../upload/' ;
                                    $targetPath = $targetDirectory . $uniqueFilename;

                                    if (move_uploaded_file($photoTmpName, $targetPath)) {
                                        $userData["photo"] = $targetPath;
                                    } else {
                                        $response = "Failed to move uploaded file. " . $_FILES['photo']['error'];
                                    }
                                } else {
                                    $response = "Error uploading the file.";
                                }
                            }

                            $result = $db->update("members", $userData, $id);
                            if ($result['status'] == 'success') {
                                $response = $result['message'];
                            } else {
                                $response = "Failed to update member.";
                            }

                            $message = json_encode($response);
                            echo "<script>alert('$message'); window.history.pushState({}, '', 'members'); window.location.reload();</script>";
                        }
                        ?>


                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $userid = $_GET['editid'];
                                $user = $db->getByid('members', $userid);
                                // echo json_encode($user);
                                if($user){
                        ?>
                   
                   <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-3/5 xl:1/3 rounded-lg shadow-lg md:mt-20">
                            <div class="md:w-full pb-5">
                                <div class="py-5 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Update a Member Here</h2>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter the Name : </label>
                                        <input type="text" id="name" required name="name" placeholder="Enter Name" value="<?php echo $user['name']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <!-- <div class=" mb-4 px-3">
                                        <input type="text" id="name" required name="post" placeholder="Enter Email address" value="" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div> -->
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Select his/her Post : </label>
                                        <select id="name" required name="post"  class="w-full  py-1.5 px-6 bg-white text-gray-600 outline-none border border-gray-300 rounded ">
                                            <option value="<?php echo $user['post']; ?> "><?php echo $user['post']; ?> </option>   
                                            <option value="">Choose any post</option>
                                            <option value="MD">MD</option>
                                            <option value="CEO">CEO</option>
                                            <option value="CTO">CTO</option>
                                            <option value="CMO">CMO</option>
                                        </select>
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Upload his/her Passport Photo : </label>
                                        <input type="file"  name="photo" placeholder="Choose image" value="<?php echo $user['photo']; ?>" class="w-full  py-3 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="updatemember" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Update Member</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <?php } }?>
                    

                <!-- end add user -->

</div>
</div>
</main>