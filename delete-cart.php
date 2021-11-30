<?php
session_start();
require 'models/Cart.php';

if (isset($_SESSION["mycart"]) && isset($_GET["id"])) {
    $id=$_GET["id"];
    Cart::DeleteCart($id);
    header("Location: cart.php");
    exit; // dừng các mã chạy phía dưới;
}

?>