<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <!-- Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navigation.php") ?>

    <!-- LogIn Form -->
    <section class="container py-5 mt-5">
        <!-- Massage -->
        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='lead text-danger'>" . $_GET['msg'] . "</p>";
        }
        ?>

        <!-- Blogs List -->
        <h3 class="h3">Blogs List</h3>
        <div class="table-responsive mb-3">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Writer</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
                        or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");

                    if ($conect) {
                        $sql = "SELECT * FROM blogs";
                        $result = mysqli_query($conect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) :
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $data['id']; ?></th>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['writer']; ?></td>
                                    <td><?php echo $data['date']; ?></td>
                                    <td>
                                        <a href="editBlog.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="deleteBlog.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                    <?php
                            endwhile;
                        } else {
                            echo "query failed";
                        }
                    }
                    mysqli_close($conect);
                    ?>

                </tbody>
            </table>
        </div>


        <!-- Create Blog Post -->
        <!-- Forms -->
        <form action="addBlog.php" method="POST">
            <h3>Create New Blog </h3>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="blogtitle" class="form-control" placeholder="Blog name">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="blogcontent" class="form-control" placeholder="Blog content" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Writer</label>
                <input type="text" name="writer" class="form-control" placeholder="Writer">
            </div>
            <div class="mb-3 text-end">
                <button class="btn btn-success disabled">Reset</button>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>




    <!-- script -->
    <script src="bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>