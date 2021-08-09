<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="assets/css/create.css" />
    <link rel="stylesheet" href="assets/css/error.css" />
</head>

<body>
    <form action="assets/php/create_admin.php" method="POST" autocomplete="off">
        <div class="container">
            <h1>Sign Up</h1>
            <hr>
            <?php if (isset($_GET['error'])) { ?>
                <div class="errorText alert"><?php echo $_GET['error']; ?></div>
            <?php } ?>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username">

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" minlength="5">

            <button type="submit" name="create" class="signupbtn">Sign Up</button>

        </div>
    </form>
</body>
<script src="assets/js/alert.js"></script>

</html>