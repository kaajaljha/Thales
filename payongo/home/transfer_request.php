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
if(isset($_POST['widhraw'])){
$uname= htmlspecialchars(trim($_POST['uname']));
$ifsc= htmlspecialchars(trim($_POST['ifsc']));
$accountno= htmlspecialchars(trim($_POST['accountno']));
$amount= htmlspecialchars(trim($_POST['amount']));
$uname= mysqli_real_escape_string($conn, $_POST['uname']);
$ifsc= mysqli_real_escape_string($conn, $_POST['ifsc']);
$accountno= mysqli_real_escape_string($conn, $_POST['accountno']);
$amount= mysqli_real_escape_string($conn, $_POST['amount']);
$uname= stripslashes($uname);
$ifsc= stripslashes($ifsc);
$accountno= stripslashes($accountno);
$amount= stripslashes($amount);
if (empty($uname)) array_push($errors, "Enter bank account holder name "."<br/>"); 
if (empty($ifsc)) array_push($errors, "Enter IFSC Code"."<br/>"); 
if (empty($accountno)) array_push($errors, "Enter account number "."<br/>"); 
if($amount<=0) array_push($errors, "Enter amount must be greater then 0");
if (count($errors) == 0) {
$useradmin=$_SESSION['username'];
$cbalance ="SELECT Balance FROM Users WHERE username= '$useradmin' limit 1";
$checkb = mysqli_query($conn,$cbalance);
while ($balance = mysqli_fetch_array($checkb)) {
if($balance>0) {
$useradmin=$_SESSION['username'];
$balance=$balance['Balance'];
if($balance < $amount) array_push($errors, "Check your balance and try again");
if (count($errors) == 0) {
$rid = bin2hex(random_bytes(15));
$sid=$_SESSION['username'];
$widhrawbalance = "INSERT into Transfertobank values('$rid','$sid','$accountno','$ifsc','$uname','$amount',now())";
$userbalance = "UPDATE Users SET Balance=Balance-$amount WHERE Username='$useradmin'";
$transaction ="Insert into Transactions values(NULL,'$rid','$sid','$uname','Transfer to bank','$amount',now())";
if (($conn->query($widhrawbalance) === TRUE) && ($conn->query($userbalance) === TRUE) && ($conn->query($transaction) === TRUE)){
    array_push($errors, "Success");
    header('refresh:2;url=transfer_request.php?requested');
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
                <h2>Enter payee bank details</h2><br/><br/>
                 <form action="transfer_request.php" method="POST">  
                 <?php include('alert.php'); ?> 
                      <input type="text" name="uname" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Bank account holder name" autofocus="autofocus" /><br/>
                      <input type="text" name="ifsc" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="IFSC code" autofocus="autofocus" /><br/>
                      <input type="number" name="accountno" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Account number" autofocus="autofocus" /><br/>
<input type="number" name="amount" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off"  placeholder="Enter amount" autofocus="autofocus" /><br/>
                   <input type="submit" name="widhraw" value="Transfer Money" tabindex="3" class="btn btn-dark btn-block"/>
                 </form>
</div>
</div> 
</body>
</html>
