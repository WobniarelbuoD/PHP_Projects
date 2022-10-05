<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I Am Big Smart</title>
</head>

<body>
    <div style="display:flex; flex-direction:column; align-items:center">
        <?php
        if (isset($_POST['lugis']) and $_POST['lugis'] != "" and isset($_POST['lsvoris']) and $_POST['lsvoris'] != "" and isset($_POST['vardas']) and $_POST['vardas'] != ""){
            $BMI = round(($_POST['lsvoris']) / ((($_POST['lugis']) /100) * (($_POST['lugis']) /100)));

            if($BMI < 25){
            print("<h3>Normaliai yra nesijaudink BMI: $BMI</h3>");
            }
            else if($BMI < 30){
                print("<h3>esi vidutiniskai storas kaip dauguma mirtingųjų BMI: $BMI</h3>");
            }
            else if($BMI < 40){
                print("<h3>Nu ble jau mases yra BMI: $BMI</h3>");
            }
            else{
                print("<h3>Žinok jau storas esi. Klausi ką daryt? Išvadas... BMI: $BMI</h3>");
            }
        }

        $massive = array(
            "Antanas" => 69,
            "Juozas" => 50,
            "Steponas" => 80,
            "Petras" => 62,
            "Vytautas" => 101,
        );

        $massive[$_POST['vardas']] = $_POST['lsvoris'];

        ?>

        <form style="display:flex" action="" method="POST">
        <div>
                <label for="vardas">Vardas:</label>
                <input type="text" id="vardas" name="vardas" value="<?php print($_POST['vardas'] ?? "Vardas") ?>">
            </div>

            <div>
                <label for="lugis">Ūgis:</label>
                <input type="number" id="lugis" name="lugis" value="<?php print($_POST['lugis'] ?? 186) ?>">
            </div>

            <div>
                <label for="lsvoris">Svoris:</label>
                <input type="number" id="lsvoris" name="lsvoris" value="<?php print($_POST['lsvoris'] ?? 107) ?>">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div><br><br>

    <div>
        <p>Lengviausias Bicas yra: <?php print(array_search(min($massive),$massive)) ?></p>
        <p>Sunkiausias Bicas yra: <?php print(array_search(max($massive),$massive)) ?></p>
        <p>Visu Bicu mase yra lygi : <?php if(array_sum($massive) < 500)
        print(array_sum($massive)."kg dar neperstori");
        else print(array_sum($massive)."kg E BLE!!! Liftas tik 500kg laiko..." . array_search(max($massive),$massive) . " lipk storas is lifto")?>
        </p>
        <p><?php
        asort($massive);
        foreach(array_keys($massive) as $value){
            print($value ." ". $massive[$value]."kg, ");
        }
        ?></p>
    </div>

</body>

</html>