<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFT Admin Portal</title>
    <link rel="icon" href="../../assets/icons/RTF-Logo-Circle.ico" type="image/x-icon">
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


   <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        $errorMessage = "Invalid email address.";
    } elseif (strlen($password) < 8) { 
        $errorMessage = "Password must be at least 8 characters long.";
    } else {
        include '../../config/dbconnection.php';
        $db = new dbconnection();
        $loginResult = $db->login($email, $password);

        if ($loginResult['status'] == 1) {
            session_start();
            $_SESSION['username'] = $loginResult['user'];
            header('Location: /admin/dashboard');
            exit();
        } else {
            $errorMessage = $loginResult['message'];
        }
    }
    $message = json_encode($errorMessage);
    // echo json_encode($message);
    echo "<script>alert('$message');</script>";
}

?>

<div>
    <section class="relative flex items-center justify-center min-h-screen antialiased bg-gray-100 bg-gray-100 min-w-screen px-5">

        <div class="container px-3 mx-auto sm:px-5 bg-white p-5 md:w-3/5 lg:w-1/3 xl:w-1/4 rounded-lg shadow-lg">

            <div class="py-10 flex justify-center items-center">
                <h2 class="text-2xl font-bold text-gray-600">Login</h2>
            </div>

            <div class="md:w-full pb-5">
                <form action="" method="POST">
                    <div class=" mb-4 px-3">
                        <label for="" class="text-[14px] font-light text-gray-600">Enter Email address : </label>
                        <input type="email" id="email" required name="email" placeholder="Email address"
                            class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                    </div>
                    <div class=" mb-4 px-3">
                        <label for="" class="text-[14px] font-light text-gray-600">Enter Password : </label>
                        <input type="password" id="password" required name="password" placeholder="********"
                            class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                    </div>
                    <div class=" mb-4 px-3">
                        <a class="text-blue-500 cursor-pointer ">Forgot Password ?</a>
                    </div>

                    <div class=" mb-4 px-3">
                        <button type="submit" name="send"
                            class="text-white bg-blue-400 hover:bg-blue-600  py-2 rounded font-[500] w-full">Login</button>
                    </div>
                    <div class=" mb-4 px-3">
                        <h2 class="text-gray-600 font-light">If you don't have an account, contact the System Administrator</h2>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
