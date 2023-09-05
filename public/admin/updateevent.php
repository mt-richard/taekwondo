
<?php include '../../includes/header.php';

?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 md:px-20 bg-gray-100 ">
        <h2 class="text-xl py-10">Dashbord / Update Event</h2>

        <div class="text-gray-900 tracking-wider leading-normal">

            <div class="container w-full mx-auto px-2">
                    <!-- modal -->

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $id = $_GET['editid'];
                            $category = $_POST['category'];
                            $title = $_POST['title'];
                            $event_date = $_POST['event_date'];
                            $event_desc = $_POST['event_desc'];
                            $event_enddate = $_POST['event_enddate'];
                            $venue = $_POST['venue'];
                            $photo = $_FILES['photo'];

                            $userData = [
                                "event_category" => $category,
                                "title" => $title,
                                "event_desc" => $event_desc,
                                "event_date" => $event_date,
                                "event_enddate" => $event_enddate,
                                "venue" => $venue,
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

                            $result = $db->update("events", $userData, $id);
                            if ($result['status'] == 'success') {
                                $response = $result['message'];
                            } else {
                                $response = "Failed to update event.";
                            }

                            $message = json_encode($response);
                            //  echo json_encode($result);
                            echo "<script>alert('$message'); window.history.pushState({}, '', 'events'); window.location.reload();</script>";
                        }
                        ?>



                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $id = $_GET['editid'];
                                $new = $db->getByid('events', $id);
                                // echo json_encode($user);
                                if($new){
                        ?>
                   
                   <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-4/5 rounded-lg shadow-lg ">
                            <div class="md:w-full pb-5">
                                <div class="py-3 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Update  Event Here</h2>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class=" mb-4 px-3">
                                        <?php
                                        //    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                        //     include '../../config/dbconnection.php';
                                        //     $cats = new dbconnection();
                                        //     $alls =  $db->getAll("events");
                                        //     echo json_encode($alls);
                                        //     } 
                                            ?>
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Choose Category : </label>
                                        <select required name="category" class="w-full py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                            <option>Choose the Event Category</option>
                                            <option value="AFRICAN TAEKWONDO CHAMPIONSHIPS">AFRICAN TAEKWONDO CHAMPIONSHIPS</option>
                                            <option value="WORLD TAEKWONDO CHAMPIONSHIPS">WORLD TAEKWONDO CHAMPIONSHIPS</option>
                                            <option value="EURO TAEKWONDO CHAMPIONSHIPS">EURO TAEKWONDO CHAMPIONSHIPS</option>
                                        </select>
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Enter Event Title : </label>
                                        <input type="text" required name="title" placeholder="Enter Event Title" value="<?php echo $new['title']; ?>" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Enter Event Venue : </label>
                                        <input type="text" required name="venue" placeholder="Enter Event Venue " value="<?php echo $new['venue']; ?>" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class="mb-4 px-3">
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Enter Event Date/Time :</label>
                                        <input type="datetime-local" required name="event_date" placeholder="Enter Event Date" value="<?php echo $new['event_date']; ?>"  class="w-full py-1.5 px-6 bg-white outline-none border border-gray-300 rounded">
                                    </div>
                                    <div class="mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Event Closing Date/Time :</label>
                                        <input type="datetime-local" required name="event_enddate" placeholder="Enter Ending Event Date/Time" value="<?php echo $new['event_enddate']; ?>" min="<?php echo date('Y-m-d\TH:i'); ?>" class="w-full py-1.5 px-6 bg-white outline-none border border-gray-300 rounded">
                                    </div>

                                    <div class=" mb-4 px-3">
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Event Description : </label>
                                        <textarea required name="event_desc" placeholder="Enter Event Description"   class="w-full h-96  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded "> <?php echo $new['event_desc']; ?></textarea>
                                    </div>
                                    
                                    <div class=" mb-4 px-3">
                                        <label for="" class="font-light text-[14px] text-gray-700 p-2 px-5">Event banner : </label>
                                        <input type="file"  name="photo" placeholder="Choose Photo" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="addmember" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Update Event</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <?php } }?>
                    

                <!-- end add user -->

</div>
</div>
</main>