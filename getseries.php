<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='series';
$query='select series.id as id, series.name as name,genre.name as genre,series.yor as yor,series.yoe as yoe ,series.status as status,director.name as director from '.$table.' join genre on series.genre=genre.id join director on series.director=director.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $char=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['series'=>$char]);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}

?>