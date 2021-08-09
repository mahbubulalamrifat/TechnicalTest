<?php
session_start();
if (isset($_POST['submit'])) {
    include("includes/db_connect.inc.php");

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user = validate($_POST['user']);
    $pass = validate($_POST['pass']);

    if (empty($user)) {
        header("Location: ../../admin.php?error=Username is required");
    } else if (empty($pass)) {
        header("Location: ../../admin.php?error=Password is required");
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM createadmin WHERE username='$user' ");
        $rows = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_assoc($sql)) {
            $uPassInDB = $row['password'];
            if (password_verify($pass, $uPassInDB)) {

                $_SESSION['username'] = $user;
                header("Location: ../../dashboard.php?success=Log in Successfully");
            } else {
                header("Location: ../../admin.php?error=Invalid Username and Password");
            }
            mysqli_close($conn);
        }
    }
}
