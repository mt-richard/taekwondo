
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

