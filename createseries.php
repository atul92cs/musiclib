<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once'./config/database.php';

$table='series';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$genre=$data->genre;
$director=$data->director;
$yor=$data->yor;
$yoe=$data->yoe;
$status=$data->status;
$query='INSERT INTO '.$table.'(name,genre,director,yoe,yor,status) VALUES (:name,:genre,:director,:yoe,:yor,:status)';
if($stmt=$pdo->prepare($query))
{
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':genre',$genre);
    $stmt->bindParam(':director',$director);
    $stmt->bindParam(':yor',$yor);
    $stmt->bindParam(':yoe',$yoe);
    $stmt->bindParam(':status',$status);
    if($stmt->execute())
    {
        $response['message']='Series created';
        echo json_encode($response);
    
    }  
    else
    {
        $response['Message']='Error occured';
        echo json_encode($response);
    }
}
?>