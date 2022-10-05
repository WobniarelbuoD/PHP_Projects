
<style>
    #download{
        background:none;
        border:none;
        color:white;
    }
    #download:hover{
        color:purple;
        text-decoration:underline;
    }
</style>
<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    session_start();
}

if (isset($_POST['submit'])) {
    $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
    if (!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];
        $target_dir = "Random/Pictures/${file_name}";

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if (in_array($file_ext, $allowed_ext)) {
            if ($file_size <= 5242880) {
                move_uploaded_file($file_tmp, $target_dir);
                $message = '<p class="text-success">File uploaded!</p>';
            } else {
                $message = '<p class="text-danger">Too large!</p>';
            }
        } else {
            $message = '<p class="text-danger">invalid file type</p>';
        }
    }
}

if (isset($_POST['download'])) {
    $file = './Random'.$_GET['target'].'/'.$_POST['download'];

    $fileToDownloadEscaped = str_replace("&nbsp;", " ", htmlentities($file, 0, 'utf-8'));
    ob_clean();
    ob_start();
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=' . basename($fileToDownloadEscaped));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileToDownloadEscaped));
    ob_end_flush();
    readfile($fileToDownloadEscaped);
    exit;
}   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div class="container text-white">
        <h1 class='text-center p-5'>Stronk Job</h1>
        <?php

        if (isset($_POST['email']) && isset($_POST['password'])) {
            if (($_POST['email'] === 'test@mail.com') && ($_POST['password'] === 'password')) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = 'Tester';
            } else {
                print('<h2 class="text-center text-danger">Wrong email or password!</h2>');
            }
        }
        if (isset($_SESSION['login'])) {
            include('folders.php');
        } else {
            include('login.php');
        }
        ?>
    </div>
</body>

</html>