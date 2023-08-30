
<?php include '../../includes/header.php';

?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 md:px-20 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashbord / Update News</h2>

        <div class="text-gray-900 tracking-wider leading-normal">

            <div class="container w-full mx-auto px-2">

            
                    <!-- modal -->

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $id = $_GET['editid'];
                            $title = $_POST['title'];
                            $content = $_POST['content'];
                            $state = $_POST['state'];
                            $photo = $_FILES['photo'];

                            $userData = [
                                "title" => $title,
                                "content" => $content,
                                "state" => $state,
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

                            $result = $db->update("news", $userData, $id);
                            if ($result['status'] == 'success') {
                                $response = $result['message'];
                            } else {
                                $response = "Failed to update News.";
                            }

                            $message = json_encode($response);
                            //  echo json_encode($result);
                            echo "<script>alert('$message'); window.history.pushState({}, '', 'news'); window.location.reload();</script>";
                        }
                        ?>



                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $id = $_GET['editid'];
                                $new = $db->getByid('news', $id);
                                // echo json_encode($user);
                                if($new){
                        ?>
                   
                   <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-4/5 rounded-lg shadow-lg ">
                            <div class="md:w-full pb-5">
                                <div class="py-3 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Update  News Here</h2>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class=" mb-4 px-3">
                                        <input type="text" required name="title" placeholder="Enter News Title" value="<?php echo $new['title']; ?>" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <textarea required name="content" placeholder="Enter News Description"  value="<?php echo $new['content']; ?>" class="w-full h-96  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded "> <?php echo $new['content']; ?></textarea>
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <select required name="state" class="w-full py-2 px-6 bg-white outline-none border border-gray-300 rounded ">
                                            <option><?php echo $new['state']; ?></option>
                                            <option>Choose News State</option>
                                            <option value="TOP">Top</option>
                                            <option value="HOT">Hot</option>
                                            <option value="NORMAL">Normal</option>
                                        </select>
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <input type="file"  name="photo" placeholder="Choose Photo" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="addmember" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Update News</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <?php } }?>
                    

                <!-- end add user -->

</div>
</div>
</main>