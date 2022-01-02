<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:GET');
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

$query="SELECT * FROM products";

$run=mysqli_query($conn,$query);

$data=mysqli_fetch_all($run,MYSQLI_ASSOC);
 echo json_encode($data);

?>