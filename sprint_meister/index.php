<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_prank";

//my sql start
error_reporting(E_ALL ^ E_WARNING);
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// order buttons
if (isset($_POST['order'])) {
    if ($_SESSION['order'] == $_POST['order'] && $_SESSION['ordersc'] != 'DESC') {
        $_SESSION['order'] = $_POST['order'];
        $_SESSION['ordersc'] = 'DESC';
    } else {
        $_SESSION['order'] = $_POST['order'];
        $_SESSION['ordersc'] = 'ASC';
    }
} else {
    $_SESSION['order'] = 'Track_name';
    $_SESSION['ordersc'] = 'ASC';
}

//POST/GET
$Genre = '';
if (isset($_GET['Genre'])) {
    $Genre = $_GET['Genre'];
} else {
    $_GET['Genre'] = 'ROCK';
    $Genre = $_GET['Genre'];
}
include('mysql.php');

//Login check
if (isset($_POST['email']) && isset($_POST['password'])) {
    $ID = mysqli_fetch_assoc($loginInfo);
    if ($ID != NULL) {
        $_SESSION['ID'] = $ID['Users_ID'];
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_SESSION['ID'] != 1 ? 'User' : 'Admin';
        header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
        exit();
    }else {
        $_GET['error'] = '<h2 class="text-center text-danger">Wrong email or password!</h2>';
    }
}

//logout command
if (isset($_POST['logout'])) {
    session_destroy();
    session_start();
}
?>

<!-- HTML -->
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
    <style>
        <?php include('styles.css') ?>
    </style>

</head>

<!-- Search Bar -->
<nav style='position:fixed; width:100vw' class="navbar navbar-light bg-success text-white justify-content-between p-3 ps-5 pe-5 d-fixed">

    <div class='d-flex align-items-center'>
        <div class="navbar-brand text-white pe-5 fs-1"><i class="bi bi-music-note-beamed"></i></div>
        <form method='GET' type='text'>
            <button class='NotButton nav-link active pe-4 fs-4' type='submit' name='NavBar' value='Songlist'>Song List</button>
        </form>

        <form method='GET' type='text'>
            <button class='NotButton nav-link active pe-4 fs-4' type='submit' name='NavBar' value='Genres'>Genres</button>
        </form>
    </div>
    <?php
    if($_GET['NavBar'] === 'Songlist'){
    print("<form action='' method='GET' id='search' class='d-flex'>
        <input class='form-control mr-sm-2' id='search' name='search' type='text' placeholder='Search' aria-label='Search'>
        <button class='btn btn-outline-light my-2 my-sm-0' type='submit'>Search</button>
    </form>");
    }
    ?>
</nav>

<body>
    <?php

    if (isset($_POST['Add'])) {
        if ($_POST['Add'] == 'Add') {
            include('./new.php');
            $_POST['Add'] = '';
        } else if (is_numeric($_POST['Add'])) {
            include('./new.php');
        }
    }
    if (isset($_POST['AddGen'])) {
        if ($_POST['AddGen'] == 'AddGen') {
            include('./genre_form.php');
        }
    }
    if (isset($_POST['editGen'])) {
        if ($_POST['editGen'] == 'editGen') {
            include('./edit_genres.php');
        }
    }

    ?>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div class="container text-white">
        <h1 style='padding-top:100px' class="text-center mb-3"></h1>

        <?php
        if(isset($_GET['error'])){
            print($_GET['error']);
        }
        //Navbar buttons

        if (isset($_SESSION['login'])) {
            if (!isset($_GET['NavBar']) && !isset($_SESSION['NavBar'])) {
                $_GET['NavBar'] = 'Songlist';
            }
            if (isset($_GET['NavBar'])) {
                $_SESSION['NavBar'] = $_GET['NavBar'];
                if ($_GET['NavBar'] == 'Songlist') {
                    include('./Table.php');
                } else if ($_GET['NavBar'] == 'Genres') {
                    include('./genres.php');
                }
            } else if (isset($_SESSION['NavBar'])) {
                $_GET['NavBar'] = $_SESSION['NavBar'];
                if ($_GET['NavBar'] == 'Songlist') {
                    include('./Table.php');
                } else if ($_GET['NavBar'] == 'Genres') {
                    include('./genres.php');
                }
            }
        } else {
            include('./Login.php');
        }

        ?>
    </div>
        <!-- Logout button -->
    <?php
    if($_SESSION['login']){
    print("<form action='' method='POST' name='logout' id='logout' style='position:fixed; left:90%; top:90%'>
        <button name='logout' value='true' type='submit' class='btn btn-lg btn-danger '>Log out</button>
    </form>");
    }
    ?>
</body>

</html>
