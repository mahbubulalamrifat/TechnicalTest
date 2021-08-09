<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="icon" href="assets/img/logo.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/allEvents.css" />
    <title>Events</title>
</head>

<body>
    <top-bar></top-bar>

    <div class="header">
        <h2>Search Here</h2>
        <div class="form-area">
            <form>
                <input type="search" placeholder="Type Here to filter the List" autofocus />
            </form>
        </div>
    </div>

    <div class="flex-container">
        <h1 id="not-found" style="display: none;color:red;">Not Found</h1>
        <?php
        include "assets/php/includes/db_connect.inc.php"; // Using database connection file here

        $query = "SELECT * FROM events WHERE status='enable' ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="feature-card card">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'; ?>

                    <div class="feature-card-tilte">
                        <h3>
                            <?php echo $row["name"]; ?>
                        </h3>
                    </div>
                    <div class="feature-card-deatails">
                        <i class="fa fa-bank"></i>
                        <h4><?php echo $row["category"]; ?></h4>
                        <p><?php echo $row["description"]; ?></p>
                        <a href="eventDetails.php?id=<?php echo $row['id']; ?>">Read More</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</body>
<script src="assets/js/top.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/navbarActive.js"></script>
<script src="assets/js/search.js"></script>

</html>