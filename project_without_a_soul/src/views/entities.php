<?php 

require "bootstrap.php";

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

//Add new product
if(isset($_GET['name'])){
    $product = new Product();
    $product->setName($_GET['name']);
    $entityManager->persist($product);
    $entityManager->flush();
    redirect_to_root();
}

// Delete product
if(isset($_GET['delete'])){
    $user = $entityManager->find('Product', $_GET['delete']);
    $entityManager->remove($user);
    $entityManager->flush();
    redirect_to_root();
}

// Update
if(isset($_POST['update_name'])){
    $user = $entityManager->find('Product', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}

//Get by id
if(isset($_POST['get'])){
    $user = $entityManager->find('Product', $_POST['get']);
    print($user->getContent());
}

//Get All
if(isset($_POST['all'])){
    $productRepository = $entityManager->getRepository('Product');
    $data = $productRepository->findAll();
    foreach($data as $value){
        print($value->getName());
    }
}

?>