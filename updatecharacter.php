<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='characters';
$data=json_decode(file_get_contents('php://input'));
$id=$data->id;
$name=$data->name;
$series=$data->series;
$query='update '.$table.' set name=:name,series=:series where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':series',$series);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Character updated';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>