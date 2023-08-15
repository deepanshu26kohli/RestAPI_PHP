<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-methods,Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$sid = $data['sid'];
$sname = $data['sname'];
$sage = $data['sage'];
$scity = $data['scity'];
include 'config.php';
$sql = sprintf("UPDATE `students` SET `student_name`='%s',`age`=%d,`city`='%s' where `id` = %d",$sname,$sage,$scity,$sid);
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Student record updated','status'=>true));
}
else{
    echo json_encode(array('message'=>'Student Record not updated','status'=>false));
}
?>

