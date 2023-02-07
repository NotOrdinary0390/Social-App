<?php

// like
function addLike($conn, $userID, $postID)
{

  $strSQL = "SELECT * FROM TLike WHERE IdPost = '" . $postID . "' AND IdUtente = '" . $userID . "'";
  $query = mysqli_query($conn, $strSQL);
  $row = mysqli_num_rows($query);

  if ($row > 0) {
    return 0;    // like exist error code
  } else {
    $strInsert = "INSERT INTO TLike (IdUtente, IdPost) VALUES ('" . $userID . "','" . $postID . "')";
    $queryInsert = mysqli_query($conn, $strInsert);

    if ($queryInsert) {
      return 1;     // like add successfull code
    } else {
      return 2;      //failed query code
    }
  }
}

// check if post as user like

function isLike($conn, $userID, $postID)
{
  $strSQL = "SELECT * FROM TLike WHERE IdPost = '" . $postID . "' AND IdUtente = '" . $userID . "'";
  $query = mysqli_query($conn, $strSQL);
  $row = mysqli_num_rows($query);

  if ($row > 0) {
    return true;
  } else {
    return false;
  }
}

// delete like 

function deleteLike($conn, $userID, $postID)
{
  $strSQL = "SELECT * FROM TLike WHERE IdPost = '" . $postID . "' AND IdUtente = '" . $userID . "'";
  // echo "user = " . $userID . "<br>";
  // echo $postID;
  $query = mysqli_query($conn, $strSQL);
  $row = mysqli_num_rows($query);

  if ($row > 0) {
    $strSQLDelete = "DELETE FROM TLike WHERE IdPost = '" . $postID . "' AND IdUtente = '" . $userID . "'";
    $query2 = mysqli_query($conn, $strSQLDelete);
    if ($query2) {

      return 1;  // query delete eseguita

    } else {
      return 2;  //query delete non eseguita
    }
  } else {
    return 3; // like non presente
  }
}
