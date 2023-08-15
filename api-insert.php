<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-methods,Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$sname = $data['sname'];
$sage = $data['sage'];
$scity = $data['scity'];
// header('Vary: Origin');
// header('Access-Control-Allow-Methods: POST');
include 'config.php';
$sql = sprintf("INSERT into students(student_name,age,city) values('{$sname}','{$sage}','{$scity}')");
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Student record inserted','status'=>true));
}
else{
    echo json_encode(array('message'=>'Student Record not Inserted','status'=>false));
}
?>
