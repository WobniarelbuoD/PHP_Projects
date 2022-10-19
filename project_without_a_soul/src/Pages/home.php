<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class='mt-5'>
    <?php 
        $kebab = isset($_SERVER['PATH_INFO']) ? $entityManager->getRepository('model\Product')->findBy(array('name' => substr($_SERVER['PATH_INFO'], 1))) : $entityManager->getRepository('model\Product')->findBy(array('name' => 'home', 1));
    // print_r($kebab[0]);
        // $_POST['get'] = $kebab[0]->getId();

if(isset($kebab)){
    $user = $entityManager->find('model\Product', $kebab[0]->getId());
    print($user->getContent());
}
    ?>
    </div>
</body>
</html>