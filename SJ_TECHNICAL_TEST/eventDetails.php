<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/eventDetails.css" />
    <title>Events</title>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">Event</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="allevents.php" class="nav-link">Events</a>
                </li>
                <li class="nav-item">
                    <a href="searchEvent.php" class="nav-link">Search</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <?php
    include "assets/php/includes/db_connect.inc.php";
    $id = $_GET['id'];
    $qry = mysqli_query($conn, "select * from events where id='$id'"); // select query
    $data = mysqli_fetch_array($qry); // fetch data
    ?>

    <div class="wholeBorder">
        <h1 class="name"><?php echo $data['name'] ?></h1>
        <div class="border">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($data['image']) . '"/>'; ?>
        </div>
        <div class="category"><?php echo $data['category'] ?></div>
        <div class="date">Date: <?php echo $data['date'] ?></div>
        <div class="description"><?php echo $data['description'] ?></div>
    </div>
    <div style="text-align:center;margin-top:10px;font-size:16px;"><a href="allevents.php">Back</a></div>

</body>
<script src="assets/js/navbar.js"></script>

</html>