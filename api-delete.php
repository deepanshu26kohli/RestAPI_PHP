<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: * ');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-methods,Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];

// header('Vary: Origin');
// header('Access-Control-Allow-Methods: POST');
include 'config.php';
$sql = sprintf("DELETE  FROM `students` Where `id` = %d",$student_id);

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Student Record Deleted','status'=>true));
}
else{
    echo json_encode(array('message'=>'Student Record Not Deleted','status'=>false));
}
?>
