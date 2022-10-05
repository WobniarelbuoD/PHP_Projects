<?php

if (!isset($dir)) {
    $dir = './Random';
}

if (isset($_GET['target'])) {
    $dir .= $_GET['target'];
}

if (isset($_POST['newDir'])) {
    $new = $_POST['newDir'];
    if(isset($_GET['target'])){
        $directory = './Random' . $_GET['target'] . '/' . $new;
    }
    else{
        $directory = './Random' . '/' . $new;
    }
    if (!file_exists($directory)) {
        mkdir($directory, 0777);
    } else {
        $text = 'folder already exists!';
    }
}
if (isset($_POST['del'])) {
    $del = $_POST['del'];
    unlink($del);
}

function Backer($pH){
    $res = '';
    if (count($pH) < 5) {
        return $_SERVER['PHP_SELF'];
    } else {
        for ($i = 2; $i < count($pH) - 1; $i++) {
            $res .= $pH[$i] . '/';
        }
        $res = substr($res, 0, (strlen($res) - 1));
        return $res;
    }
}
$link = explode("/", $_SERVER['REQUEST_URI']);
$link = Backer($link);
?>


<!-- table -->
<table class='table text-white'>
    <tr class='bg-success text-white'>
        <th>Type</th>
        <th>Name</th>
        <th class='text-center'>Actions</th>
    </tr>
    <?php
    $contents = scandir($dir);

    $open = $_SERVER['REQUEST_URI'];
    $open = explode('?', $open);
    $open = $open[(count($open) - 1)];
    if ($open === $_SERVER['REQUEST_URI']) {
        $open = 'target=';
    }

    foreach ($contents as $value) {
        if ($value != "." && $value != "..") {
            $type = strtoupper(filetype($dir . '/' . $value));
            $butt = ($type == 'DIR') ? "<a href='?" . $open . '/' . $value .
                "' class='btn btn-warning'>OPEN</a>" : '<form action="" method="post"><button name="del" type=submit value=' .
                ($dir . '/' . $value) . ' class="btn btn-warning ms-2">Un Alive</button></form>';
                if($type == 'FILE'){
                    $foe = "<form action='' method='POST'>
                                <input id='download' type='submit' name='download' value='".$value."'></input>
                            </form>";
                }
                else{
                    $foe = $value;
                }
            print("<tr>
                <td class='col-4'>" . $type . "</td>
                <td class='col-4'>".$foe."</td>
                <td class='text-center'>$butt</td>
                </tr>");
        }
    }
    ?>
</table>
<a class="btn btn-warning" href=<?php print($link) ?>>Back</a>
<div class='d-flex justify-content-between'>
    <div>
        <form action='' method='post'>
            <div style='max-width:300px' class='mt-5'>
                <?php (isset($text)) ? print("<p>" . $text . "</p>") : print("<p>Enter folder name</p>") ?>
                <input type='text' id='newDir' name='newDir' class='form-control'></input>
            </div>
            <button type='submit' name='submit' class="btn btn-warning mb-2">Create</button>
        </form>
    </div>

    <!-- upload button -->
    <?php

    ?>
    <div class='bg-info text-white col-4 p-5 border border-warning rounded'>
        <?php print ($message) ?? null; ?>
        <form action="<?php print($_SERVER['PHP_SELF']) ?>" method='POST' enctype="multipart/form-data">
            <div class="form-group d-flex flex-column">
                <input type="file" name="upload">
                <input type='submit' value='Submit' name='submit'>
            </div>
        </form>
    </div>

    <form action='' method='POST' name='logout' id='logout' style='position:absolute; left:90%; top:90%'>
        <button name='logout' value='true' type='submit' class='btn btn-lg btn-danger '>Log out</button>
    </form>
</div>