<?php
//mysql login info
if (isset($_POST['email']) && isset($_POST['password'])){
$loginInfo = mysqli_query($conn, "
SELECT * FROM users
WHERE Emails = '".$_POST['email']."' AND Passwords = '".$_POST['password']."';
");
}

// song list sql code
$result = mysqli_query($conn, "
    SELECT * FROM my_spotify_playlist
    LEFT JOIN new_prank.genres ON my_spotify_playlist.Genre_ID = genres.ID
    WHERE User_ID = '".$_SESSION['ID']."' AND Track_name LIKE '%".$_GET['search']."%'
    ORDER BY ".$_SESSION['order']." ".$_SESSION['ordersc']."
");
//genre list sql code
$resultGen = mysqli_query($conn, "
    SELECT DISTINCT Genres, ID, User_Genre_ID FROM my_spotify_playlist
    RIGHT JOIN new_prank.genres ON my_spotify_playlist.Genre_ID = genres.ID
    WHERE User_Genre_ID = '".$_SESSION['ID']."'
");

$resultFiltered = mysqli_query($conn, "
    Select * FROM my_spotify_playlist
    LEFT JOIN new_prank.genres ON my_spotify_playlist.Genre_ID = genres.ID
    WHERE  User_ID = '".$_SESSION['ID']."' AND Genres = '$Genre' AND Track_name LIKE '%".$_GET['search']."%'
    ORDER BY ".$_SESSION['order']." ".$_SESSION['ordersc']."
");
//add and edit sql
if (isset($_POST['Song']) && isset($_POST['Art']) && isset($_POST['Alb']) && isset($_POST['Gen'])) {
    if (is_numeric($_POST['Add'])) {
        mysqli_query($conn, "
        UPDATE my_spotify_playlist
        SET 
            Track_name ='" . $_POST['Song'] . "',
            Artist_name='" . $_POST['Art'] . "',
            Album='" . $_POST['Alb'] . "',
            Genre_ID=" . intval($_POST['Gen']) . "
            WHERE Track_ID=" . intval($_POST['Add']) . "
        ");
        header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
        exit();
    } else if ($_POST['Add'] == 'Add') {
        mysqli_query($conn, "
        INSERT INTO my_spotify_playlist
        (Track_name, Artist_name, Album, Genre_ID, User_ID)
        VALUES (
        '" . $_POST['Song'] . "',
        '" . $_POST['Art'] . "',
        '" . $_POST['Alb'] . "',
        '" . $_POST['Gen'] . "',
        '" . $_SESSION['ID'] . "'
    );
        ");
        header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
        exit();
    }
}

// Genre add
if(isset($_POST['newGen'])){
        mysqli_query($conn, "
        INSERT INTO genres (Genres, User_Genre_ID)
        VALUES (
            '".$_POST['newGen']."',
            '".$_SESSION['ID']."'
    );
        ");
        header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
        exit();
}
//Genre edit
if(isset($_POST['updateGen']) && isset($_POST['updateGen_ID'])){
    var_dump(intval($_POST['updateGen_ID']));
    mysqli_query($conn, "
    UPDATE genres
    SET 
    Genres ='".$_POST['updateGen']."'
    WHERE ID=".intval($_POST['updateGen_ID'])."
    ");
    header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
    exit();
}

//Genre Delte
if(isset($_POST['delGen'])){
    mysqli_query($conn, "
    DELETE FROM genres
    WHERE ID=" . $_POST['delGen'] . "");
    header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
    exit();
}

// sql row
if (isset($_POST['delRow'])) {
    mysqli_query($conn, "DELETE FROM my_spotify_playlist WHERE Track_ID=" . $_POST['delRow'] . "");
    header("Location: http://localhost" . $_SERVER['PHP_SELF'] . "");
    exit();
}

?>