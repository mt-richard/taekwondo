

<?php include '../includes/navbar.php'; ?>
<body>

<div>
    <div class="w-full flex flex-col justify-center items-center mb-5 py-10 bg-gray-100 ">
        <h2 class="text-4xl font-bold py-5">Clubs</h2>
        <p class="pb-10 font-light w-4/5">Explore our network of Taekwondo clubs, dedicated to fostering the practice and spirit of Taekwondo across different communities. Our Taekwondo Federation's Clubs offer a welcoming environment for practitioners of all skill levels, from beginners to seasoned athletes. Join us in promoting the values of discipline, respect, and excellence through the practice of Taekwondo. Discover a club near you and embark on a journey of personal growth, physical fitness, and camaraderie.</p>
    

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 flex-wrap gap-5 md:gap-20 justify-center items-center w-full px-5 md:px-10 lg:px-20 xl:px-40">


        <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include '../config/dbconnection.php';
            $db = new dbconnection();
            $clubs = $db->getAll('clubs');
            foreach($clubs as $club){
                ?>

            
            <div class="relative md:w-[400px] newcard" >
                <div class="w-full">
                <img src="<?php echo substr($club['photo'], 3); ?>" alt="" class="w-full h-[500px] object-cover drop-shadow-xl">
                </div>
                <div class="bg-blue-400 w-[90%] absolute bottom-0 left-4 flex flex-col items-center py-2">
                    <h2 class="text-white font-bold text-2xl"><?php echo $club['name']; ?></h2>
                    <span class="text-gray-200 ">Master : <?php echo $club['master']; ?></span>
                    <span class="text-gray-200 ">Tel : <?php echo $club['phone']; ?></span>
                    <span class="text-gray-200 ">Address : <?php echo $club['address']; ?></span>
                </div>
            </div>

            <?php }} ?>
            
        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>
