<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

include "assets/php/includes/db_connect.inc.php";

$id = $_GET['id'];

$qry = mysqli_query($conn, "select * from category where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $query = "SELECT category FROM category WHERE category = '$category';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: dashboard.php?error=Data Already Exist");
    } else {

        $edit = mysqli_query($conn, "update category set category='$category' where id='$id'");
    }

    if ($edit) {
        mysqli_close($conn); // Close connection
        header("Location: dashboard.php?success=Successfully Edited");
        exit;
    } else {
        header("Location: dashboard.php?error=Data Already Exist");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/create.css" />
    <title>Admin Login</title>
</head>

<body>
    <form method="POST" autocomplete="off">
        <div class="container">
            <h1>Edit Category</h1>
            <hr>
            <label for="Category"><b>Category</b></label>
            <input type="text" id="catName" placeholder="Category Name" name="category" value="<?php echo $data['category'] ?>" required>
            <button type="submit" name="update">Update</button>
            <a href="dashboard.php" style="text-decoration:none;color:white">
                <div style="background-color: dodgerblue;text-align:center;padding: 14px 20px;">Cancel</div>
            </a>
        </div>
    </form>
</body>

</html>