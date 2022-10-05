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
        <h1 class=text-center>IMPRESSIVE TITLE HERE</h1>
        <?php
        $massive = [0,1,7,3,5,2,8,1,9,0,4,5,8];

        function BubbleBeam($array){
            $count = 1;
            for($x = 0; $x < count($array)-1;$x++){
                $stop = true;
            for($i = 0; $i < count($array)-$count; $i++){
                if($array[$i] > $array[$i+1]){
                    $pH = $array[$i];
                    $array[$i] = $array[$i+1];
                    $array[$i+1] = $pH;
                    $stop = false;
                }
            }
            $count++;
            if($stop === true){
                return $array;
            }
        }
        return $array;
    }
    print_r(BubbleBeam($massive));
        ?>
    </div>
    
</body>
</html>