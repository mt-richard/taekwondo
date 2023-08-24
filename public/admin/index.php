<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taekwondo Federation</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              }
            }
          }
        }
      </script>
</head>




<div>
    <section class="relative flex items-center justify-center min-h-screen antialiased bg-gray-100 bg-gray-100 min-w-screen">
        
    <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-1/5 rounded-lg shadow-lg">


    <!-- php codes -->

    <?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../../config/dbconnection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbConnection = new dbconnection();
    $loginResult = $dbConnection->login($email, $password);

    if ($loginResult['status'] == 1) {
        header('Location: dashboard.php');
        exit();
    } else {
        $errorMessage = $loginResult['message'];
        echo "<script>alert('$errorMessage');</script>";
    }
}
?>

            <div class="py-10 flex justify-center items-cenetr">
                <h2 class="text-2xl font-bold text-gray-600">Login</h2>
            </div>

            <div class="md:w-full pb-5">
                <form action="" method="POST">
                    <div class=" mb-4 px-3">
                        <input type="email" id="email" required name="email" placeholder="Email address" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                    </div>
                    <div class=" mb-4 px-3">
                    <input type="password" id="password" required name="password" placeholder="********" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                    </div>
                    <div class=" mb-4 px-3">
                        <a class="text-blue-500 cursor-pointer ">Forgot Password ?</a>
                    </div>
                    
                    <div class=" mb-4 px-3">
                        <button type="submit" name="send" class="text-white bg-blue-400 hover:bg-blue-600  py-2 rounded font-[500] w-full">Login</button>
                    </div>
                    <div class=" mb-4 px-3">
                        <h2 class="text-gray-600 font-light">If you don't hve accound contact System Adminstrator</h2>
                    </div>
                </form>
            </div>
            
    
        </div>
    </section>
    
</div>