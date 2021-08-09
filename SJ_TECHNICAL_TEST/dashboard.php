<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link rel="stylesheet" href="assets/css/error.css" />
    <link rel="stylesheet" href="assets/css/sidebar.css" />
    <link rel="stylesheet" href="assets/css/modal.css" />
    <link rel="stylesheet" href="assets/css/createModal.css" />
    <title>Dashboard</title>
</head>

<body>
    <div class="s-layout">
        <!-- Sidebar -->
        <div class="s-layout__sidebar">
            <a class="s-sidebar__trigger" href="#0">
                <i class="fa fa-bars"></i>
            </a>

            <nav class="s-sidebar__nav">
                <ul>
                    <li>
                        <a class="s-sidebar__nav-link" href="dashboard.php">
                            <i class="fa fa-home"></i><em>Dashboard</em>
                        </a>
                    </li>
                    <li>
                        <a class="s-sidebar__nav-link" href="events.php">
                            <i class="fa fa-calendar-check"></i><em>Events</em>
                        </a>
                    </li>
                    <li>
                        <a class="s-sidebar__nav-link" href="assets/php/logout.php">
                            <i class="fa fa-power-off"></i><em>Logout</em>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <main class="s-layout__content">
            <?php if (isset($_GET['success'])) { ?>
                <div class="successText alert">
                    <?php echo $_GET['success']; ?>
                    <?php sleep(3) ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['error'])) { ?>
                <div class="errorText alert">
                    <?php echo $_GET['error']; ?>

                </div>
            <?php } ?>

            <div class="table-section">
                <h1 style="text-align: center;">Category</h1>
                <div class="add" id="myBtn">Create Category <span><i class="fa fa-plus" aria-hidden="true" style="margin-left:7px"></i></span></div>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include "assets/php/includes/db_connect.inc.php";
                    $records = mysqli_query($conn, "select * From category ORDER BY id ASC");
                    while ($data = mysqli_fetch_array($records)) {
                    ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td>
                                <a href="editCategory.php?id=<?php echo $data['id']; ?>" class="editButton">Edit</a>
                                <a href="assets/php/deleteCategory.php?id=<?php echo $data['id']; ?>" class="deleteButton">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="assets/php/create_category.php" method="POST" autocomplete="off">
                        <div class="container">
                            <h1 style="white-space: nowrap;">Add Category</h1>
                            <hr>
                            <label for="Category"><b>Category</b></label>
                            <input type="text" placeholder="Enter New Category" name="newcategory" required>
                            <button type="submit" name="createCategory" class="addCategory">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-section">
                <h1 style="text-align: center;margin-top:50px">Events</h1>
                <a href="events.php">
                    <div class="add">Add Event <span><i class="fa fa-plus" aria-hidden="true" style="margin-left:7px"></i></span></div>
                </a>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Privilege</th>
                    </tr>
                    <?php
                    include "assets/php/includes/db_connect.inc.php"; // Using database connection file here
                    $records = mysqli_query($conn, "select * From events ORDER BY id ASC"); // fetch data from database

                    while ($data = mysqli_fetch_array($records)) {
                    ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td>
                                <div style="display: flex;align-items:center;justify-content:center;">
                                    <a href="editAdminEvents.php?id=<?php echo $data['id']; ?>" class="editButton">Edit</a>
                                    <a href="assets/php/deleteAdminEvents.php?id=<?php echo $data['id']; ?>" class="deleteButton">Delete</a>
                                </div>
                            </td>
                            <td>
                                <div style="display: flex; align-items:center;justify-content:center;">
                                    <a href="assets/php/makeFeature.php?id=<?php echo $data['id']; ?>" class="featureButton">Make Feature</a>
                                    <a href="assets/php/removeFeature.php?id=<?php echo $data['id']; ?>" class="featureButton2">Remove Feature</a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </main>
    </div>
</body>
<script src="assets/js/alert.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/editCatModal.js"></script>
<script src="assets/js/editCategoryData.js"></script>

</html>