<?php
ini_set( "display_errors", 0); //Disable all 
error_reporting(0); // Disable all errors.
session_start();
if(empty($_SESSION['username'] && $_SESSION['password']))
{
          header("Location: ../my");
          exit;
}
?>
<!--main Area-->
<html>
<head>
<title><?=$_SESSION[username];?> ·  PayOnGo · Most Advanced Digital Wallet</title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/app.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="static/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
<div class="container py-5">
      <p style="text-align: right;" class="message">Hey, <a href="profile.php"><?=$_SESSION['username'];?></a><br/>
       <a href="/my/logout.php">Logout</a>
       <div class="row py-4">
       <a href=index.php><i class="fa fa-chevron-circle-left" style="font-size:36px"></i></a><br/><br/>
        <div class="col-lg-6 mx-auto">  
			<h2><?=$_SESSION[username]?>'s Profile</h2>
			<div>
				<table>
                                      <tr>
						<td>Username:</td>
						<td><?=$_SESSION['username'];?></td>
					</tr>
					
					<tr>
						<td>Password:</td>
						<td>
<form action="profile.php" method="POST">
      <input type=text name='newpass' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password" required/>
<a title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><img src="https://image.flaticon.com/icons/png/512/18/18436.png" height="20px"/></a>
      <input type="submit" name="passwordupdate" value='Update' style="color: #fff; margin-left: 20px; background-color:#000000 ;border-radius: 4px;padding: 5px; ">
</form>
<?php
include("includes/config.php");
$newpass="";
if(isset($_POST['passwordupdate'])){
$newpass=$_POST['newpass'];
$useradmin=$_SESSION['username'];
$update = "UPDATE Users SET password='$newpass' WHERE username='$useradmin'";
if ($conn->query($update) === TRUE) {
    echo "Password Changed";
} 
else { 
     echo "Error updating record: " . $conn->error; 
}
}
mysqli_close($conn);
?>
</td>
<td></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>
<?php
include("includes/config.php");
$useradmin=$_SESSION['username'];
$emails ="SELECT email FROM Users WHERE username= '$useradmin'";
$emailuser = mysqli_query($conn,$emails);
while ($email = mysqli_fetch_array($emailuser)) {
if($email>0) {
         echo $email=$email['email'];
 }else {
     echo "Error";
    }
};
mysqli_close($conn);
?>
</td>
<td></td>
</tr>
 <!--<?php
include("includes/config.php");
$useradmin=$_SESSION['username'];
$numbers ="SELECT Number FROM Users WHERE Username= '$useradmin' && numverify=0";
$numberuser = mysqli_query($conn,$numbers);
while ($number = mysqli_fetch_array($numberuser)) {
if($number>0) {
?>
                                          <tr>
						<td>Phone Number:</td>
						<td><input type=number value=<?=$number['Number'];?>>
						<input type=submit name=passwordupdate value=Update style=color: #fff; margin-left: 20px; background-color:#000000 ;border-radius: 4px;padding: 5px;>
				<?php		}};
						?>
						
						else

</td>-->
<td></td>
</tr>
				</table>
			</div>
		</div>
<style>
.content {
	width: 1000px;
	margin: 0 auto;
}
.content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
}
.content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
}
</style>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>
