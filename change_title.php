<?php
//connessione
include "../dbconn.php";

session_start();
$user = $_SESSION['Username'];
$id = $_SESSION['ID'];
$IdFoto = $_POST['PostID'];
$idDin = $_POST['IdDynamic'];
$NewTitle = $_POST['Titolo'];


    $strSQL = "UPDATE TPostFoto SET Titolo = '" . $NewTitle . "' WHERE IdFoto = '" . $IdFoto . "'";
    $query_delete = mysqli_query($conn, $strSQL);

    if ($query_delete) {
        //echo "ok";
        header("location: profile.php?status=success");
    } else {
        //echo "error";
        header("location: profile.php?error=not_changed");
    }
