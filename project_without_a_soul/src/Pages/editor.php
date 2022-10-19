<?php
require_once "bootstrap.php";
if(isset($_POST['edit'])){
$product = $entityManager->find('model\Product', $_POST['edit']);
$product = htmlspecialchars($product->getContent());

}
?>
<div style='z-index:10;position:fixed;width:100vw;height:100vh;' class=' DarkTims d-flex flex-wrap justify-content-center align-items-center'>
    <div style='height:95vh; width:95vw' class='bg-light p-5 text-dark border border-warning'>
        <form method='POST'>
            <textarea name='update_content' style='width:90vw; height:80vh'><?php print($product)?></textarea>
            <button name='update_id' value=<?php print($_POST['edit']) ?> class='btn btn-success' type='submit'>UPDATE</button>
        </form>
        <a class="nav-link active btn btn-danger" aria-current="page" href="edit">RETURN</a>
    </div>
</div>