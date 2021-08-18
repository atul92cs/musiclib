<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: DELETE');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
 include_once'./config/database.php';
 $table='characters';
 $data=json_decode(file_get_contents('php://input'));
 $id=$data->id;
 $query='delete from '.$table.' where id=:id';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':id',$id);
 if($stmt->execute())
 {
    $response['message']='character deleted';
    echo json_encode($response);
 }
 else
 {
    $response['message']='error occured';
    echo json_encode($response);
 }
?>