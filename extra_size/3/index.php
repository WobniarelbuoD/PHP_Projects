<?php

include('mysql.php');
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
        <h1 class=text-center>Stronk Job</h1>

    </div>
    
    <div class='container'>
    <?php

        
$kebab = new Posts();
$kebab->getPosts();
// var_dump($kebab->posts[69]['title']);
$kebab->getPost(420);
var_dump($kebab->getId());
var_dump($kebab->getTitle());
var_dump($kebab->getContent());
var_dump($kebab->getImage());
var_dump($kebab->getCreatedAt());
// $kebab->createPost('kebab', 'remover', 'unalive');
$kebab->getPosts();

?>
    <table class="table mt-2 p-5 border border-warning table-striped">
    <tbody class="table-light">
        <tr  class='table-dark'>
            <th>id</th>
            <th>title</th>
            <th>content</th>
            <th>image</th>
            <th>createdAt</th>
        </tr>
        <?php
        foreach($kebab->posts as $value){
        print("
        <tr>
        <td>".$value['id']."</td>
        <td>".$value['title']."</td>
        <td>".$value['content']."</td>
        <td>".$value['image']."</td>
        <td>".$value['createdAt']."</td>
        </tr>
        ");
        }
        ?>
    </tbody>
</table>
    </div>


</body>
</html>