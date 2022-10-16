<!-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="home"><i class="bi bi-house"></i></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin">admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="View">View Website</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="edit">Edit</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->


<nav style='position:fixed; width:100vw' class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="home"><i class="bi bi-house"></i></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <?php
                $productRepository = $entityManager->getRepository('Product');
                $data = $productRepository->findAll();
                foreach ($data as $value) {
                    print('<li class="nav-item"><a class="nav-link active" aria-current="page" href="' . $value->getName() . '">' . $value->getName() . '</a></li>');
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin">admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="edit">edit</a>
                </li>
            </ul>
        </div>
    </div>
</nav>