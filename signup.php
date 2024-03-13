<?php include "assest/head.php"; ?>
<?php
// FILEPATH: /c:/xampp/htdocs/blog/signup.php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set the default role to "author"
    $user_role = 'author';

    // Insert user data into the database with hashed password
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    session_start();

    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;

    // Redirect user to welcome page
    header("location: index.php");
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/flogo.png" sizes="32x32" type="image/png">

    <!-- Bootstrap, FontAwesome, Custom Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/signup.css">
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">


    <title>Signup</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include "assest/header.php" ?>

    <!-- <h1>Signup</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Signup">
    </form> -->

    <!-- Main -->
    <main class="main">

        <!-- Latest Articles -->
        <div class="section jumbotron mb-0 h-100 bgclr">
            <!-- container -->
            <div class="container d-flex flex-column justify-content-center align-items-center h-100 ">

                <!-- <div class="wrapper my-0 pt-3 bg-white w-50 text-center">
                    <img src="img/logo/logo.png" alt="dev culture logo" style="width: 100px;height: auto;">
                </div> -->

                <!-- row -->
                <div class="wrapper px-4 py-4 w-50 bbox">

                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control incs incsm" required><br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control incs incsm" required><br>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control incs incsm" required><br>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn dbtn" value="Signup">
                        </div>
                        <p><a href="#" class="text-muted">Already have a account?</a></p>
                    </form>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

</body>

</html>