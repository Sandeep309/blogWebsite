<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
        or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");

    if ($conect) {
        extract($_POST);
        // echo $blogtitle, $blogcontent, $writer;
        $sql = "INSERT INTO blogs(title, content, writer) VALUES('$blogtitle','$blogcontent','$writer')";

        if (mysqli_query($conect, $sql)) {
            header('location:index.php');
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($conect);
        }
    }
    @mysqli_close($conect);
} else {
    header('location:index.php');
}
