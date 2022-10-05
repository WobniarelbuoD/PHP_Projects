<!-- Genre table -->
<div class='d-flex justify-content-between'>
    <form method='POST' type='text'>
        <button class='AddButton nav-link active pe-4' type='submit' name='AddGen' value='AddGen'><i class='bi bi-plus-circle fs-2'> Add A Genre</i></button>
    </form>
    <form method='POST' type='text'>
        <button class='AddButton nav-link active pe-4' type='submit' name='editGen' value='editGen'><i class="bi bi-pencil-square fs-2"> Edit Genres</i></button>
    </form>
</div>
<div style='font-size:0.8rem;' class="mt-2 border border-warning justify-content-center bg-warning d-flex flex-wrap">
    <?php
    if (mysqli_num_rows($resultGen) > 0) {
        while ($row = mysqli_fetch_assoc($resultGen)) {
            if($row['Genres'] != $_GET['Genre']){
            echo "<div style='padding:0px'>
            <form method='GET' type='text'>
                <button class='NotButton2' type='submit' name='Genre' value='" . $row['Genres'] . "'>" . $row['Genres'] . "</button>
            </form>
        </div>";
            }
            else{
                echo "<div style='padding:0px'>
                <form method='GET' type='text'>
                    <button class='Highlight' type='submit' name='Genre' value='" . $row['Genres'] . "'>" . $row['Genres'] . "</button>
                </form>
            </div>";
            }
        }
    }
    ?>
</div>

<!-- Main Table -->
<table class='table table-striped'>
    <thead class="table-dark">
        <tr>
            <td>
                <div class='d-flex'>
                <form method='POST' type='text'>
                    <button class='NotButton' type='submit' name='order' value='Track_name'>Song Name</button> 
                </form>
                <?php
                    if (isset($_SESSION['order']) && isset($_SESSION['ordersc'])) {
                        if ($_SESSION['order'] == 'Track_name') {
                            if ($_SESSION['ordersc'] == 'ASC') {
                                print('<i class="bi bi-caret-down"></i>');
                            } else if ($_SESSION['ordersc'] == 'DESC') {
                                print('<i class="bi bi-caret-up"></i>');
                            }
                        }
                    }
                    ?>
                </div>
            </td>
            <td>
            <div class='d-flex'>
                <form method='POST' type='text'>
                    <button class='NotButton' type='submit' name='order' value='Artist_name'>Band</button>
                </form>
                <?php
                    if (isset($_SESSION['order']) && isset($_SESSION['ordersc'])) {
                        if ($_SESSION['order'] == 'Artist_name') {
                            if ($_SESSION['ordersc'] == 'ASC') {
                                print('<i class="bi bi-caret-down"></i>');
                            } else if ($_SESSION['ordersc'] == 'DESC') {
                                print('<i class="bi bi-caret-up"></i>');
                            }
                        }
                    }
                    ?>
                </div>
            </td>
            <td>
            <div class='d-flex'>
                <form method='POST' type='text'>
                    <button class='NotButton' type='submit' name='order' value='Album'>Album</button>
                </form>
                <?php
                    if (isset($_SESSION['order']) && isset($_SESSION['ordersc'])) {
                        if ($_SESSION['order'] == 'Album') {
                            if ($_SESSION['ordersc'] == 'ASC') {
                                print('<i class="bi bi-caret-down"></i>');
                            } else if ($_SESSION['ordersc'] == 'DESC') {
                                print('<i class="bi bi-caret-up"></i>');
                            }
                        }
                    }
                    ?>
                </div>
            </td>
        </tr>
    </thead>
    <tbody class='table-light'>
        <?php
        if (mysqli_num_rows($resultFiltered) > 0) {
            while ($row = mysqli_fetch_assoc($resultFiltered)) {
                echo '<tr>
         <td>' . $row["Track_name"] . '</td>
         <td>' . $row["Artist_name"] . '</td>
         <td>' . $row["Album"] . '</td>
        </tr>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>