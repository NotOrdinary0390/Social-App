<form action="../includes/like.inc.php" method="post">
    <div class="fs-5">
        <input type="hidden" name="PostID" value="<?php  echo $row['IdFoto'] ?>">
        <button type="submit" class="btn btn-dark text-white pointer text-nav" name="submit">
            <i class="fa-solid fa-heart" id="like_2"></i> <?php echo $row['Like_tot']; ?>
        </button>
    </div>
</form>