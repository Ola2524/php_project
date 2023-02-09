<?php
    $view_name = "payment";
    if(isset($_POST["submit"])){
      $valid = new ValidationController($_POST["email"],$_POST['password'],$_POST["confpassword"],$_POST['name'],$_POST['creditcard'],$_POST['expirationdate']);
      $valid->validateEmail();
}
//     $errors = array();
// $default_name = isset($_POST["name"]) ? $_POST["name"] : "";
// $default_email = isset($_POST["email"]) ? $_POST["email"] : "";
// $default_password = isset($_POST["password"]) ? $_POST["password"] : "";

// if (isset($_POST["submit"])) {
//     require_once("config.php");
//     if (!isset($_POST["email"]) || empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
//         $errors[] = "Email is not valid";


//     if (!isset($_POST["name"]) || empty($_POST["name"]) || strlen($_POST["name"]) > $max_name_length)
//         $errors[] = "Name is not valid";

//     if (!isset($_POST["password"]) || empty($_POST["password"]) || strlen($_POST["password"]) > $max_message_length||strlen($_POST["password"]>$MIN_PASSWORD))
//         $errors[] = "Message is not valid";

//     if (empty($errors)) {
//         echo "<H3>".$thank_you_message. "</H3><p>";
     
//         echo "<b>Name: </b>" . $_POST["name"] . "<br/>";
//         echo "<b>Email: </b>" . $_POST["email"] . "<br/>";
//         echo "<b>Message: </b>" . $_POST["message"] . "</p><br/>";
//         exit();
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container  mt-5">
<form action="#" method="POST" class=" row g-3">
  <div class="col-md-6">
  <label for="name" class="form-label">Name </label>
    <input type="text" class="form-control"name="name"placeholder="your name">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control"name="email"placeholder="zyx@zxy.com">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="**********">
    <label for="inputPassword4" class="form-label">confierm Password</label>
    <input type="password" class="form-control"name="confpassword"placeholder="**********">

    <label for="inputAddress" class="form-label">Credit Card</label>
    <input type="text" class="form-control" name="creditcard" id="inputAddress" placeholder="1111-1111-1111-1111 ">

    <label for="inputAddress2" class="form-label">expiration date</label>
    <input type="text" class="form-control"name="expirationdate"placeholder="MM/YY">
  </div>
  
  
  <div class="col-12">
    <button  name="submit" type="submit" class="btn btn-primary">registration</button>
  </div>
</form>
</div>