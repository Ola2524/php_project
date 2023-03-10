<?php
    $view_name = "download";

    if(isset($_GET['action'])){
        if($_GET['action'] == "download"){
            $download = new DownloadController();
            $download->checkDownload_count();
        }
    }

    if(isset($_GET['action'])){
        if($_GET['action'] == "logout"){
            $download->logout();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="main w-25 d-flex flex-column m-auto shadow p-3 mb-5 bg-body-tertiary rounded">
            <h3 class="mb-5 text-center">Welcome <?php echo isset($_SESSION['name'])? $_SESSION['name']:"" ?></h3>
            <a href="?view=download&action=download" class="btn btn-primary mb-2">Download</a>
            <a href="?action=logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>