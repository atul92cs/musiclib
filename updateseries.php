<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='series';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$director=$data->director;
$genre=$data->genre;
$yor=$data->yor;
$yoe=$data->yoe;
$status=$data->status;
$id=$data->id;
$query='update '.$table.' set name=:name,genre=:genre,director=:director,yor=:yor,yoe=:yoe,status=:status where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':genre',$genre);
$stmt->bindParam(':director',$director);
$stmt->bindParam(':yor',$yor);
$stmt->bindParam(':yoe',$yoe);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Series updated';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>