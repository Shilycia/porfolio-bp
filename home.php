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
            translate: 110px -40px;
            background-color: #ffc107;
        }

        #navigation-page{
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        #navigation-page:hover{
            transform: scale(1.1);
        }

        #scroll{
            transition: all 1s ease-out;
        }

        button{
            transition: all 0.1s ease-in;
        }

        button:hover{
            transform: scale(1.1);
        }

        #log_out{
            transition: all 0.1s ease-in;
        }

        #log_out:hover{
            transform: scale(1.1);
        }

        #menu{
            transition: all 0.1s ease-in;
        }

        #menu:hover{
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<div class="col-12 vh-100 bg-warning align-items-center justify-content-center" style="display: flex;">
    <div class="col-10 bg-light d-flex shadow justify-content-end" style="height: 90%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; overflow: hidden;">
        <!-- profile -->
        <div style="width: 30%; border-bottom-left-radius: 30px; border-top-left-radius: 30px; box-shadow: 2px 0px 10px 1px black; z-index: 2;" class="d-flex flex-column bg-dark align-items-center h-100 border-end">
            <img src="asset/profile_<?= $val[2]?>" alt="" width="35%" class="rounded-circle mt-5 custom-box-shadow">
            <label for="" class="h4 fw-bold mt-5 text-light"><?= $val[0]?></label>
        </div>

        <!-- column content -->
        <div style="width: 70%; z-index: 1; overflow-x: hidden" class="d-flex bg-light h-100">
            <div id="scroll" class="d-flex bg-light h-100 w-auto" style="min-width: 4240px;">
                <div id="About_content" style="display: flex; width: 20%; left: 0;" class="bg-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><i class="fa-solid fa-user me-3"></i> Profile</label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-dark text-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><i class="fa-solid fa-table me-3"></i></i> Table</label>
                    <label for="" class="h4 fw-bold mt-4">Skils</label>
                    <div class="w-100 d-flex align-content-start" style="max-height: 40%; overflow-y: scroll;">
                        <table class="table table-hover table-light text-center mt-2">
                            <thead class="position-sticky top-0"> 
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Skils</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>HTML 5</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque soluta ipsa pariatur atque dolores obcaecati sit, cumque corrupti rerum eaque!</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>CSS 3</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio veniam commodi amet porro minima maxime similique fugiat. Porro, voluptatem neque.</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Java Script</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. A nulla eveniet, ipsam autem quisquam at fugiat vero beatae impedit ex!</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>C#</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. A nulla eveniet, ipsam autem quisquam at fugiat vero beatae impedit ex!</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Blender</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. A nulla eveniet, ipsam autem quisquam at fugiat vero beatae impedit ex!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <label for="" class="h4 fw-bold mt-4">Experience</label>
                    <div class="w-100" style="max-height: 40%; overflow-y: scroll;">
                        <table class="table table-hover table-light text-center mt-2">
                            <thead class="position-sticky top-0"> 
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>   
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>Larry the bus</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-dark text-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><i class="fa-solid fa-fire me-3"></i></i> Skils</label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-dark text-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><i class="fa-solid fa-circle-info me-3"></i> About</label>
                </div>
                <div id="About_content" style="display: flex; width: 20%;" class="bg-dark text-light flex-column align-items-start h-100 p-5">
                    <label for="" class="h2 fw-bold"><i class="fa-solid fa-gear me-3"></i> Setting</label>
                </div>
            </div>
        </div>
        
        <!-- Hidden Insert Skill -->
        
        
        <!-- menu slide -->
        <div id="slide" class="position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0"
            style="width: 25%; margin-right: 80px; z-index: 1; height: 90%; display: none;">
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-dark fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-user me-3"></i>Profile</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-dark fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-table me-3"></i>Table</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-dark fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-fire me-3"></i>Skils</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-dark fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-circle-info me-3"></i>About</label>
            <label id="navigation-page" class="w-100 border-bottom border-2 border-dark my-2 d-flex align-items-center justify-content-start ps-3 text-dark fw-bold" style="height: 10%; font-size: 20px;"><i class="fa-solid fa-gear me-3"></i>Setting</label>
        </div>

        <!-- menu page -->
        <div class="position-fixed bg-dark d-flex flex-column align-items-center py-4 menu border-start"
            style="width: 80px; z-index: 4; height: 90%; box-shadow: -2px 0px 5px black;">
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