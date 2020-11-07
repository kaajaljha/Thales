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
  <title>PayOnGo · Most Advanced Digital Wallet</title>
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
     <div class="container py-5">
      <p style="text-align: right;" class="message">Hey, <a href="profile.php"><?=$_SESSION['username'];?></a><br/>
       <a href="/my/logout.php">Logout</a>
       <div class="row py-4">
        <div class="col-lg-6 mx-auto">    
          <div class="row align-items-center">        
            <div class="col">
                 <div >
                 <p class="status"><b>₹
                 <?php
                 include("includes/config.php");
                 $useradmin=$_SESSION['username'];
                 $balance ="SELECT Balance FROM Users WHERE Username= '$useradmin'";
                 $balanceuser = mysqli_query($conn,$balance);
                 while ($cbalance = mysqli_fetch_array($balanceuser)) {
                 if($cbalance>1) {
                     echo $cbalance=$cbalance['Balance'];
                 }else {
                     echo "Error";
                       }
                 };
mysqli_close($conn);
?></b></br></br>Balance</p>
                 </div>
    
            </div>
            <div class="col">
                 <div >
                 <p class="status"><a href="pay.php">Pay money</a></p>
                 </div>
    
            </div>
            <div class="col">
                <div >
                 <p class="status"><a href="add_money.php">Add money</a></p>
                 </div>
           </div>
        </div><br/><br/>
        <div class="row align-items-center">
         <div class="col">
                 <p class="status"><a href="payment_history.php">Payment</br>History</a></p>
         </div>
         <div class="col">
                 <p class="status"><a href="shop.php">Shop Online</a></p>
         </div>
        <div class="col">
                  <p class="status"><a href="transfer_request.php">Transfer to Bank</a></p>
        </div>
</div>
</div>
</div>  
Having trouble to proceed?
<br/>
Talk to our BOT!
</body>
<style>
.status{
  text-align: center;
  padding: 36px;
}
.col {
  width: 400px;
  height: 150px;
  background: #fd9;
  margin: 15px auto 10;
  box-shadow: 0px 3px 15px rgba(0,0,0,0.2);
  transition: .3s;
}
.col:hover {
  box-shadow: 0px 20px 40px rgba(0,0,0,0.4);
  transform: scale(1.05,1.05);
}
</style>
</html>
