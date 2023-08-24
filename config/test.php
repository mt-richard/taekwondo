<?php

require_once('dbconnection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('php://input');
    $obj = json_decode($data);
    var_dump($obj);
    // echo json_encode($data);
    $userData = [
        "name" =>$obj->name,
        "regno" =>$obj->regno,
        "email" =>$obj->email,
        "department" =>$obj->department];
    $db = new dbconnection();
    $result = $db->save("student", $userData);
    $response = ["message"=>"Failed to add student".$result, "status"=>0];
    if(is_int($result)){
        $response = ["message"=>"record added", "status" =>1, "id"=>$result];
    }
    echo (json_encode($response));
}

?>


<?php
// echo $_SERVER['REQUEST_METHOD'];
require_once('dbconnection.php');
switch ($_SERVER['REQUEST_METHOD']) {
    case "POST":
        $data = file_get_contents('php://input');
        $obj = json_decode($data);
        var_dump($obj);
        // echo json_encode($data);
        $userData = [
            "name" =>$obj->name,
            "email" =>$obj->email,
            "address" =>$obj->address];
        $db = new dbconnection();
        $result = $db->save("student", $userData);
        $response = ["message"=>"Failed to Save".$result, "status"=>0];
        if(is_int($result)){
            $response = ["message"=>"User added", "status" =>1, "id"=>$result];
        }
        echo (json_encode($response));
        break;

    case "GET":
        $db = new dbconnection();
        // var_dump($db->getAll("users"));
        echo json_encode($db->getAll("users"));
        break;

    case "PUT":
        echo "PUT working";
        break;

    case "PATCH":
        echo "PACH working";
        break;

    case "DELETE":
        $db = new dbconnection();
        echo json_encode($db->destroy("users"));
        break;

    default:
        echo "Nothing you done";
        break;
}

?>

