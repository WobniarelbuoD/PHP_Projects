<?php 
session_start();

require_once "bootstrap.php";

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
    <title>Sort</title>
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
        <h1 class=text-center>CMS sprint</h1>

        <?php 


$request = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

// var_dump(file_exists(__DIR__.'/src/Pages/home.php'));

if(!$_SERVER['PATH_INFO']){
    $_SERVER['PATH_INFO'] = 'home';
}

if(isset($_SERVER['PATH_INFO'])){
    $request = $_SERVER['PATH_INFO'];
    if(file_exists(__DIR__.'/src/Pages'.$_SERVER['PATH_INFO'].'.php')){
        require __DIR__ . '/src/Pages'.$_SERVER['PATH_INFO'].'.php';
    }
    else{
        http_response_code(404);
        require __DIR__ . '/src/Pages/error.php';
}
}
else{
    require __DIR__ . '/src/Pages/home.php';
}


// function test(){
    require __DIR__ . '/src/views/entities.php';
//     $_GET['delete'] = 9;
//     $user = $entityManager->find('Product', $_GET['delete']);
//     var_dump($user);
//     $entityManager->remove($user);
//     $entityManager->flush();
// }
?>

    </div>

</body>

</html>