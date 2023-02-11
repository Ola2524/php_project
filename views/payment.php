<?php
    $view_name = "payment";
    if(isset($_POST["submit"])){
      $valid = new PaymentController($_POST["email"],$_POST['password'],$_POST["confpassword"],$_POST['name'],$_POST['creditcard'],$_POST['expirationdate']);
      $valid->validateEmail();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>payment</title>
</head>
<body>
    
<div class="container  mt-5">
<form action="#" method="POST" class=" row g-3">
  <div class="col-md-6">
  <label for="name" class="form-label">Name </label>
    <input type="text" class="form-control"name="name"placeholder="">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control"name="email"placeholder="">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="">
    <label for="inputPassword4" class="form-label">confierm Password</label>
    <input type="password" class="form-control"name="confpassword"placeholder="">

    <label for="inputAddress" class="form-label">Credit Card</label>
    <input type="text" class="form-control" name="creditcard" id="inputAddress" placeholder="">

    <label for="inputAddress2" class="form-label">expiration date</label>
    <input type="text" class="form-control"name="expirationdate"placeholder="">
  </div>
  
  
  <div class="col-12">
    <button  name="submit" type="submit" class="btn btn-primary">registration</button>
  </div>
</form>
</div>