 <!-- form validation -->
 <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        extract($_POST);
        $email = $_POST["email"];
        $password = $_POST["password"];
    }
    ?>