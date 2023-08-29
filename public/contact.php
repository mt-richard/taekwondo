<?php
    include '../includes/navbar.php';
?>

<section class="py-10 md:py-10 md:px-10 lg:20 xl:px-40 2xl:px-56 z-1 mx-auto">
    <div class="container md:px-32 mx-auto text-center pb-10">
        <div class="w-full">
            <h1 class="text-[36px] font-black text-gray-900 ">Contact Us</h1>   
        </div>
        <p class="text-gray-600 font- text-lg py-5 font-light pb-5">
        If you have any question or need more information, fill the form to send us a quick message or use below contacts to get in touch with us. You can navigate using the provided map too
        </p>
    </div>

    <div class="container  w-full mx-auto pt-5">
      
      <div class="md:flex justify-center gap-5 md:px-5 xl:px-20 px-5">
        <div class="md:w-1/4 px-5 py-3  bg-blue-400 shadow-xl text-white md:rounded-xl rounded mb-2">
          <h2 class="text-lg sm:text-xl  font-bold title-font mb-2">ADDRESS</h2>
          <hr class="pt-3">
          <p class="leading-relaxed font-[500] mb-4 pt-3  font-light">KIGALI Rwanda <br>Remera Stadium </p>
        
        </div>
        <div class="md:w-1/4 px-5 py-3  bg-blue-400 shadow-xl text-white md:rounded-xl rounded mb-2">
          <h2 class="text-lg sm:text-xl  font-bold title-font mb-2">EMAIL</h2>
          <hr class="pt-3">
          <p class="leading-relaxed font-[500] mb-4 pt-3 font-light">info@rft.rw</p>
          
        </div>
        <div class="md:w-1/4 px-5 py-3  bg-blue-400 shadow-xl text-white md:rounded-xl rounded mb-2">
          <h2 class="text-lg sm:text-xl  font-bold title-font mb-2">PHONE</h2>
          <hr class="pt-3">
          <p class="leading-relaxed font-[500]  pt-3 font-light">+250 788 824 606 </p>
          <p class="leading-relaxed font-[500] mb-4 pt-3 font-light">+250 783 817 187 </p>
        
        </div>
        
      </div>
    
    </div>
  </section>

<!-- contact Form -->

<section class=" body-font overflow-hidden py-5 md:py-20 z-1 mx-auto text-gray-600 bg-gray-100 body-font  ">
      <div class="container md:px-5 2xl:px-32 py-5 mx-auto grid justify-center lg:flex gap-2 sm:flex-nowrap flex-wrap">
        <div class=" rounded md:w-1/2 lg:w-2/3 xl:w-1/2 flex flex-col w-full">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2185201974341!2d30.11352280814739!3d-1.9548479327345025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca701c8c9c5f5%3A0x113f758b9eabaa6f!2sRwanda%20Taekwondo%20Federation!5e0!3m2!1sen!2srw!4v1692746076954!5m2!1sen!2srw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- add message -->
                      <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $message = $_POST['message'];
                            $userData = [
                                "name" => $name,
                                "email" => $email,
                                "message" => $message,
                            ];
                            
                            $result = $db->save("notifications", $userData);
                            
                          if ($result['status'] == 'success') {
                            $response = $result['message'];
                          }else{
                            $response = "Failed to add Message" ;
                          }
                          $message = json_encode($response);
                          echo "<script>alert('$message'); window.history.pushState({}, '', 'contact'); window.location.reload();</script>";

                          }
                      ?>
      
        <div class=" md:w-full lg:w-1/3 flex flex-col w-full px-2">
        <form action="" method="POST">
              <p class="text-center py-5 leading-8 text-lg font-light">Leave a message Please, Don't hesitate to ask any thing or to thank.</p>
              
                  <div class=" mb-4 px-3">
                    <input type="text" required name="name" placeholder="Enter Name" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                  </div>
                  <div class=" mb-4 px-3">
                    <input type="email" required name="email" placeholder="Enter Email" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                  </div>
                  <div class=" mb-4 px-3">
                    <textarea required name="message"  placeholder="Enter the Message"  class="w-full h-44  py-2 px-6 bg-white outline-none border border-gray-300 rounded"></textarea>
                  </div>
                  <div class=" mb-4 px-3">
                  <button type="submit" name="send" class="text-white bg-blue-400  py-2 rounded font-[500] w-full">Send</button>
                  </div>
              </form>
            </div>
      </div>
      </div>
    </section>
    <?php
        include '../includes/footer.php';
    ?>
