<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
        or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");
    if ($conect) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "UPDATE blogs SET title= '$blogtitle', content='$blogcontent', writer='$writer' WHERE id='$id' ";
            if (mysqli_query($conect, $sql)) {
                header('location:../admin.php?msg=Successfully updated');
            } else {
                // echo "User couldn't inserted in DB";
                echo "Error: " . $sql . "<br>" . mysqli_error($conect);
            };
        }
    }
    mysqli_close($conect);
} else {
    header('location:doc1.php?msg=Not updated!');
}
