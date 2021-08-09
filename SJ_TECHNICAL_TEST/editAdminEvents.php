<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

include "assets/php/includes/db_connect.inc.php";
$id = $_GET['id'];
$qry = mysqli_query($conn, "select * from events where id='$id'");
$data = mysqli_fetch_array($qry);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $status = $_POST['status'];

    if (empty($file)) {
        $edit = mysqli_query($conn, "update events set name='$name', date='$date', category='$category', description='$description', status='$status' where id='$id'");
        echo "hi";
    } else {
        $edit = mysqli_query($conn, "update events set name='$name', date='$date', category='$category', description='$description', image='$file', status='$status' where id='$id'");
        echo "hello";
    }

    if ($edit) {
        header("Location: dashboard.php?success=Successfully Edited");
        exit;
    } else {
        header("Location: dashboard.php?error=Try Again");
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
    <title>Admin Events Edit</title>
</head>

<body>
    <form method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="container">
            <h1>Edit Events</h1>
            <hr>
            <label for="name"><b>Name</b></label>
            <input type="text" id="name" placeholder="Name" name="name" value="<?php echo $data['name'] ?>">

            <label for="date"><b>Date</b></label>
            <input type="date" id="date" placeholder="Date" name="date" value="<?php echo $data['date'] ?>">

            <label for="Category"><b>Category</b></label>
            <select id="categoryOpt" name="category">
                <option value="<?php echo $data['category'] ?>"><?php echo $data['category'] ?></option>
                <?php
                include "assets/php/includes/db_connect.inc.php";
                $records = mysqli_query($conn, "SELECT category From category");

                while ($dat = mysqli_fetch_array($records)) {
                    echo "<option value='" . $dat['category'] . "'>" . $dat['category'] . "</option>";
                }
                ?>
            </select>

            <label for="description"><b>Description</b></label>
            <textarea id="Description" name="description" placeholder="Write something between 200 words" style="height: 50px" maxlength="220"><?php echo $data['description'] ?></textarea>

            <label for="file">Select Image</label>
            <input type="file" name="image" id="editAdminImgTrigger" accept="image/*" id="file" onchange="loadFile(event)" />

            <?php echo '<img class="editAdminImg" id="editAdminImg" src="data:image/jpeg;base64,' . base64_encode($data['image']) . '"/>'; ?>
            <p><img id="output" width="400" /></p>

            <label for="status"><b>Status</b></label>
            <select id="statusOpt" name="status">
                <option value="<?php echo $data['status'] ?>"><?php echo $data['status'] ?></option>
                <?php
                include "assets/php/includes/db_connect.inc.php";
                $records = mysqli_query($conn, "SELECT name From eventstatus");

                while ($datas = mysqli_fetch_array($records)) {
                    echo "<option value='" . $datas['name'] . "'>" . $datas['name'] . "</option>";
                }
                ?>
            </select>

            <button type="submit" name="update">Update</button>
            <a href="dashboard.php" style="text-decoration:none;color:white">
                <div style="background-color: dodgerblue;text-align:center;padding: 14px 20px;">Cancel</div>
            </a>
        </div>
    </form>
    <script>
        document.getElementById("editAdminImgTrigger").addEventListener("click", function() {
            document.getElementById("editAdminImg").style.display = "none";
        });
    </script>
    <script src="assets/js/previewImg.js"></script>
    <script src="assets/js/duplicateOption.js"></script>

</body>

</html>