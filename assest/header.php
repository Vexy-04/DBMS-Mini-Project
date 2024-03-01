<header class="blog-header bhead">
    <link rel="stylesheet" href="css/header.css">
    <div class="container-fluid bgclr" style="padding-left: 3rem; padding-right:3rem">
        <div class="d-flex flex-column flex-md-row align-items-center py-2">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <!-- <img src="img/logo/logo.png" alt="dev culture logo" style="width: 80%;height: auto;"> -->
                <h3 class="txtcle" style="margin-bottom:0px;">InkSpark</h3> <!-- Added txtcle class -->
            </a>

            <?php if ($loggedin) : ?>

                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 px-5 text-white" href="index.php">Home</a>
                    <a class="p-2 px-5 text-white" href="categories.php">Category</a>
                    <a class="p-2 px-5 text-white" href="article.php">Article</a>
                    <a class="p-2 px-5 text-white" href="author.php">Author</a>
                </nav>

            <?php else : ?>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 px-5 text-white" href="articleOfCategory.php">Articles</a>
                </nav>

            <?php endif;  ?>
            <a class="btn dbtn" href="signup.php">Sign up</a>

            <a class="btn dbtn" href="<?= ($loggedin) ? 'Logout.php' : 'login.php'; ?>">
                <?= ($loggedin) ? 'Logout' : 'Sign in'; ?>
            </a>

        </div>
    </div>
</header>
