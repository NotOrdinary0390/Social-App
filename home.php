<?php
include "head.php";
include "navbar.php";



// echo "Username = " . $user . "<br>";
// echo "ID =" . $id;
?>


<<<<<<< HEAD
<div class="container-sm mt-5 justify-content-center p-5" id="bg">
=======
<div class="container-sm mt-5 justify-content-center p-5">
>>>>>>> 3c805d3 (change style)
    <?php

    $strSQL = "SELECT * FROM TPostFoto WHERE Eliminato = 0 ORDER BY Like_tot desc";
    $query = mysqli_query($conn, $strSQL);

    while ($row = mysqli_fetch_assoc($query)) {
        $strSQL2 = "SELECT * FROM TUserSocial WHERE ID = '" . $row['IdUtente'] . "'";
        $query2 = mysqli_query($conn, $strSQL2);
        $d = mysqli_fetch_assoc($query2);
    ?>
        <!-- section post -->
<<<<<<< HEAD
        <div class="container fs-3 d-flex flex-column align-items-center px-5 position-relative">
            <div class="bg-warning mt-5">
=======
        <div class="container fs-3 d-flex flex-column align-items-center px-5 position-relative my-5">
            <div class="bg-warning mt-5 border">
>>>>>>> 3c805d3 (change style)
                <form action="profile.php" method="post">
                    <?php //echo $row['IdUtente']
                    ?>
                    <input type="hidden" value="<?php echo $row['IdUtente'] ?>" name="IdDynamic">
                    <input type="hidden" name="origin">
                    <button type="submit" class="btn btn-warning ms-5 username">
                        <b class="ms-5 username fs-3"><?php echo $d['Username']; ?></b>
                    </button>
                </form>
            </div>
            <div class="mt-5 title_post"><?php echo $row['Titolo']; ?></div>
<<<<<<< HEAD
            <div class="d-flex justify-content-center mt-2 mb-2">
=======
            <div class="d-flex justify-content-center my-4">
>>>>>>> 3c805d3 (change style)
                <img src="img/<?php echo $row['Image']; ?>" />
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

    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="assets/script.js"></script>
</body>

</html>