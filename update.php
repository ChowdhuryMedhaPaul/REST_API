<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:PUT');
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
  if($data->id)
  {
      $query="SELECT * FROM products WHERE id=".$data->id;
      $run=mysqli_query($conn,$query);
      $product=mysqli_fetch_all($run);

      $product_name=$product['product_name'];
      $product_price=$product['product_price'];
      $stock=$product['stock'];
      $discount=$product['discount'];

      if($data->product_name!='')
      {
          $product_name=$data->product_name;
      }
      if($data->product_price!='')
      {
          $product_price=$data->product_price;
      }

      if($data->stock!='')
      {
          $stock=$data->stock;
      }

      if($data->discount!='')
      {
          $discount=$data->discount;
      }
    //  echo $product_name;
    //  echo $product_price;
    //  echo $stock;
    //  echo $discount;

      $query2="UPDATE products SET";
      $query2.="product_name='$product_name',";
      $query2.="product_price=$product_price,";
      $query2.="stock=$stock,";
      $query2.="discount=$discount  WHERE id=".$data->id;


$run2=mysqli_query($conn,$query2);

if($run2){
   
    echo json_encode(['status'=>'success','msg'=>'id updated']);
}
else{

    echo json_encode(['status'=>'failed','msg'=> 'id not found']);
}

 }


else{
    echo json_encode(['status'=>'failed','msg'=> 'id not found']);
  }
  

?>