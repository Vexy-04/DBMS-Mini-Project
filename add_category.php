<!-- Include Head -->
<?php include "assest/head.php"; ?>

<title>Add Category</title>
</head>
<link rel="stylesheet" href="css/categorie.css">
<link type="text/css" rel="stylesheet" href="css/style.css" />

<body class="bg">

    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main bg txt">

        <div class="jumbotron text-center bg">
            <h1 class="display-3 font-weight-normal txt">Submit a Category</h1>
        </div>

        <div class="container">

            <div class="row">

                <div class="col-lg-12 mb-4">
                    <!-- Form -->
                    <form action="assest/insert.php?type=category" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="catName">Category Name</label>
                            <input type="text" class="form-control incs" name="catName" id="catName">
                        </div>

                        <div class="form-group">
                            <label for="catImage">Category Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="catImage" id="catImage">
                                <label class="custom-file-label incs pd" for="catImage">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catColor">Category Color</label>
                            <input type="color" id="catColor" name="catColor" value="#0f88e1">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-lg w-25 cbtn">Submit</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>