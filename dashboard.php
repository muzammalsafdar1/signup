<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php if(!isset($_SESSION['phone_no'])): header("location:logout.php"); ?>
<?php else: ?>
<?php endif: ?>

<?php echo "<h1>welcome" .$_SESSION['phone_no']. "to dashboard</h1>" ?>
</body>
</html>