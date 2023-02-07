<?php

include "dbconn.inc.php";
include "functions.inc.php";

if (isset($_POST['submit'])) {

    session_start();
    $UserID = $_SESSION['ID'];
    $PostID = $_POST['PostID'];

    $AddLike = addLike($conn, $UserID, $PostID);
    switch ($AddLike) {
        case '1':
            header("location: ../home.php");
            break;
        case '0':
            header("location: ../home.php?error=like_exist");
            exit();
            //break;
        case '2':
            header("location: ../home.php?error=insert_query_failed");
            exit();
            //break;

    }
    
} else {

    header("location: ../home.php");
    exit(); //blocca codice php in esecuzione
}
