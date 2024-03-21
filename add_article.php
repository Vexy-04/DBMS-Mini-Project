<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php
$stmt = $conn->prepare("SELECT category_id, category_name FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

$stmt = $conn->prepare("SELECT author_id, author_fullname FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();

?>

<!-- JS TextEditor -->
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<title>Add Article</title>
<link rel="stylesheet" href="css/ad_article.css">
</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main bg">
        <div class="jumbotron text-center bg">
            <h1 class="display-3 font-weight-normal txt">Submit an Article</h1>
        </div>

        <div class="cont bg">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <!-- Form -->
                    <form action="assest/insert.php?type=article" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="txt" for="arTitle">Title</label>
                            <input type="text" class="form-control incs" name="arTitle" id="arTitle" required>
                        </div>

                        <div class="form-group">
                            <label incs for="arContent">Content</label>
                            <textarea class="form-control" name="arContent" id="arContent" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="txt" for="arImage">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="authImage" id="authImage">
                                <label class="custom-file-label" for="authImage">Choose file</label>
                            </div>
                        </div>

                        <div class="my-2" style="width: 200px;">
                            <img class="w-100 h-auto" src="img/article/<?= $article["article_image"] ?>" alt="">
                        </div>

                        <div class="form-group">
                            <label class="txt" for="arCategory">Category</label>
                            <select class="custom-select incs" name="arCategory" id="arCategory" required>
                                <option disabled>-- Select Category --</option>

                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['category_id'] ?>">
                                        <?= $category['category_name'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label class="txt" for="arAuthor">Author</label>
                            <select class="custom-select incs" name="arAuthor" id="arAuthor" required>
                                <option disabled>-- Select Author --</option>

                                <?php foreach ($authors as $author): ?>
                                    <option value="<?= $author['author_id'] ?>">
                                        <?= $author['author_fullname'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn abtn btn-lg w-25">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- <div class="col-lg-4 mb-4">
                     <h1> Random Articles </h1>
                </div> -->


            </div>
        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace('arContent');
    </script>

</body>

</html>