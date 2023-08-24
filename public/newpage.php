
<?php include '../includes/navbar.php'; ?>
<body>

<div>
    <div class="bg-gray-100 md:py-10">

        <div class="w-full flex gap-2 justify-center ">
            <div class="md:w-3/5 newslist px-5 md:py-10">
                <div class="w-full py-5 flex justify-between ">
                    <div class="flex justify-center cursor-pointer items-center py-5 bg-blue-400 rounded-full w-5 h-5 p-5">
                        <h2 class="text-3xl font-bold text-white text-center mb-2 font-bold">&larr;</h2>
                    </div>
                    <span></span>
                </div>

                <div class="w-full bg-white drop-shadow-xl rounded drop-shadow-xl newcard">
                    <div class="w-full h-full bg-blue-700">
                        <img class="w-full  object-cover" src="../assets/images/GettyImages-591755236 (1).jpg" alt="" />
                    </div>
                    <div class="px-10 py-2 w-full text-right ">
                        <span>2021-09-09</span>
                    </div>
                    <div class="p-5">

                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Best Match for 2021 Competions</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem maiores veniam quam quibusdam nesciunt eos enim similique quas in facilis non, facere a mollitia sunt quia consequuntur veritatis explicabo est! Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam sit nesciunt, facere eaque eius exercitationem distinctio quae, natus voluptatem et molestias, placeat quidem velit corporis dicta voluptatibus quos inventore vero modi nihil commodi minima hic! Reiciendis quas placeat odit sint debitis dolor iusto, sunt laudantium amet architecto quo iure unde! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, beatae?</p>
                    </div>
                </div>

                <!-- comment section -->
                 <section class="relative flex flex-col items-center justify-center md:py-10 border-t antialiased bg-white bg-gray-100 ">
                    <div class="text-left w-full md:px-20 py-2 ">
                        <h2 class="uppercase font-bold text-xl py-5 border-b">COmments</h2>
                    </div>
                    
                    <div class="container px-0 mx-auto sm:px-5 md:px-40 md:py-10">
                
                        <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm mb-3">
                            <div class="flex flex-row">
                                <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Aurore MIMOSA's avatar"
                                    src="../assets/images/Aurore-Mimosa-Munyangaju-ministre-des-Sports-Rwanda-.jpeg">
                                <div class="flex-col mt-1">
                                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">Aurore MIMOSA
                                        <span class="ml-2 text-xs font-normal text-gray-500">2 weeks ago</span>
                                    </div>
                                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Wow!!! Mike will win the cup?
                                    </div>
                                    <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                                        <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                                            viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                                fill-rule="nonzero" />
                                        </svg>
                                    </button>
                                    <button class="inline-flex items-center px-1 -ml-1 flex-column">
                                        <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                           
                        </div>

                        <div class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4md:px-4 sm:rounded-lg sm:shadow-sm mb-3">
                            <div class="flex flex-row">
                                <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Aurore MIMOSA's avatar"
                                    src="../assets/images/Aurore-Mimosa-Munyangaju-ministre-des-Sports-Rwanda-.jpeg">
                                <div class="flex-col mt-1">
                                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">Aurore MIMOSA
                                        <span class="ml-2 text-xs font-normal text-gray-500">2 weeks ago</span>
                                    </div>
                                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Wow!!! Mike will win the cup?
                                    </div>
                                    <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                                        <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                                            viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                                fill-rule="nonzero" />
                                        </svg>
                                    </button>
                                    <button class="inline-flex items-center px-1 -ml-1 flex-column">
                                        <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                           
                        </div>
                
                    </div>

                     <!-- comment forms -->
                     <div class=" w-full md:px-20 py-5 border-t md:flex">
                            <div class="md:w-1/2">
                                <h2 class="py-2 font-bold text-xl text-gray-700">Leave comment</h2>
                                <p class="text-gray-700 font-normal pb-5">Dont hesitate to comment your idea</p>
                            </div>
                            <div class="md:w-full">
                                <form action="" method="POST">
                                    <div class=" mb-4 px-3">
                                        <input type="text" id="name" required name="name" placeholder="Name" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                    <input type="email" id="email" required name="email" placeholder="Email" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    <div class=" mb-4 px-3">
                                    <textarea id="message" placeholder="Message" required name="message" class="w-full h-44  py-2 px-6 bg-white outline-none border border-gray-300 rounded"></textarea>
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