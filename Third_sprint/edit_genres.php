<div style='z-index:10;position:fixed;width:100vw;height:100vh;' class=' DarkTims d-flex flex-wrap justify-content-center align-items-center'>
    <div style='width:600px; max-height:100vh' class='bg-light p-5 text-dark border border-warning table-responsive'>
            <div class="form-group">
                <table class='table'>
                    <tr>
                        <th>Genres</th>
                        <th></th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($resultGen) > 0) {
                        while ($row = mysqli_fetch_assoc($resultGen)) {
                            echo "
                            <tr>
                                <td>
                                    <form class='' method='POST' type='text'>
                                        <input name='updateGen' value=".$row['Genres']."></input>
                                        <button class='btn btn-sm btn-success' type='submit' name='updateGen_ID' value=" . $row['ID'] .   ">UPDATE</button>
                                    </form>
                                </td>
                                <td>
                                    <form class='' method='POST' type='text'>
                                        <button class='btn btn-sm btn-danger' type='submit' name='delGen' value=" . $row['ID'] .   ">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                    </table>
            </div>
        <form method='POST' type='text'>
            <button class='btn btn-danger' type='submit' name='Add' value='NO'>Return</button>
        </form>
    </div>
</div>