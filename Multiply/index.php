<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplier</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        table tr:first-child {
            background-color: red;
        }

        table tr th:first-child {
            background-color: red;
        }
    </style>

</head>

<body>
    <div style="width:100vw; height:100vh; position:fixed; z-index:-5" class="bg-primary"></div>
    <div class="container text-white">
        <h1 class=text-center>MULTIPLICATION TABLE</h1>
        <?php

        function mulTab($too)
        {
            $data = '';
            for ($z = 0; $z <= $too; $z++) {
                $data .= "<th>$z</th>";
            };
            for ($x = 1; $x <= $too; $x++) {
                $temp = "<th>$x</th>";
                for ($i = 1; $i <= $too; $i++) {
                    if ($i === $x) {
                        $temp .= '<th class="bg-success">' . ($i * $x) . '</th>';
                    } else {
                        $temp .= '<th>' . ($i * $x) . '</th>';
                    }
                }
                $data .= "<tr>$temp</tr>";
            }
            return $data;
        }

        ?>
    </div>
    <table class="table table-bordered text-center table-striped table-hover">
        <?php
        print(mulTab(100))
        ?>
    </table>;

</body>

</html>