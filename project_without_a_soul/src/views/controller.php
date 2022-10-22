<?php 
// Helper functions
function redirect_to_root(){
        header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        exit;
}
//Add new product
if(isset($_GET['name'])){
    $product = new model\Product();
    $product->setName($_GET['name']);
    $entityManager->persist($product);
    $entityManager->flush();
    redirect_to_root();
}

// Delete product
if(isset($_POST['delete'])){
    $user = $entityManager->find('model\Product', $_POST['delete']);
    $entityManager->remove($user);
    $entityManager->flush();
    redirect_to_root();
}

// Update name
if(isset($_POST['update_name'])){
    $user = $entityManager->find('model\Product', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}

//page edit
if(isset($_POST['update_content'])){
    $user = $entityManager->find('model\Product', $_POST['update_id']);
    $user->setContent($_POST['update_content']);
    $entityManager->flush();
    redirect_to_root();
}

// admin login check
if(isset($_POST['email']) && isset($_POST['password'])){
    $user = $entityManager->getRepository('model\Users')->findBy(array('Emails' => 'admin@mail.com'));
    if($user[0]->getPasswords() === $_POST['password']){
        $_SESSION['admin'] = 1;
        redirect_to_root();
    }
    else{
        $_POST['failed'] = 'Wrong email or password';
    }
}

//logout call
if(isset($_POST['logout'])){
    session_destroy();
    redirect_to_root();}
?>