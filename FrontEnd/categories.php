<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

// Check if the admin is already logged in, if yes then redirect him to home page
if (!$loggedin) {
    header("location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

?>

<title>All Categories</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/categorie.css" />

</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main bg">

        <div class="jumbotron text-center mb-0 bg">
            <h1 class="display-3 font-weight-normal txt">All Categories</h1>
        </div>

        <div class="p-4">

            <div class="row">

                <div class="col-lg-12 text-center mb-3">
                    <a class="btn cbtn" href="add_category.php">Add Category</a>
                </div>

            </div>

            <div class="cont row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>Color</th>
                            <th scope='col' colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($categories as $category) :
                            echo "<tr>";
                            ?>

                            <td class="txt"><?= $category['category_id'] ?></td>
                            <td class="txt"><?= $category['category_name'] ?></td>
                            <td>
                                <img src="img/category/<?= empty($category['category_image']) ? "no-image-available.png" : $category['category_image']; ?>" style="width: 100px; height: 60px;">
                            </td>
                            <td class="">
                                <div style="width: 40px; height: 40px; border-radius: 100% ;background-color: <?= $category['category_color'] ?>"></div>
                            </td>

                            <td>
                                <a class="btn btn-success" href="update_category.php?id=<?= $category['category_id'] ?> ">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="assest/delete.php?type=category&id=<?= $category['category_id'] ?> ">
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


    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>