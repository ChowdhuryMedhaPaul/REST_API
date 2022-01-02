<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers:Authorization,X-Request-With');

//   error_reporting(0);
// $data=file_get_contents("php://input");
// echo $data;
// echo '{"messege":"success"}';

$data=json_decode(file_get_contents("php://input"));

// print_r($data);
// echo $data->product_name;
// echo $data->product_price;

include('db.php');
  if($data->id){
$query="DELETE FROM products WHERE id=$data->id";

$run=mysqli_query($conn,$query);

if($run){
   
    echo json_encode(['status'=>'success','msg'=>'id deleted']);
}
else{

    echo json_encode(['status'=>'failed','msg'=> 'id not found']);
}
  }

  else {
    echo json_encode(['status'=>'failed','msg'=> 'id not found']);
  }

?>