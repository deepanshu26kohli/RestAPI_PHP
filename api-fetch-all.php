<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: * ');
// header('Vary: Origin');
// header('Access-Control-Allow-Methods: POST');
include 'config.php';
$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
if(mysqli_num_rows($result)>0){
    $output['result'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $output['total'] = mysqli_num_rows($result);
    
    echo json_encode($output); 
}
else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}
?>
