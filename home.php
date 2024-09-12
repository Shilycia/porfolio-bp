<?php 
require "koneksi.php";

$start = new user;
$start -> isLoggedIn();
$val = $start -> getUserData();
$GLOBALS['koneksi'] = $koneksi;


class User {
    public $name;
    public $mail;
    public $image_path;
    public $about;

    // Method to check if the user is logged in and has a valid session
    public function isLoggedIn() {
        session_start();
        if (!isset($_SESSION['login']) && isset($_SESSION["account"]) == null ) {
            header("Location: oop.php");
            exit();
        }
    }

    // Method to fetch user data based on session email
    public function getUserData() {
        $key = $_SESSION["account"];
        $stmt = $GLOBALS['koneksi']->prepare("SELECT * FROM login WHERE Email = ?");
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $name = $this->name = $data["Username"];
            $mail = $this->mail = $data["Email"];
            $image = $this->image_path = $data["Image"];
            $about = $this->about = $data["About"];

            $push = [$name,$mail,$image,$about];
            return $push;

        } else {
            echo "No results found";
        }

        $stmt->close();
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile-<?= $val[0]?></title>
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

        #navigation-page{
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        #navigation-page:hover{
            transform: scale(1.1);
            box-shadow: 1px 1px 2px black;
        }

        #scroll{
            transition: all 1s ease-in-out;
        }

    </style>
</head>
<body>
<div class="col-12 vh-100 bg-warning align-items-center justify-content-center" style="display: flex;">
    <div class="col-10 bg-light d-flex shadow justify-content-end" style="height: 90%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; overflow: hidden;">
        <!-- Left Profile Sidebar -->
        <div style="width: 30%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; box-shadow: 2px 0px 10px 1px black; z-index: 2;" class="d-flex flex-column bg-dark align-items-center h-100 border-end">
            <img src="asset/profile_<?= $val[2]?>" alt="" width="35%" class="rounded-circle mt-5 custom-box-shadow">
            <label for="" class="h4 fw-bold mt-5 text-light"><?= $val[0]?></label>
        </div>

        <!-- Right Content Section -->
        <div style="width: 70%; z-index: 1; overflow-x: hidden" class="d-flex bg-light h-100">
            <div id="scroll" class="d-flex bg-light h-100 w-auto" style="min-width: 4240px;">
                <div id="About_content" style="display: flex; width: 20%; left: 0;" class="bg-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><?= $val[0]?></label>
                    <label for="" class="mt-5 h4">About</label>
                    <p class="mt-2 h6 pe-5"><?= $val[3]?></p>
                    <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
                    <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $val[1] ?></span></label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-dark text-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><?= $val[0]?></label>
                    <label for="" class="mt-5 h4">About</label>
                    <p class="mt-2 h6 pe-5"><?= $val[3]?></p>
                    <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
                    <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $val[1] ?></span></label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-danger flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><?= $val[0]?></label>
                    <label for="" class="mt-5 h4">About</label>
                    <p class="mt-2 h6 pe-5"><?= $val[3]?></p>
                    <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
                    <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $val[1] ?></span></label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-success flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><?= $val[0]?></label>
                    <label for="" class="mt-5 h4">About</label>
                    <p class="mt-2 h6 pe-5"><?= $val[3]?></p>
                    <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
                    <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $val[1] ?></span></label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-info flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><?= $val[0]?></label>
                    <label for="" class="mt-5 h4">About</label>
                    <p class="mt-2 h6 pe-5"><?= $val[3]?></p>
                    <label for="" class="h5 mb-1 mt-auto fw-bold">Contact:</label>
                    <label for="" class="mb-1 mt-1 ms-4 fw-bold">Email: <span class="fw-normal"><?= $val[1] ?></span></label>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu (Hidden/Sliding) -->
        <div id="slide" class="position-fixed bg-danger flex-column align-items-start pt-2 px-4"
            style="width: 25%; margin-right: 80px; z-index: 1; height: 90%; display: none;">
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-light fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-user me-3"></i>Profile</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-light fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-table me-3"></i>Table</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-light fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-fire me-3"></i>Skils</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-light fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-circle-info me-3"></i>About</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-light fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-gear me-3"></i>Setting</label>
        </div>

        <!-- Fixed Side Menu Icon -->
        <div class="position-fixed bg-dark d-flex flex-column align-items-center py-4 menu"
            style="width: 80px; z-index: 4; height: 90%;">
            <i class="fa-solid fa-bars text-light" style="font-size: 30px; cursor: pointer;" id="menu"></i>
            <i id="log_out" class="fa-solid fa-right-from-bracket" style="color: #ffffff; font-size: 30px; margin-bottom: 5%; margin-top: auto; cursor: pointer; "></i>
        </div>
    </div>
    <div id="container_confirm_exit" class="col-12 h-100 align-items-center justify-content-center position-absolute" style="background-color: rgba(0 ,0,0,0.5); z-index: 10; display: none;" onclick="noexit()">
        <div class="w-25 bg-light border border-1 d-flex shadow border-dark flex-column justify-content-center align-items-center" style=" height: 25vh;  gap: 30px; ">
            <label for="" class="h5">Apakah anda ingin keluar?</label>
            <div class="w-100 d-flex justify-content-center align-items-center">
                <button class="w-25 mx-2 border-1 rounded fw-bold" onclick="noexit()">NO</button>
                <button class="w-25 mx-2 border-0 rounded text-light fw-bold bg-danger" onclick="exit()">YES</button>
            </div>
        </div>
    </div>
</div>

<script src="main_js/main_page.js"></script>
</body>
</html>