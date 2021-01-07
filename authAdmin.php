<!-- form validation -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   extract($_POST);

   $emailPattern = 'admin@gmail.com';
   $passwordPattern = '1212';
   if ($email == $emailPattern && $password == $passwordPattern) {
      header('location:admin.php?msg=Logged Succesfully !');
   } else {
      header('location:logIn.php?msg=Wrong details !');
   }
} else {
   header('location:logIn.php?msg=Please Log In or Try again !');
}
?>