<!-- table header -->
<form method='POST' type='text'>
    <button class='AddButton nav-link active pe-4' type='submit' name='Add' value='Add'><i class='bi bi-plus-circle fs-2'> Add Song</i></button>
</form>
<table class="table mt-2 p-5 border border-warning table-striped">
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
            <td>
                <div class='d-flex'>
                    <form method='POST' type='text'>
                        <button class='NotButton' type='submit' name='order' value='Genres'>Genre</button>
                    </form>
                    <?php
                    if (isset($_SESSION['order']) && isset($_SESSION['ordersc'])) {
                        if ($_SESSION['order'] == 'Genres') {
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
            <td></td>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php
        //Main table
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
         <td>' . $row["Track_name"] . '</td>
         <td>' . $row["Artist_name"] . '</td>
         <td>' . $row["Album"] . '</td>
         <td>' . $row["Genres"] . '</td>
         <td>
         <div class="d-flex">
            <form method="POST" type="text">
                <input hidden name="editName" value="' . $row["Track_name"] . '"></input>
                <input hidden name="editArtist" value="' . $row["Artist_name"] . '"></input>
                <input hidden name="editAlbum" value="' . $row["Album"] . '"></input>
                <input hidden name="editGenre" value="' . $row["ID"] . '"></input>
                <button class="btn btn-warning" type="submit" name="Add" value=' . intval($row["Track_ID"]) .   '>Edit</button>
            </form>
            <form class="ps-3" method="POST" type="text">
                <button class="btn btn-danger" type="submit" name="delRow" value=' . $row["Track_ID"] .   '>Remove</button>
            </form>
            </div>
        </td>
        </tr>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>