<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php
// Check if the user is logged in
if (!$loggedin) {
    header("location: index.php");
    exit;
}

// Fetch the user's ID from the session
$user_id = $_SESSION['id'];

// Fetch the corresponding author ID from the database
$sql = "SELECT author_id FROM author WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $user_id, PDO::PARAM_INT);
$stmt->execute();
$currentAuthorId = $stmt->fetchColumn();

// Call the stored procedure to get articles for the logged-in author
$sql = "CALL GetAuthArticles(?)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $currentAuthorId, PDO::PARAM_INT); // Assuming the author ID is an integer
$stmt->execute();
$data = $stmt->fetchAll();

?>

<!-- Custom CSS -->
<!-- <link href="css/home.css" rel="stylesheet"> -->
<link type="text/css" rel="stylesheet" href="css/style.css" />

<title>Add Article</title>
<link rel="stylesheet" href="css/ad_article.css">

</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main class="main">

        <div class="jumbotron text-center mb-0 bg">
            <h1 class="display-3 font-weight-normal txt">My Articles</h1>
        </div>

        <div class="bg p-4">
            <div class="cont">


                <div class="row">
                    <table class='table table-striped table-bordered'>

                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Title</th>
                                <th scope='col'>Content</th>
                                <th scope='col'>Image</th>
                                <th scope='col'>Created Time</th>
                                <th scope='col'>Category</th>
                                <th scope='col'>Author</th>
                                <th scope='col' colspan="3">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($data as $row):
                                echo "<tr>";
                                ?>

                                <td class="txt">
                                    <?= $row['article_id'] ?>
                                </td>
                                <td class="txt">
                                    <?= $row['article_title'] ?>
                                </td>
                                <td class="text-break txt">
                                    <?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?>
                                </td>
                                <td class="txt"><img src="img/article/<?= $row['article_image'] ?>"
                                        style="width: 100px; height: auto;"></td>
                                <td class="txt">
                                    <?= $row['article_created_time'] ?>
                                </td>
                                <td class="txt">
                                    <?= $row['category_name'] ?>
                                </td>
                                <td class="txt">
                                    <?= $row['author_fullname'] ?>
                                </td>

                                <td>
                                    <a class="btn btn-info" href="single_article.php?id=<?= $row['article_id'] ?> ">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="update_article.php?id=<?= $row['article_id'] ?> ">
                                        <i class="fa fa-pencil " aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="assest/delete.php?type=article&id=<?= $row['article_id'] ?> ">
                                        <i class="fa fa-trash " aria-hidden="true"></i>
                                    </a>
                                </td>

                                <?php
                                echo "</tr>";
                            endforeach;
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>