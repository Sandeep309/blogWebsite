<?php


$conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
    or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");

if ($conect) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM blogs WHERE id = '$id'";
        if (mysqli_query($conect, $sql)) {
            header('location:admin.php?msg=Blog Deleted Successfully');
        } else {
            header('location:admin.php?msg= Blog Not Deleted !');
        }
    }
}
mysqli_close($conect);
