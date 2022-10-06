<?php
$theGoods = array();

function steal($array)
{
    $stolen = Basket::unAlive();
    $stolen->myJawsThatBite();
    $id = $stolen->id;
    $array[$id] = $stolen;
    return $array;
}

include_once('tv.php');
include_once('fruits.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div class="container text-white">
        <h1 class=text-center>Stronk Job</h1>

    </div>


    <div class='d-flex'>
        <div class='col-4'>
            <h5>TV<h5>
                    <?php
                    //TV
                    $TeaVee1 = new TV("PanicSonic");
                    $TeaVee2 = new TV("LameGames");
                    $TeaVee3 = new TV("TouchyShiba");
                    $TeaVee1->setVolume(69);

                    print($TeaVee1->info() . "<br>");
                    print($TeaVee1->meme());
                    ?>
        </div>


        <div class='col-4'>
            <h5>Fruits<h5>
                    <?php
                    //Fruits
                    Basket::Fill();
                    $theGoods = steal($theGoods);
                    $theGoods = steal($theGoods);
                    $theGoods = steal($theGoods);
                    $theGoods = steal($theGoods);
                    Basket::fillTo();
                    print("<pre>");
                    var_dump($theGoods);
                    print("<br><br>");
                    var_dump(Basket::$fruits);
                    print("</pre><br><br>");
                    ?>
                    <div class='col-4'>
                        <h5><h5>
                                <?php
                                //Fruits
                                ?>
                    </div>
        </div>
    </div>

</body>

</html>