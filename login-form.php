<?php

require_once 'session.php';
require_once 'connection.php';
if(isset($_REQUEST['submit'])){
  $phone = $_REQUEST['phone-no'];
  $pass =  $_REQUEST['password'];
  
  try{
    $sql = "SELECT * FROM signup WHERE phone_no = :phoneno";
    $statement = $conn->prepare($sql);
    $statement->execute(array(':phoneno'=>$phone));
    while($row = $statement->fetch()){
    $id = $row['id'];
    $phone_no = $row['phone_no'];
    $password = $row['password'];
    if(password_verify($password, $hashed_password)){
    $_SESSION['id'] = $id;
    $_SESSION['phone_no'] = $phone_no;
    $_SESSION['password'] = $password;
    header('location: dashboard.php');
    }
    else{
      echo "error";
    }
    }
  }
  catch(PDOException $e){
     echo "error:" . $e->getMessage();
  }
}

$cookie_phone =  'user-phone';

if(isset($_REQUEST['submit'])){
  $cookie_value = sha1($_REQUEST['phone-no']);
  $cookie_expire = time()+60*60*24*360;
  setCookie($cookie_phone, $cookie_value, $cookie_expire, '/'); 
}
$cookie_phone =  'password';

if(isset($_REQUEST['submit'])){
  $cookie_value = sha1($_REQUEST['password']);
  $cookie_expire = time()+60*60*24*360;
  setCookie($cookie_phone, $cookie_value, $cookie_expire, '/'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/81e44cc2a9.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<link rel="stylesheet" type="text/css" href="login-form.css">
<body>
  <div class="upper-div"> <a href="\../foods/index.php"><i class="fas fa-home"></i></a></div>
 <form action="" method="POST">
  <div class="main-form-div">
      <i class="fas fa-user"></i>
    <div class="inner-form-div">
      <div class="text-div">
        <div class="phone-icon-div"><i class="fas fa-phone-alt"></i></div>
         <div class="phone-input-div">
            <form action="" method="" autocomplete="off"> 
          <input type="text" placeholder=" Write your phone no" class="phone-no" name="phone-no" value="" id="phone_no"></div>
        
        </div><br><br>


          <div class="password-div">
            <div class="password-font-div"><i class="fas fa-unlock-alt"></i></div>
             <div class="password-input-div"><input type="password"  placeholder="Write your password" class="password" name="password" value="" id="password"><i class="far fa-eye" id="eye"></i></div>
        
          </div><br><br>

    <input type="submit" value="Submit" class="submit-btn" name="submit"><br><br><br>
    </form>
    <span><a href="\..\foods/login-form/forget_password.php">Forget Password ?</a></span><br><br>
    Do not have account? <span><a href="\..\foods/signup/signup.php">Sign Up here...!</a></span>

    </div>

  </div>
</body>
<script>
 let eye = document.getElementById("eye");
 let pass = document.getElementById("password");
 eye.addEventListener("click", togglebtn);
 function togglebtn(){
   eye.classList.toggle('active');
   (pass.type == 'password') ? pass.type = 'text': pass.type = 'password';
 }

</script>
</html>