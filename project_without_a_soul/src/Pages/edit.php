<?php
require "bootstrap.php";
?>
<div class='pt-5'>
  <table class="table">
    <thead class='table-dark'>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class='table-warning'>
      <?php
      $productRepository = $entityManager->getRepository('model\Product');
      $data = $productRepository->findAll();
      foreach ($data as $value) {
        if ($value->getName() != "home") {
          print("
              <tr>
                <td>
                <div>
                <form class='pe-3' method='POST' type='text'>
                  <input name='update_name' value='".$value->getName()."'></input>
                  <button type='submit' name='update_id' value=". $value->getId() ." class='btn btn-success'>Change Name</button>
                </form>
                <div>
                </td>

                <td>
                  <div class='d-flex'>
                    <form class='pe-3' method='POST' type='text'>
                      <button type='submit' name='edit' value=" . $value->getId() . " class='btn btn-success'>EDIT</button>
                    </form>
                    <form method='POST' type='int'>
                      <button type='submit' name='delete' value=" . $value->getId() . " class='btn btn-danger'>DELETE</button>
                    </form>
                  </div>
                </td>
               </tr>
              
");
        } else {
          print("
  <tr>
    <td>
      <div>" . $value->getName() . "</div>
    </td>
      <td>
        <div class='d-flex'>
          <form class='pe-3' method='POST' type='text'>
            <button type='submit' name='edit' value=" . $value->getId() . " class='btn btn-success'>EDIT</button>
          </form>
        </div>
      </td>
   </tr>
  
");
        }
      }

      ?>
    </tbody>
  </table>
  <form class='' method='GET' type='text'>
    <input name='name'></input>
    <button class='btn btn-sm btn-success' type='submit'>CREATE</button>
  </form>
</div>