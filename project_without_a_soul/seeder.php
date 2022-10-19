<?php
require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new model\Product();
$product->setName($newProductName);
if(isset($argv[2])) {
    $product->setContent($argv[2]);
}
$entityManager->persist($product);
$entityManager->flush();
