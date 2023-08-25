

<?php include '../includes/navbar.php'; ?>
<body>

<!-- more info about rtf -->

<div>
    <div class="w-full lg:flex justify-center md:gap-10 px-10 py-10 md:py-20 bg-gray-100">
        <div class="md:w-full lg:w-1/3 h-[600px] ">
            <img src="../assets/images/52222939374_7fb699d8dd_b.jpg" alt="" class="w-full h-full object-cover rounded-tl-2xl rounded-br-2xl">
        </div>
        <div class="md:w-full lg:w-1/3 flex flex-col justify-center  px-5 md:px-1">
            <h1 class="font-bold py-3 text-3xl">Get more info about RTF</h1>
            <p class="font-light leading-8 py-5 mb-5">World Taekwondo (WT) is the International Federation (IF) governing the sport of Taekwondo and is a member of the Association of Summer Olympic International Federations (ASOIF) and International Paralympic Committee (IPC). WT leads the most inclusive and accessible combat sport, which combines the values of an ancient Asian heritage with the values of a global elite sport. Taekwondo evolves on a solid base, mixing the traditional and the modern. The values recognized by practitioners and partners are the strength of our sport. They are distilled from those found in our society: the search for pleasure, surpassing oneself, perseverance, moral and physical strength, and respect for others.</p>
            <button class=" w-1/2 bg-blue-500 text-white uppercase py-2 px-5 rounded-2xl">get in touch</button>
        </div>
    </div>
</div>

<!-- mission an dvission -->

<div>
    <div class=" md:grid grid-cols-2 lg:grid-cols-3 xl:flex justify-center md:gap-10 lg:gap-3 md:py-20 px-10">
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-mission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Mission</h1>
            <p class="font-light leading-8 ">Develop and grow Taekwondo throughout the world, from a grass roots level all the way through to an elite level, to provide all with the opportunity to play, watch and enjoy the sport regardless of age, gender, religion, ethnicity or ability.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-vission-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our Vission</h1>
            <p class="font-light leading-8 ">Taekwondo For All.</p>
        </div>
        <div class="md:w-full lg:w-full xl:w-2/5 shadow-xl px-10 py-10 rounded-tl-2xl rounded-br-2xl">
            <div class="flex justify-between">
                <span></span>
                <img src="../assets/icons/icons8-values-50.png" alt="">
            </div>
            <h1 class="font-bold text-xl py-5">Our values</h1>
            <ul class="font-light leading-6">
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Inclusiveness</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Leadership</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Respect</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Tolerance</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Excellence</li>
                <li><span class="text-[19px] leading-8 px-3">	&rarr;</span>Integrity</li>
            </ul>
        </div>

        <div class="md:w-full lg:w-full xl:w-2/5 px-10 py-10 flex justify-center items-center flex-col">
            <img src="../assets/images/banner_sarajevo_2023_wt_cadet_sub_230707.png" alt="">
            <h1 class="text-gray-800 font- text-center">Are you ready to showcase your talents and skills? Join us for an incredible opportunity to compete against the best and win amazing prizes!</h1>
        </div>
    </div>
</div>

<!-- quick review -->
<div>
    <div class="w-full md:flex gap-2 justify-center bg-gray-950 py-20">
        <div class="flex gap-6 md:w-1/6 rounded justify-center">
            <img src="../assets/icons/icons8-member-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">200</h2>
                <span class="capitalize ">members</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-knock-down-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">455</h2>
                <span class="capitalize ">Athletes</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-winners-medal-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">432</h2>
                <span class="capitalize ">awards</span>
            </div>
        </div>
        <div class="flex gap-6 md:w-1/5 rounded justify-center mb-3">
            <img src="../assets/icons/icons8-events-80.png" alt="">
            <div class="text-white flex flex-col justify-center">
                <h2 class="font text-4xl">120</h2>
                <span class="capitalize ">events</span>
            </div>
        </div>
    </div>
</div>

<!-- committe -->

<div>
    <div class="w-full flex flex-col justify-center items-center mb-5 py-10 bg-gray-100 ">
        <h2 class="text-4xl font-bold py-10">Our Committe</h2>
    

        <div class="md:flex flex-wrap gap-5 justify-center items-center w-full">

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include '../config/dbconnection.php';
            $db = new dbconnection();
            $members = $db->getAll('members');
            foreach($members as $member){
                ?>

            
            <div class="relative md:w-[400px] newcard" >
                <div class="w-full">
                <img src="<?php echo substr($member['photo'], 3); ?>" alt="" class="w-full h-[500px] object-cover drop-shadow-xl">
                </div>
                <div class="bg-blue-400 w-[90%] absolute bottom-0 left-4 flex flex-col items-center py-2">
                    <h2 class="text-white font-bold text-2xl"><?php echo $member['name']; ?></h2>
                    <span class="text-gray-200 "><?php echo $member['post']; ?></span>
                </div>
            </div>

            <?php }} ?>

        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>

