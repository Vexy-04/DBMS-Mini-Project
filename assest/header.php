<?php
// Assuming you have already started the session
// Include your database connection file
include_once "db.php";

// Assuming $loggedin is set somewhere in your code

if ($loggedin) {
    // Assuming you have already stored the user_id of the logged-in user in a session variable
    $user_id = $_SESSION['id'];

    // Fetch user role from the database based on user_id
    $query = "SELECT user_role FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch();

    // Check if the user exists in the database
    if ($user) {
        $user_role = $user['user_role'];
        $_SESSION['user_role'] = $user_role;
    }
}
?>

<header class="blog-header bhead">
    <link rel="stylesheet" href="css/header.css">
    <div class="container-fluid bgclr" style="padding-left: 3rem; padding-right:3rem">
        <div class="d-flex flex-column flex-md-row align-items-center py-2">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <!-- <img src="img/logo/logo.png" alt="dev culture logo" style="width: 80%;height: auto;"> -->
                <h3 class="txtcle" style="margin-bottom:0px;">InkSpark</h3> <!-- Added txtcle class -->
            </a>

            <?php if ($loggedin): ?>
                <?php if ($_SESSION['user_role'] == 'admin'): ?>
                    <nav class="my-2 my-md-0 mr-md-3">
                        <a class="p-2 px-5 text-white" href="categories.php">Category</a>
                        <a class="p-2 px-5 text-white" href="article.php">Article</a>
                        <a class="p-2 px-5 text-white" href="author.php">Author</a>
                    </nav>
                <?php elseif ($_SESSION['user_role'] == 'author'): ?>
                    <nav class="my-2 my-md-0 mr-md-3">
                        <a class="p-2 px-5 text-white" href="getautharticle.php">My Articles</a>
                        <a class="p-2 px-5 text-white" href="add_article.php">Submit Article</a>
                    </nav>
                <?php elseif ($_SESSION['user_role'] == 'vistor'): ?>
                    <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 px-5 text-white" href="articleOfCategory.php">Articles</a>
                        <a class="p-2 px-5 text-white" href="add_author.php">Become a author</a>
                    </nav>
                <?php endif; ?>
                <a class="btn dbtn" href="logout.php">Logout</a>
            <?php else: ?>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 px-5 text-white" href="articleOfCategory.php">Articles</a>
                    <a class="btn dbtn" href="signup.php">Sign up</a>
                </nav>
                <a class="btn dbtn" href="login.php">Login</a>
            <?php endif; ?>

        </div>
    </div>
</header>