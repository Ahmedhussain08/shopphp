<?php 
session_start();
if(isset($_GET['update'])){
    
    $update = $_GET['update'];
    $_SESSION['cart'][] = array(
		"image"=> $_POST['image'],
        "id" => $_POST["id"],
        "name" => $_POST["hiddenname"],
        "price" => $_POST["hiddenprice"],
        "qty" => $_POST["qty"]
	);

    }

?>