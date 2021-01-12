<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    extract($_POST);
    $connect = mysqli_connect('localhost', 'root', '', 'blogsdb')
        or die('ERROR:<h2>' . mysqli_connect_error() . '</h2>');

    if ($connect) {
        $sql = "SELECT * FROM userinfo WHERE Username='$userName' && Email='$userEmail'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "User already Exits";
        } else {
            $register = "INSERT INTO userinfo(Username,Email,Pass)
             values('$userName','$userEmail','$userPassword')";
            mysqli_query($connect, $register);
            session_start();
            header('location:../login.php');
        }
    } else {
        echo  mysqli_connect_error();
    }
}
mysqli_close($connect);
