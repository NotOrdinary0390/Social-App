<?php
//connessione
include "../dbconn.php";

session_start();
$user = $_SESSION['Username'];
$id = $_SESSION['ID'];
$IdFoto = $_POST['PostID'];
$idDin = $_POST['IdDynamic'];



    $strSQL = "UPDATE TPostFoto SET Eliminato = '1' WHERE IdFoto = '" . $IdFoto . "'";
    $query_delete = mysqli_query($conn, $strSQL);

    if ($query_delete) {
        //echo "ok";
        header("location: profile.php?status=post_deleted");
    } else {
        //echo "error";
        header("location: profile.php?error=not_deleted");
    }
