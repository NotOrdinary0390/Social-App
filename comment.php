<?php
//connessione
include "../dbconn.php";

session_start();
$user = $_SESSION['Username'];
$id = $_SESSION['ID'];
if (isset($_GET['post'])) {
    $IdFoto = $_GET['post'];
}
if (isset($_POST['PostID'])) {
    $IdFoto = $_POST['PostID'];
}


//echo $IdFoto . "<br>";
//echo $id;
include "head.php";
include "navbar.php";
// echo "Username =" . $user . "<br>";
// echo "Id session =" . $id . "<br>";
// echo "Id post =" . $IdFoto . "<br>";
// echo "metodo get =" . $_GET['post'];


$strSQL = "SELECT * FROM TPostFoto WHERE IdFoto = '" . $IdFoto . "' ORDER BY Like_tot desc";
$query = mysqli_query($conn, $strSQL);
$row = mysqli_fetch_assoc($query);

?>
<style>
    .comment-padd {
        padding-left: 30%;
        padding-right: 30%;
    }

    .likes {
        top: 66%;
        left: 27%;
    }

</style>
<div class="container-sm mt-5 justify-content-center p-5">
    <div class="container fs-3 d-flex justify-content-center  flex-column align-items-center px-5 position-absolute" id="bg">
        <div class="mt-5 title_post"><?php echo $row['Titolo']; ?></div>
        <div class="d-flex mt-2 mb-5">
            <img src="img/<?php echo $row['Image']; ?>" />
        </div>
        <!-- Like / Comment -->
        <div class="fs-4 w-100
                            mb-2">
            <div class="">
                <form action="sendComment.php" method="post" class="w-100 comment-padd">
                    <div class="d-flex">
                        <input type="text" id="name" required class="input w-100" name="New-Comment">
                        <label for="name" class="input-label">write comment</label>
                        <button type="submit" name="submit" class="btn btn-dark text-white pointer text-nav ms-2">
                            <i class="fa-solid fa-comment"></i>
                        </button>
                    </div>
                    <div class="input-group">
                        <input type="hidden" value="<?php echo $_SESSION['ID'] ?>" name="id">
                        <input type="hidden" name="postId" value="<?php echo $IdFoto ?>">
                    </div>
                </form>
            </div>
        </div>
        <!-- Like -->
        <div class="position-absolute likes">
            <?php
            if (!isLike($conn, $id, $row['IdFoto'])) {
                include "layouts/like.php";
            } else {
                include "layouts/dislike.php";
            }
            ?>
        </div>
        <!-- Comment -->
        <div class="p-3 box-comment" style="overflow-y: auto; height: 200px;
                max-height: 200px;">
            <?php include "view_comm.php" ?>
        </div>
    </div>
</div>

</body>

</html>