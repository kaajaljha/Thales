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
     <div class="container py-5">
      <p style="text-align: right;" class="message">Hey, <a href="profile.php"><?=$_SESSION['username'];?></a><br/>
       <a href="/my/logout.php">Logout</a>
       <div class="row py-4">
       <a href=index.php><i class="fa fa-chevron-circle-left" style="font-size:36px"></i></a><br/><br/>
        <div class="col-lg-6 mx-auto">  
                <h2>Shop Online</h2><br/><br/>
                 <p>Under progress, we are looking fo our shoping partners.</p>
       </div>
    
                 </form>
</div>
</div> 
</body>
</html>
