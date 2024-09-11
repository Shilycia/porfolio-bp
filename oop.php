<?php 
require "koneksi.php";
session_start();


$mainclass = new main;

$mainclass->checkstatus();
$mainclass->login(konek: $koneksi);

class main{
    function checkstatus(){

        if(isset($_SESSION['login']) == true && !isset($_SESSION["account"]) == null){
            header(header: "Location: home.php");
        }

    }

    function login($konek){
        if (isset($_POST["submit"])) {
            $account = $_POST["mail"];
            $password = $_POST["pass"];
            
            // Menggunakan prepared statement untuk keamanan
            $stmt = $konek->prepare(query: "SELECT * FROM login WHERE Email = ? AND Password = ?");
            $stmt->bind_param("ss", $account, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $_SESSION["login"] = true;
                $_SESSION["account"] = $account;
                header(header: "Location: home.php");
            } else {
                echo "<script>alert('Account Not Found')</script>";
            }
        }        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session_php</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link rel="stylesheet" href="js/popper.min.js">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="col-12 vh-100 d-flex justify-content-center align-items-center bg-warning">
        <div class="col-6 bg-light shadow d-flex" style="border-radius: 30px; height: 60vh;">
            <div class="w-50 border border-end d-flex flex-column align-items-center justify-content-center" style="border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
                <img src="asset/house.png" alt="" class="w-50">
                <label for="" class="h3 fw-bold mt-3">My House</label>
            </div>
            <div class="w-50 p-5" style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;">
                <label for="title" class="h2 fw-bold">Login</label>
                <form action="" method="post" class="mt-5">
                    <label for="" class="h5">Email</label>
                    <input type="email" class="w-100 px-2" name="mail" required>
                    <label for="" class="h5 mt-3">Password</label>
                    <input type="password" class="w-100 px-2" id="password" name="pass" required>
                    <br>
                    <input type="checkbox" id="check"><label for="" class="ms-2">Show Password</label>
                    <div class="w-100 d-flex align-items-center justify-content-center mt-4">
                        <input type="submit" name="submit" class="w-50 h-25 py-2 text-light fw-bold bg-warning border border-none rounded" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="main_js/main.js"></script>
</body>
</html>
