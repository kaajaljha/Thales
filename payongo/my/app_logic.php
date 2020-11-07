<?php 
session_start();
$params = session_get_cookie_params();
setcookie("PHPSESSID", session_id(), 0, $params["path"], $params["domain"],
    true,
    true
);
$errors = [];
$user_id = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'wallet');

//Create User
$location="";
if (isset($_POST['register_user'])){
  $username = htmlspecialchars(trim($_POST['user_id']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = htmlspecialchars(trim($_POST['password']));
  $username = mysqli_real_escape_string($db, $_POST['user_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $username = stripslashes($username);
  $email = stripslashes($email);
  $password = stripslashes($password);
  // validate form
  if (empty($username)) array_push($errors, "Username is required");
  if (empty($email)) array_push($errors, "Email is required");
  if (empty($password)) array_push($errors, "Password is required");
  // if no error in form, log user in
  if (count($errors) == 0) {
  $userdetails="INSERT into Users(Username,Password,Email,Balance) values('$username','$password','$email',50)";
  if ($db->query($userdetails) === TRUE) {
   array_push($errors, "Thank You!");
   $userid = bin2hex(random_bytes(15));
   $to = $email;
   $subject = "Thanks for joining PayOnGo";
   $msg = "Dear $username,
  
                Thanks for joining our services!    
                    
 
            User Id: $userid
            Note:This is a system-generated e-mail regarding your account preferences, please don't reply to this message.
            © PayOnGo
            All Right Reserved.";
    $msg = wordwrap($msg,100);
    $headers = 'From: PayOnGo  <no-reply@payongo.com>'. "\n";
    $headers .= "MIME-Version: \r\n";
    mail($to, $subject, $msg, $headers);
    header('refresh=2,url=index.php');
} else {
     array_push($errors, "Try after some time");
     header('location: signup.php?invalid_username');
}
}
}
// LOG USER IN
$user_id=$password="";
if (isset($_POST['login_user'])) {
  // Get username and password from login form
  $user_id = htmlspecialchars(trim($_POST['user_id']));
  $password = htmlspecialchars(trim($_POST['password']));
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $user_id= stripslashes($user_id);
  $password= stripslashes($password);
  // validate form
  if (empty($user_id)) array_push($errors, "Username or Email is required");
  if (empty($password)) array_push($errors, "Password is required");
  // if no error in form, log user in
  if (count($errors) == 0) {
      $sql = "SELECT Userid FROM Users WHERE (Username = '$user_id' or Email = '$user_id') and Password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1)  {
      $_SESSION['username'] = $user_id;
      $_SESSION['password'] = $password;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../home/index.php');
    }else {
      array_push($errors, "Wrong credentials");
    }
  }
}
// Backup code
if (isset($_POST['security-code'])) {
$code = htmlspecialchars(trim($_POST['code']));
$code = mysqli_real_escape_string($db, $_POST['code']);
$code = stripslashes($code);
$codevalidate = "SELECT id FROM dsc_backup WHERE `backup-codes`= '$code'";
$codes = mysqli_query($db,$codevalidate);
$row = mysqli_fetch_array($codes,MYSQLI_ASSOC);
$backup = mysqli_num_rows($codes);

  if($backup == 1) {
   $_SESSION['code'] = $code;
      header('location: ../home/index.php');
 }else {
      array_push($errors, "Wrong Backup Code");
    }
}

//reset
if (isset($_POST['reset-password'])) {
  $email = htmlspecialchars(trim($_POST['email']));
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $email= stripslashes($email);
  // ensure that the user exists on our system
  $query = "SELECT email FROM Users WHERE Email='$email'";
  $results = mysqli_query($db, $query);
  $_SESSION['email']=$email;
  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email"); 
    $sid = bin2hex(random_bytes(15));
    $to = $email;
    $subject = "Password Recovery Assistance";
    $msg = "Dear User --,
  
                    
               Sorry, your email($email) is not associated with this portal or 
               you are not authorized to do this action.

               if you believe that you are an authorized person. 
               Please report the issue to support@payongo.com
 
            Session Id: $sid
            Note:This is a system-generated e-mail regarding your account preferences, please don't reply to this message.
   

            © PayOnGo
            All Right Reserved.";
    $msg = wordwrap($msg,100);
    $headers = 'From: PayOnGo  <no-reply@payongo.com>'. "\n";
    $headers .= "MIME-Version: \r\n";
    mail($to, $subject, $msg, $headers);
    $resetid = "INSERT INTO password_reset(email, token) VALUES ('$email', '$sid')";
    $result = mysqli_query($db, $resetid);
    header('location: pending.php?email=' . $email);
  }
  $token = bin2hex(random_bytes(3));
  $sid = bin2hex(random_bytes(15));
  if (count($errors) == 0) {
    $sql = "UPDATE Users SET Password='$token' WHERE Email='$email'";
    $resetid = "INSERT INTO password_reset (email, token) VALUES ('$email', '$sid')";
    $result = mysqli_query($db, $resetid);
    $results = mysqli_query($db, $sql);
    mysqli_close($db); 
    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Password Recovery Assistance";
    $msg = "Dear User --,
  
                      Did you forget your password?
            
                     Your temporary password is:  $token
                                       
                
            Please login with this password
              
            Don\'t forgot to change your password on the next dashboard visit. 
             
            Session Id: $sid
            Note:This is a system-generated e-mail regarding your account preferences,   please don\'t reply to this message.
   

            © PayOnGo
            All Right Reserved.";
    $msg = wordwrap($msg,100);
    $headers = 'From: PayOnGo  <no-reply@payongo.com>'. "\n";
    $headers .= "MIME-Version: \r\n";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}
?>
<? include('quickalgo.html'); ?>
<script>
        document.addEventListener('contextmenu', event => event.preventDefault());
</script>
