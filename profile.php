<?php

include "head.php";
include "navbar.php";

$idDin = $_POST['IdDynamic'];


//echo "Username =" . $user . "<br>";
//echo "ID =" .$idDin;
?>

<!-- section post -->
<<<<<<< HEAD
<div class="container-sm mt-5 justify-content-center p-5"  id="bg">
=======
<div class="container-sm mt-3 justify-content-center p-5">
>>>>>>> 3c805d3 (change style)
  <?php

  if (isset($_POST['origin'])) {
    $strSQL = "SELECT * FROM TPostFoto WHERE IdUtente = '" . $idDin . "' AND Eliminato = 0";
    $strSQL2 = "SELECT * FROM TUserSocial WHERE ID = '" . $idDin . "'";
    //echo $strSQL;
    //echo $strSQL2;
  } else {
    $strSQL = "SELECT * FROM TPostFoto WHERE IdUtente = '" . $id . "' AND Eliminato = 0";
    $strSQL2 = "SELECT * FROM TUserSocial WHERE ID = '" . $id . "'";
    //echo $strSQL;
    //echo $strSQL2;
  }
  $query = mysqli_query($conn, $strSQL);
  $query2 = mysqli_query($conn, $strSQL2);
  $row2 = mysqli_fetch_assoc($query2);
  $user = $row2['Username'];


  if ($row2) {

  ?>
    <!-- div profile -->
<<<<<<< HEAD
    <div id="container" class="container fs-3 d-flex align-items-center px-5 bg-warning">
=======
    <div id="container" class="container fs-3 d-flex align-items-center px-5 bg-warning border">
>>>>>>> 3c805d3 (change style)

      <div class="mt-5 mb-5">
        <img class="img_profile justify-content-start" src="img/<?php echo $row2['ImgProfile']; ?>" />
      </div>
      <div class="mt-5 mb-5 justify-content-start">
        <b class="ms-5 username"><?php echo $row2['Username']; ?></b>
      </div>

      <?php
      if ($idDin == $_SESSION['ID']) {
      ?>

        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_post">
            Load Post!
          </button>
        </div>
      <?php
      }
      ?>
      <!-- Modal Load Post-->
      <div class="modal fade" id="upload_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">seleziona il file da caricare sul server</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body input-group mb-3">
              <form action="upload_post.php" method="post" enctype="multipart/form-data">
                <br>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                <br>
                <input type="text" class="form-control" name="Titolo" placeholder="title post">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" value="inizia upload del file" name="submit">Load</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    <!-- end div profile-->
    <!-- SECTION POST -->
    <!-- Title Post -->
    <?php
    while ($row = mysqli_fetch_assoc($query)) {

    ?>
      <div class="container fs-3 d-flex flex-column align-items-center px-5 position-relative mt-5">
        <div class="d-flex title_post justify-content-between px-5">
          <div class="">
            <?php echo $row['Titolo']; ?>
          </div>
          <!-- Button title -->
          <?php
          if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
              $show_edit = true;
            } else {
              $show_edit = false;
            }
          }
          if ($idDin == $_SESSION['ID'] || $show_edit) {
          ?>
            <div class="">
              <button type="button" class="btn title_post" data-bs-toggle="modal" data-bs-target="#change-title">
                <i class="fa-regular fa-pen-to-square"></i>
              </button>
            </div>
          <?php  } else {
            header("location: profile.php?error=you_can't_change_title");
          }
          ?>
          <!-- Modal change post title -->
          <div class="modal fade" id="change-title" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Change post title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body input-group mb-3">
                  <form action="change_title.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['IdFoto'] ?>" name="PostID">
                    <input type="text" class="form-control" name="Titolo" placeholder="title post">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" value="inizia upload del file" name="submit">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- end title -->
        <!-- Post img-->
<<<<<<< HEAD
        <div class="d-flex justify-content-center mt-5 mb-5">
=======
        <div class="d-flex justify-content-center my-4">
>>>>>>> 3c805d3 (change style)
          <img src="img/<?php echo $row['Image']; ?>">
          <?php
          if ($idDin == $_SESSION['ID']) {
          ?>
            <!-- Delete Post -->
            <form action="delete_post.php" method="post">
              <input type="hidden" value="<?php echo $row['IdFoto'] ?>" name="PostID">
              <button type="submit" class="btn btn-light">X</button>
            </form>
          <?php  } else {
            header("location: profile.php?error=you_can't_delete");
          }
          ?>
        </div>
        <!-- Like / Comment -->
        <div class="d-flex justify-content-between px-5 fs-4 w-100 padding
                            mb-2">
          <!-- Like -->
          <?php
          if (!isLike($conn, $id, $row['IdFoto'])) {
            include "layouts/like.php";
          } else {
            include "layouts/dislike.php";
          }
          ?>

          <!-- Write Comment -->
          <div class="fs-5">
            <form action="comment.php" method="post">
              <input type="hidden" value="<?php echo $row['IdFoto'] ?>" name="PostID">
              <input type="hidden" value="<?php echo $_SESSION['ID'] ?>" name="id">
              <button type="submit" class="btn btn-dark text-white pointer text-nav">
                <i class="fa-solid fa-comment"></i>
              </button>
            </form>
          </div>
        </div>
        <!-- Comment -->
        <div class="p-3 box-comment" style="overflow-y: auto; height: 200px;
                max-height: 200px;">
          <?php include "view_comm.php" ?>
        </div>

      </div>



<?php

    }
  }

?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="assets/script.js"></script>
</body>

</html>