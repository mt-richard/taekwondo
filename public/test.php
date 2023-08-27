

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../config/dbconnection.php';
    $db = new dbconnection();
    $events = $db->getlatestEvent();
    echo json_encode($events);
    
}
    ?>