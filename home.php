<?php 
require "koneksi.php";
session_start();

if(!isset($_SESSION['login']) == true && isset($_SESSION["account"]) == null){
    header(header: "Location: oop.php");
}

$name = "";
$mail = "";
$image_path = "";
$about = "";

$key = $_SESSION["account"];
$stmt = $koneksi->prepare("SELECT * FROM login WHERE Email = ?");
$stmt->bind_param("s", $key);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $name = $data["Username"];
    $mail = $data["Email"];
    $image_path = $data["Image"];
    $about = $data["About"];
} else {
    echo "No results found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile-<?= $name?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link rel="stylesheet" href="js/popper.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        .custom-box-shadow {
        box-shadow: 0px 0px 5px black; 
        }

        .menu::after{
            content: '';
            width: 150px;
            position: fixed;
            height: 100vh;
            background: white;
            translate: 110px -30px;
            background-color: #ffc107;
        }

    </style>
</head>
<body>
<div class="col-12 vh-100 d-flex bg-warning align-items-center justify-content-center">
    <div class="col-10 bg-light d-flex shadow justify-content-end" style="height: 90%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; overflow: hidden;">
        <!-- Left Profile Sidebar -->
        <div style="width: 30%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; box-shadow: 2px 0px 10px 1px black; z-index: 2;" class="d-flex flex-column bg-dark align-items-center h-100 border-end">
            <img src="asset/profile_<?= $image_path?>" alt="" width="35%" class="rounded-circle mt-5 custom-box-shadow">
            <label for="" class="h4 fw-bold mt-5 text-light"><?= $name?></label>
        </div>

        <!-- Right Content Section -->
        <div style="width: 70%; z-index: 1;" class="d-flex bg-light flex-column align-items-start h-100 p-5">
            <label for="" class="h2 fw-bold"><?= $name?></label>
            <label for="" class="mt-5 h4">About</label>
            <p class="mt-2 h6 pe-5"><?= $about . $about . $about . $about?></p>
            <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
            <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $mail ?></span></label>
        </div>

        <!-- Sidebar Menu (Hidden/Sliding) -->
        <div id="slide" class="position-fixed bg-danger flex-column align-items-start pt-2 px-4"
            style="width: 25%; margin-right: 80px; z-index: 1; height: 90%; display: none;">
            <label class="w-100 border-bottom border-2 border-dark my-2" style="height: 10%;"></label>
            <label class="w-100 border-bottom border-2 border-dark my-2" style="height: 10%;"></label>
            <label class="w-100 border-bottom border-2 border-dark my-2" style="height: 10%;"></label>
            <label class="w-100 border-bottom border-2 border-dark my-2" style="height: 10%;"></label>
            <label class="w-100 border-bottom border-2 border-dark my-2" style="height: 10%;"></label>
        </div>

        <!-- Fixed Side Menu Icon -->
        <div class="position-fixed bg-dark d-flex flex-column align-items-center py-4 menu"
            style="width: 80px; z-index: 4; height: 90%;">
            <i class="fa-solid fa-bars text-light" style="font-size: 30px; cursor: pointer;" id="menu"></i>
            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff; font-size: 30px; margin-bottom: 5%; margin-top: auto;"></i>
        </div>
    </div>
</div>
<script src="main_js/main_page.js"></script>
</body>
</html>