
<?php
require_once 'connection.php';

if(isset($_POST['submit'])){
      $firstname = $_REQUEST['firstname'];
      $lastname = $_REQUEST['lastname'];
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      $hashed_password = sha1($_REQUEST['password']);
      $gender = $_REQUEST['same'];
      $phone = $_REQUEST['phone'];
      $address = $_REQUEST['address'];
      $postal = $_REQUEST['postal'];
}
try{
  $SQLInsert = "INSERT INTO signup(first_name, last_name, email, password, gender, phone_no, postal_code, currentdate) VALUES(:firstname, :lastname, :email, :password, :gender, :phoneno, :postalcode, now())";
  $statement = $conn->prepare($SQLInsert);
  $statement->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':password' => $hashed_password, ':gender', => $gender, ':phoneno', => $phone, ':postalcode', =>$postal));
  if($statement->rowCount()==1){
    $result = header('location:login-form.php');
  }
}catch(PDOException $e){
  echo "Error:" .$e->getMessage();
}

?>
<?php

if(isset($_REQUEST['submit'])){
  $cookie_name =  'user_first-name';
$cookie_value = $_REQUEST['firstname'];
$cookie_expire =  time()+60*60*24*360;
setCookie($cookie_name, $cookie_value, $cookie_expire,'/');

}

if(isset($_REQUEST['submit'])){
  $cookie_name =  'user_email';
$cookie_value = sha1($_REQUEST['email']);
$cookie_expire =  time()+60*60*24*360;
setCookie($cookie_name, $cookie_value, $cookie_expire,'/');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
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
<script src="https://kit.fontawesome.com/81e44cc2a9.js"></script>
<link rel="stylesheet" type="text/css" href="signup.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  <div class="header">
    <div class="home"><a style="text-decoration: none;" href="/../foods/index.php" ><i class="fas fa-home"></i> Home</div> </a>
  </div>
  <form action="" onsubmit="return validation()" method="POST">
    <div class="main">
      <div class="inner">
  <i class="fas fa-user"></i> <input type="text" class="input-fields first-name" placeholder="Enter Your First Name" value="" name="firstname" size="33"><br>
  <span></span>
  <br><br>
   
  
  <i class="fas fa-user"></i> <input type="text" class="input-fields" placeholder="Enter Your Last Name" value="" name="lastname" size="33"><br>
  <span></span>
  <br><br>


   <i class="fas fa-at"></i> <input type="email" class="input-fields" placeholder="Email Address" value="" name="email" size="33"><br>
   <span></span>
   <br><br>


  <i class="fas fa-lock"></i> <input type="password" class="input-fields" placeholder="Password" value="" name="password" size="33" id="pass1"><i class="far fa-eye" id="eye1"></i><br>
  <span></span>
  <br><br>


  <i class="fas fa-lock"></i> <input type="password" class="input-fields" placeholder="Re-type Password" value="" name="repassword" size="33" id="pass2"><i class="far fa-eye" id="eye2"></i><br>
  <span></span>
  <br><br>


  <i class="fas fa-venus-mars"></i> Gender<br><br><input type="radio" class="input-fields" placeholder="Gender" value="" name="same" >
  
 <i class="fas fa-mars"></i>  Male <input type="radio" class="input-fields" placeholder="Gender" value="" name="same" ><i class="fas fa-venus"></i> Female<br>
 <span></span>
 <br><br>


  <i class="fas fa-phone-square-alt"></i> <input type="text" class="input-fields" placeholder="Phone No." value="" name="phone" size="33"><br>
  <span id="phone"></span>
  <br><br>


  <i class="fas fa-home"></i> <input type="text" class="input-fields" placeholder="Write your address" value="" name="address" size="33"><br>
  <span></span>
  <br><br> 


  <i class="fas fa-mail-bulk"></i> <input type="text" class="input-fields" placeholder="write your postal code" value="" name="postal" size="33"><br>
  <span id="postal"></span>
  <br><br>





  <input type="submit" class="submit"  value="Submit" name="submit" >

</div>
</div>
</form>
<script>
   
   let pwd1 = document.getElementById("pass1");
   let eye1 = document.getElementById("eye1");
   let pwd2 = document.getElementById("pass2");
   let eye2 = document.getElementById("eye2");
   eye1.addEventListener("click", togglepass);
   function togglepass(){
   eye1.classList.toggle('active');
   (pwd1.type == 'password') ? pwd1.type = 'text' :
   pwd1.type = 'password';
   }
   eye2.addEventListener('click',togglepass1);
   function togglepass1(){
   eye2.classList.toggle('active');
   (pwd2.type == 'password') ? pwd2.type = 'text':
   pwd2.type = 'password';
   }
  
   
function validation(){
  var fn = document.querySelectorAll("input")[0].value;
   var ln = document.querySelectorAll("input")[1].value;
   var em = document.querySelectorAll("input")[2].value;
   var pass = document.querySelectorAll("input")[3].value;
   var repass = document.querySelectorAll("input")[4].value;
   var male = document.querySelectorAll("input")[5].value;
   var female = document.querySelectorAll("input")[6].value;
   var ph = document.querySelectorAll("input")[7].value;
   var address = document.querySelectorAll("input")[8].value;
   var pcode = document.querySelectorAll("input")[9].value;

   let fncheck = /^[A-Za-z. ]{3,30}$/;
   let lncheck = /^[A-Za-z. ]{3,30}$/;
   let emcheck = /^[A-Za-z0-9]{3,}[@]{1}[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
   let passcheck = /^(?=.*[0-9])(?=.*[A-Z])[A-Za-z0-9]{8,30}$/;
   let phcheck = /^[0-9]{8,10}$/;
   let pcodecheck = /^[0-9]{4}$/;
   
   if(fncheck.test(fn)){
     document.querySelectorAll("span")[0].innerHTML = " ";
   }else{
    document.querySelectorAll("span")[0].innerHTML = "** Please write something and also only English Letters";
    return false;
   }
   if(lncheck.test(ln)){
     document.querySelectorAll("span")[1].innerHTML = " ";
   }else{
    document.querySelectorAll("span")[1].innerHTML = "** Please write something and also only English Letters";
    return false;
   }
   if(emcheck.test(em)){
     document.querySelectorAll("span")[2].innerHTML = " ";
   }else{
    document.querySelectorAll("span")[2].innerHTML = "** Please Write Valid Email Address";
    return false;
   }
   if(passcheck.test(pass)){
     document.querySelectorAll("span")[3].innerHTML = " ";
   }else{
    document.querySelectorAll("span")[3].innerHTML = "** Please Write Atleast one Capital Letter one small <br> letter and one number and write Atleast 8 charaters";
    return false;
   }
   if(pass.match(repass)){
     document.querySelectorAll("span")[4].innerHTML = " ";
   }else{
    document.querySelectorAll("span")[4].innerHTML = "** Passwords Do not Match. Please write same passwords";
    return false;
   }
   if(phcheck.test(ph)){
     document.getElementById("phone").innerHTML = " ";
   }else{
    document.getElementById("phone").innerHTML = "** Please wirte valid phone number at least 8 digits";
    return false;
   }
   if(pcodecheck.test(pcode)){
     document.getElementById("postal").innerHTML = " ";
   }else{
    document.getElementById("postal").innerHTML = "**write onle 4 digits";
    return false;
   }

}


</script>

</body>
</html>
