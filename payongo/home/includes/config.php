<?php

$conn=new mysqli("localhost", "root", "", "wallet");



if($conn->connect_error)

{

    die("Connection failed".$conn->connect_error);

}

?>

