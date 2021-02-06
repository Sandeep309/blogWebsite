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
    <title>Admin Control Panel</title>
    <!-- Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navigation.php") ?>

    <!-- LogIn Form -->
    <section class="container py-5 mt-5">
        <!-- Wecome User -->
        <h3 class="text-dark text-end text-capitalize">Welcome <?php echo $_SESSION['adminName']; ?></h3>
        <!-- Massage -->
        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='lead text-danger'>" . $_GET['msg'] . "</p>";
        }
        ?>

        <div class="d-flex justify-content-between">
            <!-- Blogs List -->
            <h2 class="text-dark">Blogs List</h2>

            <!-- Create Post -->
            <!-- Button CreateBlog trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Create Blog
            </button>
        </div>

        <!-- Modal CreateBlog -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Create Blog Post -->
                        <form action="addBlog.php" method="POST">
                            <h3>Create New Blog </h3>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="blogtitle" class="form-control" placeholder="Blog name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea name="blogcontent" class="form-control" placeholder="Blog content" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Writer</label>
                                <input type="text" name="writer" class="form-control" placeholder="Writer" required>
                            </div>
                            <div class="mb-3 text-end">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Submit</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Blog List Table -->
        <div class="table-responsive mt-3 mb-3">
            <table id="table_id" class="table table-striped table-hover" style="width:100%">
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
                                $str = $data['date'];
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $data['id']; ?></th>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['writer']; ?></td>
                                    <td><?php echo date('g:i A, d M Y', strtotime($str)); ?></td>
                                    <td>
                                        <a href="editBlog.php?id=<?php echo $data['id']; ?>" class="btn btn-warning mb-2">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="deleteBlog.php?id=<?php echo $data['id']; ?>" class="btn btn-danger mb-2">
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

    </section>



    <!-- script -->
    <script src="bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>