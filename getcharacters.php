<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='characters';
$data=json_decode(file_get_contents("php://input"));
$id=$data->id;
$query='select characters.id as id, characters.name as name,series.name as series,genre.name as genre from '.$table.' join series on characters.series=series.id join genre on series.genre=genre.id where series.id=:id';
$stmt=$pdo->prepare($query);
$stmt=bindParam(':id',$id);
if($stmt->execute())
{
    $char=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['characters'=>$char]);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>