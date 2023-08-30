
<?php 
    include '../includes/navbar.php'; 
    $newsid = base64_decode($_GET['id']);
    $nid = base64_encode($newsid);
?>
<body>


<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $new = $db->getByid('news', $newsid);
    // echo json_encode($new);
    if($new){
   
        ?>

<style>
    .textcontent{
         white-space: pre-line;
    }
</style>
<div>
    <div class="bg-gray-100 md:py-10">

        <div class="w-full flex gap-2 justify-center ">
            <div class="md:w-3/5 newslist px-5 md:py-10">
                <div class="w-full py-5 flex justify-between ">
                    <a href="<?php echo $newsUrl; ?>" class="flex justify-center cursor-pointer items-center py-5 bg-blue-400 rounded-full w-5 h-5 p-5">
                        <h2 class="text-3xl font-bold text-white text-center mb-2 font-bold">&larr;</h2>
                    </a>
                    <span></span>
                </div>

                <div class="w-full bg-white drop-shadow-xl rounded drop-shadow-xl newcard">
                    <div class="w-full h-full bg-blue-700">
                        <img class="w-full  object-cover" src="<?php echo substr($new['photo'],3); ?>" alt="" />
                    </div>
                    <div class="px-10 py-2 w-full text-right ">
                        <span><?php echo $new['createdat']; ?></span>
                    </div>
                    <div class="p-5">

                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?php echo $new['title']; ?></h5>
                        </a>
                        <p class="textcontent mb-3 font-normal text-gray-600"><?php echo $new['content']; ?></p>
                    </div>
                </div>
                <?php } }?>

                <!-- comment section -->
                 <section class="relative flex flex-col items-center justify-center md:py-10 border-t antialiased bg-white bg-gray-100 ">
                    <div class="text-left w-full md:px-20 py-2 ">
                        <h2 class="uppercase font-bold text-xl py-5 border-b">COmments</h2>
                    </div>
                    
                    <div class="container px-0 mx-auto sm:px-5 md:px-40 md:py-10">
                    
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            $com = $db->getComments($newsid);
                            if ($com){
                            foreach ($com as $comm) {
                                $timestamp = strtotime($comm['createdat']);
                                $now = new DateTime();
                                $commentTime = DateTime::createFromFormat('U', $timestamp);
                                $interval = date_diff($commentTime, $now);

                                $timeAgo = '';
                                if ($interval->y > 0) {
                                    $timeAgo = $interval->format('%y years ago');
                                } elseif ($interval->m > 0) {
                                    $timeAgo = $interval->format('%m months ago');
                                } elseif ($interval->d > 0) {
                                    $timeAgo = $interval->format('%d days ago');
                                } elseif ($interval->h > 0) {
                                    $timeAgo = $interval->format('%h hours ago');
                                } elseif ($interval->i > 0) {
                                    $timeAgo = $interval->format('%i minutes ago');
                                } else {
                                    $timeAgo = 'Just now';
                                }
                        ?>
                                <div class="flex-col w-full py-4 mx-auto bg-gray-50 border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm mb-3">
                                    <div class="flex flex-row">
                                        <img class="object-cover w-14 h-14 border-1 border-gray-300 rounded-full" alt="avatar"
                                            src="../assets/icons/icons8-user-60.png">
                                        <div class="flex-col mt-1">
                                            <div class="flex items-center flex-1 px-4 font-bold leading-tight"><?php echo $comm['name'];?>
                                                <span class="ml-2 text-xs font-normal text-gray-500"><?php echo $timeAgo;?></span>
                                            </div>
                                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600"><?php echo $comm['message'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }else{
                                echo '<div class="font-light"><h2>No Comments arround ... </h2></div>';
                            }
                        }
                        ?>


                
                    </div>

                     <!-- comment forms -->
                     <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $message = $_POST['message'];
                            $userData = [
                                "news_id" => $id,
                                "name" => $name,
                                "email" => $email,
                                "message" => $message,
                            ];

                            $results = $db->save("comments",$userData);

                            if ($results) {
                                $responses = "Your comments have been sent";
                            } else {
                                $responses = "Failed to add comment";
                            }

                            $messages = json_encode($responses);

                            $newsid = base64_decode($_GET['id']);
                            // echo json_encode($results);
                            echo "<script>alert('$messages'); window.location.href = 'newpage?id=$nid';</script>";
                        }
                        ?>

                  
                     <div class=" w-full md:px-20 py-5 border-t md:flex">
                            <div class="md:w-1/2">
                                <h2 class="py-2 font-bold text-xl text-gray-700">Leave comment</h2>
                                <p class="text-gray-700 font-normal pb-5">Dont hesitate to comment your idea</p>
                            </div>
                            <div class="md:w-full">
                                <form action="" method="POST">
                                    <div class=" mb-4 px-3 hidden">
                                        <input type="text" readonly required name="id" value="<?php echo base64_decode($_GET['id']);?>" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <input type="text" required name="name" placeholder="Name" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                    <input type="email"  required name="email" placeholder="Email" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    <div class=" mb-4 px-3">
                                    <textarea required name="message" placeholder="Message"   class="w-full h-44  py-2 px-6 bg-white outline-none border border-gray-300 rounded"></textarea>
                                    </div>
                                    <div class=" mb-4 px-3">
                                    
                                    <button type="submit" name="send" class="text-white bg-blue-400 hover:bg-blue-600  py-2 rounded font-[500] w-full">Comment</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div> 

                    <!-- end comment forms -->
                </section> 
                
            </div>

            <!-- latest -->
            <div class=" md:w-[350px] latest py-10">
                <div class="w-full mb-2 p-5 bg-white rounded">
                    <form action="">
                        <input type="search" name="" id="" class="w-full bg-white border rounded px-10 py-2" placeholder="Search here ..">
                    </form>
                </div>
                <div class="w-full mb-2 p-5 bg-white rounded">
                    <h2 class="text-xl font-bold pb-3">Categories</h2>
                    <ul>
                        <li class="font-light tetx-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>world champion</li>
                        <li class="font-light tetx-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>region champion</li>
                        <li class="font-light tetx-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>events</li>
                        <li class="font-light tetx-gray-500 border-b py-2 hover:text-blue-400 cursor-pointer"> <span class="font-bold leading-8 px-3">&gt;</span>Competions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>

</body>