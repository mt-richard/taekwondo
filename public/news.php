
<?php include '../includes/navbar.php'; ?>
<body>

<div>
    <div class="bg-gray-100 md:py-10">
        <div class="w-full flex flex-col justify-center items-center py-5 ">
            <h2 class="text-2xl font-bold">News List</h2>
            <p class="font-light">Let see whats trending</p>
        </div>

        <div class="w-full grid md:flex gap-2 justify-center ">
            <div class="md:w-3/5 newslist grid md:grid-cols-2 lg:grid-cols-3 gap-5 md:py-10">


            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    include '../config/dbconnection.php';
                    $db = new dbconnection();
                    $news = $db->getAll('news');
                    foreach($news as $new){
                    
                    ?>
                
                    <div class="max-w-sm bg-white drop-shadow-xl rounded drop-shadow-xl newcard ">
                    <a href="<?php echo $newpageUrl; ?>?id=<?php echo base64_encode($new['news_id']); ?>">

                        <div>
                            <img class="w-full h-60 object-cover" src="<?php echo substr($new['photo'], 3); ?>" alt="" />
                        </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?php echo $new['title']; ?></h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo substr($new['content'], 0, 80); ?> ...</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </a>
                    </div>
                
            <?php }} ?>
        
            </div>
            <div class=" md:w-[350px] latest  py-10">
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