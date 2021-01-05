<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <!-- Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navigation.php") ?>

    <!-- Blogs -->
    <section class="container py-5 mt-5">
        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='lead text-danger'>" . $_GET['msg'] . "</p>";
        }
        ?>
        <div class="row">
            <!-- Blogs Columns -->
            <div class="col-md-6">
                <div class="row">
                    <?php
                    $blogsData = array(
                        array("PHP Tutorial", "PHP is a server scripting language, and a powerful
                         tool for making dynamic and interactive Web pages."),
                        array("SQL Tutorial", "SQL is a standard language for storing, manipulating
                         and retrieving data in databases."),
                    );
                    foreach ($blogsData as $blogTable) :
                    ?>
                        <div class="col-auto mb-3 mx-auto mx-md-0">
                            <div class="card " style="max-width: 20rem;">
                                <img src="img/blogs.jpg" class="card-img-top" alt="blogs image">
                                <div class="card-body">
                                    <h5 class="card-title mb-1"><?php echo $blogTable[0]; ?></h5>
                                    <small class="card-subtitle"><i class="far fa-edit text-primary"></i> Sandee saini</small>
                                    <p class="card-text mt-2"><?php echo $blogTable[1]; ?></p>
                                    <a href="#" class="btn btn-primary ">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>

            </div>
            <!-- Hero Image -->
            <div class="col-md-6 d-none d-md-block position-fixed bottom-0 end-0">
                <img src="img/undraw_online_reading_np7n.png" class="img-fluid m-auto" alt="undraw online reading">
            </div>
        </div>

    </section>


    <!-- script -->
    <script src="bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>