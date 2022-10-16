<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <!-- <div class='text-center mt-5'><h1 class='mb-5'>Home</h1><img src="https://media4.giphy.com/media/THlB4bsoSA0Cc/200.gif" alt="skeleton" width="100%" height="100%"></div> -->

    <?php 
        require_once "bootstrap.php";
        $kebab = $entityManager->getRepository('Product')->findBy(array('name' => substr($_SERVER['PATH_INFO'], 1)));
        // dd($kebab);
        // $test = substr($_SERVER['PATH_INFO'], 1);
        var_dump($kebab[0]->getId());

        $_POST['get'] = $kebab[0]->getId() ;
    ?>
</body>
</html>