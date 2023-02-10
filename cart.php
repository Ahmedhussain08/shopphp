<?php 
session_start();


if(isset($_POST['add_to_cart'])){
    $name = $_POST['hiddenname'];
    $price = $_POST['hiddenprice'];
    $quantity = $_POST['qty'];
    $product = array($name,$price,$quantity);

    // print_r($product);
    $_SESSION[$name]= $product;
    header("location:product-detail.php");
}
?>