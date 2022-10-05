<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_prank";

error_reporting(E_ALL ^ E_WARNING);
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Track_name, Artist_name, Album  FROM my_spotify_playlist";
$result = mysqli_query($conn, $sql);

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
</head>

<body>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div class="container text-white">
        <h1 class=text-center>My playlist</h1>
        <table class="table text-white">
            <tr>
                <th>Song</th>
                <th>Band</th>
                <th>Album</th>
            </tr>
            <?php

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>
                     <td>'.$row["Track_name"].'</td>
                     <td>'.$row["Artist_name"].'</td>
                     <td>'.$row["Album"].'</td>
                    </tr>';
                }
            } else {
                echo "0 results";
            }

            ?>

        </table>
    </div>
</body>

</html>