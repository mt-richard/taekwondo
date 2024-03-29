<?php
include '../../config/dbconnection.php';
$db = new dbconnection();

    session_start();
    function isUserLoggedIn() {
        return isset($_SESSION['username']);
    }

    if (isUserLoggedIn()) {
      
 ?>



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
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<style>

.current-page{
  background-color: #2563eb;
  padding-left: 5px;
  padding-right: 5px;
  border-radius: 3px;
  color: white;

}
</style>

</head>

 <nav class="bg-gray-600 p-4 flex items-center justify-between">
    <div>
      <h1 class="text-white text-xl font-semibold">RFT Admin Portal</h1>
    </div>
    <div class="flex items-center space-x-4">
      <span class="text-white capitalize"><?php $user = $_SESSION['username']; echo $user['username'] ?></span>
      <i class="fas fa-user-circle text-white text-2xl"></i>
    </div>
  </nav>


  <?php 
  } else {
    header('location: /public/admin/index.php');
  }

?>