<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: * ');
$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];

// header('Vary: Origin');
// header('Access-Control-Allow-Methods: POST');
include 'config.php';
$sql = sprintf("SELECT * FROM students Where id = %d",$student_id);
$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output); 
}
else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}
?>
