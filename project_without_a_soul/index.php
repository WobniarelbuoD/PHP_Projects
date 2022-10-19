<?php 
ini_set('display_errors', 1);
session_start();

require "bootstrap.php";

require __DIR__ . '/src/views/controller.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soulless";

//my sql start
error_reporting(E_ALL ^ E_WARNING);
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epic site</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include('src/Pages/navBar.php');

    
    if(isset($_POST['edit'])){
    include('src/Pages/editor.php');
    }
    ?>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div style='padding-top:74px;' class="container text-white">

    <?php 
!isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] = '/home' : '';
$request = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

$path = $entityManager->getRepository('model\Product')->findBy(array('name' => substr($request, 1)))
        ? '/' . $entityManager->getRepository('model\Product')->findBy(array('name' => substr($request, 1)))[0]->getName()
        :'/home';

switch ($request) {
    case $path :
        require __DIR__ . '/src/Pages/home.php';
        break;

    case '/' :
        require __DIR__ . '/src/Pages/home.php';
        break;

    case '/edit' :
        require __DIR__ . (isset($_SESSION['admin']) && $_SESSION['admin'] === 1 ?  '/src/Pages/edit.php' : '/src/Pages/login.php');
        break;

    case '/login' :
        require __DIR__ . (isset($_SESSION['admin']) && $_SESSION['admin'] === 1 ? '/src/Pages/error.php' : '/src/Pages/login.php');
        break;

    default:
    http_response_code(404);
    require __DIR__ . '/src/Pages/error.php';
        break;
}
if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1){
include('src/fragments/logout.php');
}
?>

    </div>

</body>

</html>