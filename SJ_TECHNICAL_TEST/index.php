<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="icon" href="assets/img/logo.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <title>Home</title>
</head>

<body>
    <top-bar></top-bar>

    <div class="slideshow-container">
        <?php
        include "assets/php/includes/db_connect.inc.php";
        $query = "SELECT * FROM events WHERE feature='feature' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="mySlides fade">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'; ?>
                    <div class="text"><?php echo $row["name"]; ?></div>
                </div>
        <?php
            }
        }
        ?>

        <a class="prev" onclick="slideVal(-1)">&#10094;</a>
        <a class="next" onclick="slideVal(1)">&#10095;</a>
    </div>
    <br />

    <div style="text-align: center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</body>
<script src="assets/js/top.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/navbarActive.js"></script>
<script src="assets/js/slider.js"></script>

</html>