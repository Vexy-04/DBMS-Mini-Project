<!-- Include Head -->
<?php include "assest/head.php"; ?>

<title>Add Author</title>
<link type="text/css" rel="stylesheet" href="css/add_author.css" />
</head>

<body>

    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main abg">

        <div class="jumbotron text-center abg">
            <h1 class="display-3 font-weight-normal awt">Add Author</h1>
        </div>

        <div class="cont abg">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <!-- Form -->
                    <form action="assest/insert.php?type=author" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="awt" for="authName">Full Name</label>
                            <input type="text" class="form-control incs" name="authName" id="authName">
                        </div>

                        <div class="form-group">
                            <label  class="awt" for="authDesc">Description</label>
                            <input type="text" class="form-control incs" name="authDesc" id="authDesc">
                        </div>

                        <div class="form-group">
                            <label  class="awt" for="authEmail">Email</label>
                            <input type="email" class="form-control incs" name="authEmail" id="authEmail">
                        </div>

                        <div class="form-group">
                            <label  class="awt" for="authImage">Avatar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="authImage" id="authImage">
                                <label class="custom-file-label" for="authImage">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="awt" for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control incs" name="authTwitter" id="authTwitter" placeholder="Ex: Moon96Schwarz">
                        </div>
                        <div class="form-group">
                            <label  class="awt" for="authGithub">Github Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control incs" name="authGithub" id="authGithub" placeholder="Ex: Moon96Schwarz">
                        </div>
                        <div class="form-group">
                            <label  class="awt" for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control incs" name="authLinkedin" id="authLinkedin" placeholder="Ex: Moon96Schwarz">
                        </div>


                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-success btn-lg w-25">Submit</button>
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