<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testukas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body style="display:flex; justify-content:center">
    <div class="container bg-primary text-white" style="display:flex; flex-direction:column; text-align:center; min-width:100vw; min-height:100vh;">
        <h1>kebab test</h1>
        <?php


        $massive = ["A", "a", "k", "z", "u", "w", "p", "G", "Z", "U"];


        $smassive = array("test" => 69, "slap" => 5, "vapse" => 420, "yep" => 9, "what du fak" => 86,);

        $kebab = "classic array: ";
        $shite = "weirdough array: ";

        //masyvas su kableliu
        foreach ($massive as $value) {
            $kebab .= $value . ', ';
        }
        $kebab = substr($kebab, 0, (strlen($kebab) - 2));
        print("<div>$kebab</div>");

        foreach ($smassive as $value) {
            $shite .= $value . ", ";
        }
        $shite = substr($shite, 0, (strlen($shite) - 2));
        print("<div>$shite</div>");

        //Odd
        $kebab = "Odd array: ";
        $count = 1;
        foreach ($massive as $value) {
            if ($count != 2) {
                $count = 2;
                $kebab .= $value . ", ";
            } else {
                $count = 1;
            }
        }

        $kebab = substr($kebab, 0, (strlen($kebab) - 2));
        print("<div>$kebab</div>");

        //Even

        $kebab = "Even array: ";
        for ($i = 0; $i < sizeof($massive); $i += 1) {
            if ($i % 2 === 1) {
                $kebab .= $massive[$i] . ", ";
            } else {
                continue;
            }
        }

        $kebab = substr($kebab, 0, (strlen($kebab) - 2));
        print("<div>$kebab</div>");

        //arrayhilate a code of massive destruction

        $sunRay = [
            ["yes", "no", ["spy", ["spy", "medic"]]],
            ["idk", "who", ["spy", "medic", ["test", "more", ["kebabas", ["spy", "medic"]]]]],
            ["spy", "medic", "tests", "boomer"]
        ];

        //checks if array has more arrays inside and summons deArray
        function unArray($array)
        {
            $result = deArray($array);
            $stop = false;

            while ($stop === false) {
                $check = true;
                foreach ($result as $value) {
                    if (gettype($value) . "" === "array") {
                        $result = deArray($result);
                        $check = false;
                    }
                }
                if ($check === true) {
                    $stop = true;
                }
            }
            return $result;
        }

        //moves array items up a level
        function deArray($array)
        {
            $pH = [];
            foreach ($array as $value) {
                if (gettype($value) . "" == "array") {
                    foreach ($value as $value2) {
                        $pH[] = $value2;
                    }
                } else {
                    $pH[] = $value;
                }
            }
            return $pH;
        }

        $result = unArray($sunRay);
        echo "<pre>";
        print_r($result);
        ?>
    </div>
</body>

</html>