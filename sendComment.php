<?php

include "../dbconn.php";
session_start();

$TextC = $_POST['New-Comment'];
$userId = $_SESSION['ID'];
$postId = $_POST['postId'];

$strSQL = "INSERT INTO TCommentiSocial (IdUtente , IdPost , TextC ) VALUES ('" . $userId . "','" . $postId . "','" . $TextC . "')";
$query_insert = mysqli_query($conn, $strSQL);
echo $strSQL;

if ($query_insert) {
    echo "ok";
    header("location: comment.php?post=" . $postId);
} else {
    echo "error";
    header("location: comment.php?error=not_insert");
}
