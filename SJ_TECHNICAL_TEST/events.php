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
    <link rel="stylesheet" href="assets/css/error.css" />
    <link rel="stylesheet" href="assets/css/sidebar.css" />
    <link rel="stylesheet" href="assets/css/events.css" />
    <title>Create Events</title>
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
            <div class="container">
                <div class="inner-container">
                    <h1 style="text-align:center;margin-bottom:10px;">Create Event</h1>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="errorText alert"><?php echo $_GET['error']; ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <div class="successText alert"><?php echo $_GET['success']; ?>
                        </div>
                    <?php } ?>
                    <form action="assets/php/addEvents.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-25">
                                <label for="name">Name</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="eventName" name="eventName" placeholder="Event Name" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="date">Date</label>
                            </div>
                            <div class="col-75">
                                <input type="date" id="date" name="date" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="category">Category</label>
                            </div>
                            <div class="col-75">
                                <select id="categoryOpt" name="category" required>
                                    <option value="Select">Select Category</option>
                                    <?php
                                    include "assets/php/includes/db_connect.inc.php";
                                    $records = mysqli_query($conn, "SELECT category From category");

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['category'] . "'>" . $data['category'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Description">Description</label>
                            </div>
                            <div class="col-75">
                                <textarea id="Description" name="description" placeholder="Write something between 500 words" style="height: 200px" maxlength="500" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="file">Select Image</label>
                            </div>
                            <div class="col-75">
                                <input type="file" name="image" accept="image/*" id="file" onchange="loadFile(event)" name="file" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25"></div>
                            <div class="col-75">
                                <p><img id="output" width="400" /></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">Event Status</div>
                            <div class="col-75">
                                <select id="status" name="status" required>
                                    <option value="Select">Select Status</option>
                                    <option value="Enable">Enable</option>
                                    <option value="Disable">Disable</option>
                                </select>
                            </div>
                        </div>

                        <div class="bt">
                            <input type="submit" class="submit" name="addEvent" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="assets/js/previewImg.js"></script>
    <script src="assets/js/alert.js"></script>
    <script src="assets/js/duplicateOption.js"></script>
</body>

</html>