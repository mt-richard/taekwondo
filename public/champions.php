

<?php include '../includes/navbar.php'; ?>
<body>

<div>
    <div class="w-full flex flex-col justify-center items-center mb-5 py-10 bg-gray-100 ">
        <h2 class="text-4xl font-bold py-5 uppercase">Our champions</h2>
        <p class="px-5 pb-10 font-light md:w-3/4 lg:w-3/5 xl:w-2/5  text-center"><b>"Meet the Exceptional Champions Who Have Graced Our Journey" </b><br><br>

            Throughout our history, we have been privileged to witness the rise of extraordinary individuals who have not only achieved greatness but have also become a source of inspiration for all. These remarkable champions have poured their dedication, sweat, and heart into their pursuits, etching their names into our legacy.</p>
    

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 flex-wrap gap-5 justify-center items-center w-full px-5 md:px-10 lg:px-20 xl:px-40">

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include '../config/dbconnection.php';
            $db = new dbconnection();
            $champions = $db->getAll('champions');
            foreach($champions as $champion){
                ?>
            <div class="relative md:w-full newcard mb-3 rounded" >
                <div class="w-full">
                    <img src="<?php echo substr($champion['photo'], 3); ?>" alt="" class="w-full h-[500px] object-cover drop-shadow-xl">
                </div>
                <div class="bg-blue-400 w-[90%] absolute bottom-0 left-4 flex flex-col items-center py-2">
                    <h2 class="text-white font-bold text-2xl"><?php echo $champion['name'];?></h2>
                    <span class="text-gray-200 font-semibold "><?php echo $champion['title'];?></span>
                    <span class="text-gray-200 "><?php echo $champion['period'];?></span>
                    <span class="text-gray-800 text-xl font-bold ">" <?php echo $champion['award'];?>"</span>
                </div>
            </div>

            <?php }} ?>

        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>