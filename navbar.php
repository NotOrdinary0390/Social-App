    <!-- nav bar -->
    <div class="d-flex bg-dark justify-content-between px-5 pt-2">

        <div class="text-warning fs-2">
            <i class="fa-solid fa-hashtag fs-1"></i>
            FuckSocial
        </div>
        <div class="justify-content-start">
            <form action="home.php" method="post">
                <button class="btn btn-dark text-white pointer text-nav">
                    <i class="fa-solid fa-house fs-5"></i>
                    Home
                </button>
            </form>
        </div>
        <div class="justify-content-start">
            <form action="profile.php" method="post">
                <input value="<?php echo $id; ?>" name="ID" class="d-none">
                <input type="hidden" value="<?php echo $id ?>" name="IdDynamic">
                <button class="btn btn-dark text-white pointer bg_user">
                    <i class="fa-solid fa-user fs-5"></i>
                    <?php echo $user; ?>
                </button>
                </input>
            </form>
        </div>
        <div class="bg-dark text-white pointer">
            <form action="logout.php" method="get">
                <button class="btn btn-dark text-white pointer">
                    <i class="fa-solid fa-right-to-bracket fs-5"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>

    </div>

</body>

</html>