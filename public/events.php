
<?php include '../includes/navbar.php'; ?>
<body>

<div class="py-10">
    <div class="w-full flex flex-col justify-center items-center mb-5py-5 ">
        <h2 class="text-2xl font-bold">All Event Archive</h2>
        <p class="font-light">Let see whats trending</p>
    </div>
    <div class="filter py-5"> 
      <form action="">
        <div class="md:flex gap-10 justify-center items-center px-10">
                
                <div class="border border-blue-400 px-1 mb-2"> 
                    <select class=" w-full px-6 py-3 bg-white outline-none">
                        <option value="">Year</option>
                        <option value="">2023</option>
                        <option value="">2022</option>
                        <option value="">2021</option>
                    </select>
                </div>
                <div class="border border-blue-400 px-1 mb-2">
                    <select class=" w-full px-6 py-3 bg-white outline-none">
                        <option value="">Place</option>
                        <option value="">KIGALI</option>
                        <option value="">RUSIZI</option>
                        <option value="">RUBAVU</option>
                        <option value="">RWAMAGANA</option>
                        <option value="">KAYONZA</option>
                    </select>
                </div>
                <div class="border border-blue-400 px-1 mb-2">
                    <select class="w-full px-6 py-3 bg-white outline-none">
                        <option value="">Type</option>
                        <option value="">Competions</option>
                        <option value="">Club</option>
                        <option value="">Entertainment</option>
                    </select>
                </div>
                <div>
                    <input type="button" value="FILTER" class="cursor-pointer bg-blue-400 text-white py-2 px-6 ">
                </div>

        </div>
      </form>
            
    </div>

    <div class="events py-10">
        <div >

            <!-- event -->
            <div class="flex flex-col justify-center items-center mb-5 ">
                <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                        <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                            <img src="../assets/images/brochureFile_5.jpg" alt="" class="rounded w-full h-96 object-cover">
                        </div>
                        <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                            <div class="flex gap-2 md:gap-5">
                                <div>
                                    <h2 class="text-white capitalize">days</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">hr</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">min</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">sec</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <h2 class="text-white font-bold tetx-2xl capitalize">remaining</h2>
                            </div>
                            <div class="md:py-5">
                                <h2 class="text-white font-bold py-3 text-4xl" >We are going to arrange an event</h2>
                                <p class="text-white font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, labore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, neque?</p>
                            </div>
                            <div class="pt-5">
                                <button class=" border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- event -->
            <div class="flex flex-col justify-center items-center mb-5 ">
                <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                        <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                            <img src="../assets/images/brochureFile_12.jpg" alt="" class="rounded w-full h-96 object-cover">
                        </div>
                        <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                            <div class="flex gap-2 md:gap-5">
                                <div>
                                    <h2 class="text-white capitalize">days</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">hr</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">min</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">sec</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <h2 class="text-white font-bold tetx-2xl capitalize">remaining</h2>
                            </div>
                            <div class="md:py-5">
                                <h2 class="text-white font-bold py-3 text-4xl" >We are going to arrange an event</h2>
                                <p class="text-white font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, labore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, neque?</p>
                            </div>
                            <div class="pt-5">
                                <button class=" border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <!-- event -->
              <div class="flex flex-col justify-center items-center mb-5 ">
                <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                        <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                            <img src="../assets/images/brochureFile_6.jpg" alt="" class="rounded w-full h-96 object-cover">
                        </div>
                        <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                            <div class="flex gap-2 md:gap-5">
                                <div>
                                    <h2 class="text-white capitalize">days</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">hr</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">min</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">sec</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <h2 class="text-white font-bold tetx-2xl capitalize">remaining</h2>
                            </div>
                            <div class="md:py-5">
                                <h2 class="text-white font-bold py-3 text-4xl" >We are going to arrange an event</h2>
                                <p class="text-white font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, labore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, neque?</p>
                            </div>
                            <div class="pt-5">
                                <button class=" border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <!-- event -->
              <div class="flex flex-col justify-center items-center mb-5 ">
                <div class="w-full md:w-full lg:w-4/5 xl:w-3/5 bg-blue-400">
                    <div class="md:flex gap-6 px-5 py-5 md:px-10">
                        <div class="md:w-1/2 lg:w-1/3 pb-5 md:pb-0 ">
                            <img src="../assets/images/brochureFile_13.jpg" alt="" class="rounded w-full h-96 object-cover">
                        </div>
                        <div class="md:w-2/3 px-5 py-5 flex flex-col justify-center "> 
                            <div class="flex gap-2 md:gap-5">
                                <div>
                                    <h2 class="text-white capitalize">days</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">hr</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">min</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <div>
                                    <h2 class="text-white capitalize">sec</h2>
                                    <h1 class="bg-gray-950 text-white px-5 py-3">00</h1>
                                </div>
                                <h2 class="text-white font-bold tetx-2xl capitalize">remaining</h2>
                            </div>
                            <div class="md:py-5">
                                <h2 class="text-white font-bold py-3 text-4xl" >We are going to arrange an event</h2>
                                <p class="text-white font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, labore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, neque?</p>
                            </div>
                            <div class="pt-5">
                                <button class=" border-2 border-white hover:bg-white px-5 py-2 hover:text-blue-500 text-white uppercase mt-2">join with us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


           

        </div>
    </div>
</div>

<!-- footer -->
<?php include '../includes/footer.php'; ?>
</body>