

<?php include '../includes/navbar.php'; ?>
<body>

<div>
    <div class="w-full flex flex-col justify-center items-center mb-5 py-10 bg-gray-100 ">
        <h2 class="text-4xl font-bold py-5">Athletes</h2>
        <p class="pb-10 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus. Esse molestias nemo quae consectetur iste? Libero maxime laboriosam tenetur.</p>
    

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 flex-wrap gap-5 justify-center items-center w-full px-5 md:px-10 lg:px-20 xl:px-40">


        <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include '../config/dbconnection.php';
            $db = new dbconnection();
            $athletes = $db->getAll('athletes');
            foreach($athletes as $athlete){
                ?>

            
            <div class="relative md:w-[400px] newcard" >
                <div class="w-full">
                <img src="<?php echo substr($athlete['photo'], 3); ?>" alt="" class="w-full h-[500px] object-cover drop-shadow-xl">
                </div>
                <div class="bg-blue-400 w-[90%] absolute bottom-0 left-4 flex flex-col items-center py-2">
                    <h2 class="text-white font-bold text-2xl"><?php echo $athlete['name']; ?></h2>
                    <span class="text-gray-200 "><?php echo $athlete['club']; ?></span>
                </div>
            </div>

            <?php }} ?>
            
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>
