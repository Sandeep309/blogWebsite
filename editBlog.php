<!-- SESSION  -->
<?php
session_start();
if (!isset($_SESSION['adminName'])) {
    header('location:login.php?msg=Please Log In First !');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <!-- Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navigation.php") ?>

    <?php

    $conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
        or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");

    if ($conect) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM blogs WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conect, $sql);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
            } else {
                header('location:admin.php?msg= Retry to edit !');
            }
        } else {
            header('location:admin.php?msg= Retry to edit !');
        }
    }
    mysqli_close($conect);
    ?>

    <main class="container py-5 mt-5">

        <!-- Edit Blog Post -->
        <!-- Forms -->
        <form action="process/editBlogProcess.php?id=<?php echo $data['id']; ?>" method="POST">
            <h3>Edit Blog </h3>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="blogtitle" class="form-control" value="<?php echo $data['title']; ?>" placeholder="Blog name">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="blogcontent" class="form-control" placeholder="Blog content" rows="5"><?php echo $data['content']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Writer</label>
                <input type="text" name="writer" class="form-control" value="<?php echo $data['writer']; ?>" placeholder="Writer">
            </div>
            <div class="mb-3 text-end">
                <a href="admin.php" class="btn btn-success">Cancel</a>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>

    </main>


    <!-- script -->
    <script src="bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>