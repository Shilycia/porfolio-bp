<?php 
session_start();

$execute = new thisclass;
$execute -> isLoggedIn();
$execute -> destroy();
class thisclass{
    public function isLoggedIn() {
        session_start();
        if (!isset($_SESSION['login']) && isset($_SESSION["account"]) == null ) {
            header("Location: oop.php");
            exit();
        }
    }

    public function destroy(){
        session_unset();
        session_destroy();
        header("Location: oop.php");
    } 
}
