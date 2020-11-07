<?php 
session_start();
if(empty($_SESSION['username'] && $_SESSION['password']))
{
          header("Location: ../my");
          exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PayOnGo · Most Advanced Digital Wallet</title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/app.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="static/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
   <body>
   <?php
$errors = [];
include("includes/config.php");
if(isset($_POST['add'])){
$amount= $_POST['amount'];
if($amount<=0) array_push($errors, "Enter amount must be greater then 0");
if (count($errors) == 0) {
$useradmin=$_SESSION['username'];
$refno = bin2hex(random_bytes(15));
$addmoney = "UPDATE Users SET Balance=Balance+$amount WHERE Username='$useradmin'";
$transaction ="Insert into Transactions values(NULL,'$refno','$useradmin','$useradmin','Add','$amount',now())";
if (($conn->query($transaction) === TRUE) and ($conn->query($addmoney) === TRUE)){
    array_push($errors, "Success");
    header( 'refresh:2;url=add_money.php?added');
} 
else { 
      array_push($errors, "Try after some time");
}
}
}
?>
     <div class="container py-5">
      <p style="text-align: right;" class="message">Hey, <a href="profile.php"><?=$_SESSION['username'];?></a><br/>
       <a href="/my/logout.php">Logout</a>
       <div class="row py-4">
       <a href=index.php><i class="fa fa-chevron-circle-left" style="font-size:36px"></i></a><br/><br/>
        <div class="col-lg-6 mx-auto">  
                <h2>Add Money</h2><br/><br/>
                 <form action="add_money.php" method="POST">  
                 <?php include('alert.php'); ?>                    
<input type="number" name="amount" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Enter amount" autofocus="autofocus" /><br/>
                   <input type="submit" name="add" value="Add" tabindex="3" class="btn btn-dark btn-block"/>
<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_Fy0kfvDN3Sjj3v"> </script> </form>
    
</div>
    
                 </form>
</div>
</div> 
</body>
</html>
