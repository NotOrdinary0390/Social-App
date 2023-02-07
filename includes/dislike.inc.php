<?php

include "dbconn.inc.php";
include "functions.inc.php";

if (isset($_POST['submit'])) {
    session_start();
    $UserID = $_SESSION['ID'];
    $PostID = $_POST['PostID'];

    $deleteLike = deleteLike($conn, $UserID, $PostID);
    switch ($deleteLike) {
        case '1':
            header("location: ../home.php");
            break;
        case '2':
            header("location: ../home.php?query_delete_not_executed");
            exit();
           
        case '3':
            header("location: ../home.php?like_not_present");
            exit();
            
    }
}
