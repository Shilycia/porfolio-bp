<?php 

$host = "localhost";
$user = "root";
$pass = "";
$database = "test";

$koneksi = mysqli_connect(hostname: $host,username: $user,password: $pass,database: $database);

if($koneksi){
}else{
    die("koneksi gagal");
}

?>