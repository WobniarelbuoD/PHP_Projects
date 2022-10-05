<div style='z-index:10;position:fixed;width:100vw;height:100vh;' class=' DarkTims d-flex flex-wrap justify-content-center align-items-center'>
    <div style='width:600px; height:400px' class='bg-light p-5 text-dark border border-warning'>
        <form method='POST'>
            <div class="form-group">
                <input hidden name="Add" value=<?php print($_POST['Add']) ?>>
                <label>Song Name</label>
                <input <?php print("value='" . (isset($_POST['editName']) ? $_POST['editName'] : '') . "'")?> required class="form-control" name='Song'>
            </div>
            <div class="form-group">
                <label>Artist</label>
                <input <?php print("value='" . (isset($_POST['editArtist']) ? $_POST['editArtist'] : '') . "'")?> required class="form-control" name='Art'>
            </div>
            <div class="form-group">
                <label>Album</label>
                <input <?php print("value='" . (isset($_POST['editAlbum']) ? $_POST['editAlbum'] : '') . "'")?> required class="form-control" name='Alb'>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <select class="form-control form-control-md" name='Gen'>
                    <?php
                    if (mysqli_num_rows($resultGen) > 0) {
                        while ($row = mysqli_fetch_assoc($resultGen)) {
                            if($row['ID'] != $_POST['editGenre']){
                            echo "<option value='" . $row['ID'] . "'>" . $row['Genres'] . "</option>";
                            }
                            else{
                                echo "<option selected value='" . $row['ID'] . "'>" . $row['Genres'] . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning"><?php print("".is_numeric($_POST['Add']) ? 'Update' : 'Add'."") ?></button>
        </form>
        <form method='POST' type='text'>
            <button class='btn btn-danger' type='submit' name='Add' value='NO'>Return</button>
        </form>
    </div>
</div>