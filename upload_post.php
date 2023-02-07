<?php
//connessione
include "../dbconn.php";
session_start();

// variabile che memorizza la cartella (percorso relativo)
// dove saranno salvati i file
$target_dir = "img/";
// percorso completo del file che verrà salvato sul server
// tipo uploads/ciao.jpeg
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
// variabile che varrà 1 se tutto è andato bene
// varrà zero se ci sono stati problemi
$uploadOk = 1;

// verifico se il file già esiste
if (file_exists($target_file)) {
  echo "<br>Impossibile fare l'upload del file: un file con lo stesso nome già esiste nella cartella<br>";
  $uploadOk = 0;
}

// verifico la dimensione del file: max 1 mb
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "<br>Impossibile fare l'upload del file: il file deve avere una dimensione massima di 1 mb<br>";
  $uploadOk = 0;
}


// verifico se $uploadOk vale zero (in tal caso c'è stato un errore)
if ($uploadOk == 0) 
{
  echo "<br>Il tuo file non è stato inviato al server</br>";
} 
else 
{   
    $img = $_FILES["fileToUpload"]["name"];
    $title = $_POST["Titolo"];
    $id = $_SESSION["ID"];
  // provo a fare upload del file
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
  { 
    $strSQL="INSERT INTO TPostFoto (Image, Titolo, IdUtente, Eliminato) 
    VALUES ('" . $img . "','" . $title . "','" . $id . "', 0 )";
    echo $strSQL;
    $query =mysqli_query($conn,$strSQL);
    if($query){
      header('location: profile.php?status=success_upload!');
    } else {
      header('location: profile.php?error=error_upload!');
    }
    
   } else {
    echo $strSQL;
    echo "Attenzione: errore durante l'upload del file: KO";
  }
}
?>