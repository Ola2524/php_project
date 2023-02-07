<?php
    $view_name = "login";
    if(isset($_POST["submit"])){
           $login = new LoginController($_POST["email"],$_POST["password"]);
           $login->checkUser();
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-5">
            <div class="d-flex flex-column align-items-center m-auto shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 40%;">
                <form action="index.php?view=login" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input"  id="exampleCheck1">
                        <label class="form-check-label" name="remember_me" for="exampleCheck1">Remember me</label>
                    </div>
                    <div class="mb-3 text-center">
                        <a href="?view=payment">Don't have account?</a>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>