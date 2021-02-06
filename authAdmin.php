<!-- form validation -->
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   extract($_POST);
   $connect = mysqli_connect('localhost', 'root', '', 'blogsdb')
      or die('ERROR:<h2>' . mysqli_connect_error() . '</h2>');

   if ($connect) {
      $sql = "SELECT * FROM userinfo WHERE Email ='$email' && fullname='$fullName'";
      $result = mysqli_query($connect, $sql);
      if (mysqli_num_rows($result) == 1) {
         while ($data = mysqli_fetch_assoc($result)) :
            $_SESSION['adminName'] = $data['Username'];
         endwhile;
         header('location:admin.php?msg=Logged Succesfully !');
      } else {
         header('location:logIn.php?msg=Wrong details !');
         echo "NOT FOUND";
      }
   } else {
      mysqli_connect_error();
   }
} else {
   header('location:logIn.php?msg=Please Log In or Try again !');
}
mysqli_close($connect);
?>