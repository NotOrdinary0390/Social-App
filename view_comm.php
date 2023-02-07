<?php

$strComment = "SELECT * FROM TCommentiSocial WHERE IdPost = '" . $row['IdFoto'] . "' ORDER BY DataC desc";
$query3 = mysqli_query($conn, $strComment);
if ($query3) {

    while ($rowC = mysqli_fetch_assoc($query3)) {
        $strUserC = "SELECT * FROM TUserSocial WHERE ID = '" . $rowC['IdUtente'] . "'";
        $queryUserC = mysqli_query($conn, $strUserC);
        $rowUC = mysqli_fetch_assoc($queryUserC);
?>
        <div class="d-flex d-flex-column justify-content-between">
            <div class="mb-2 me-3"><b style="font-size: 1.5em;"><?php echo $rowUC['Username'] ?></b></div>
            <div class="mb-2 me-3"><?php echo $rowC['TextC'] ?></div>
            <div class="mb-2 me-3"><?php echo $rowC['DataC'] ?></div>
        </div>
<?php

    }
} else {
    echo 'error';
}

?>