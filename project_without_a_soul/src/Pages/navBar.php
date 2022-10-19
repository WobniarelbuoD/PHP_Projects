
<nav style='position:fixed; width:100vw' class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="home"><i class="bi bi-house"></i></a>
        <div class="collapse navbar-collapse text-uppercase" id="navbarNav">
            <ul class="navbar-nav">

                <?php
                $productRepository = $entityManager->getRepository('model\Product');
                $data = $productRepository->findAll();
                foreach ($data as $value) {
                    print('
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="'.$value->getname().'">' . $value->getName() . '</a>
                        </li>');
                }

                if(isset($_SESSION['admin'])){
                    if($_SESSION['admin'] === 1){
                        print('<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="edit">edit</a>
                    </li>');
                    }
                    else{
                        print('<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login">login</a>
                    </li>');
                    }
                }
                else{
                    print('<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login">login</a>
                </li>');
                }
                ?>

            </ul>
        </div>
    </div>
</nav>