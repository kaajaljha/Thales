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
if(isset($_GET['pay'])){
$pid= htmlspecialchars(trim($_GET['pid']));
$amount= htmlspecialchars(trim($_GET['amount']));
$pid= mysqli_real_escape_string($conn, $_GET['pid']);
$amount= mysqli_real_escape_string($conn, $_GET['amount']);
$pid= stripslashes($pid);
$amount= stripslashes($amount);
if (empty($pid)) array_push($errors, "Enter username or email address"."<br/>"); 
if($amount<=0) array_push($errors, "Enter amount must be greater then 0");
if (count($errors) == 0) {
$useradmin=$_SESSION['username'];
$cbalance ="SELECT Balance FROM Users WHERE username= '$useradmin' limit 1";
$checkb = mysqli_query($conn,$cbalance);
while ($balance = mysqli_fetch_array($checkb)) {
if($balance>0) {
$balance=$balance['Balance'];
if($balance < $amount) array_push($errors, "Check your balance and try again");
if (count($errors) == 0) {
$refno = bin2hex(random_bytes(15));
$useradmin=$_SESSION['username'];
$payerbalance = "UPDATE Users SET Balance=Balance+$amount WHERE Username='$pid' or Email='$pid' or Number='$pid'";
$userbalance = "UPDATE Users SET Balance=Balance-$amount WHERE Username='$useradmin'";
$transaction ="Insert into Transactions values(NULL,'$refno','$useradmin','$pid','Pay','$amount',now())";
if (($conn->query($payerbalance) === TRUE) and ($conn->query($userbalance) === TRUE) and ($conn->query($transaction) === TRUE)){
    array_push($errors, "Success");
    header("refresh:2;url=pay.php");
} 
else { 
      array_push($errors, "Try after some time");
}
}
}
};
}
}
?> 
     <div class="container py-5">
      <p style="text-align: right;" class="message">Hey, <a href="profile.php"><?=$_SESSION['username'];?></a><br/>
       <a href="/my/logout.php">Logout</a>
       <div class="row py-4">
       <a href=index.php><i class="fa fa-chevron-circle-left" style="font-size:36px"></i></a><br/><br/>
        <div class="col-lg-6 mx-auto">  
                <h2>Pay Money</h2><br/><br/>
                 <form action="pay.php" method="GET">  
                 <?php include('alert.php'); ?> 
                      <input type="text" name="pid" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Enter username or email address" autofocus="autofocus" required/><br/>
<input type="number" name="amount" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Enter amount" autofocus="autofocus" required/><br/>
                   <input type="submit" name="pay" value="Send" tabindex="3" class="btn btn-dark btn-block"/>
                 </form>
</div>
</div> 
</body>
</html>
