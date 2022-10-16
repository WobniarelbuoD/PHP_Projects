<div>
  <table class="table">
    <thead class='table-dark'>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class='table-warning'>
      <?php
      $productRepository = $entityManager->getRepository('Product');
      $data = $productRepository->findAll();
      foreach ($data as $value) {
        print("
              <tr>
                <td>
                  <div>" . $value->getName() . "</div>
                </td>
                <td>
                  <form method='POST' type='text'>
                    <button type='submit' name='edit' value=".$value->getId()." class='btn btn-success'>EDIT</button>
                  </form>
                </td>
              </tr>
");
      }
      ?>
    </tbody>
  </table>
</div>