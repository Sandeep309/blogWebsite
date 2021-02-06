<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website</title>
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
        <!-- Massage -->
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

                    $conect = @mysqli_connect('localhost', 'root', '', 'blogsdb')
                        or die('Error<br><h2>' . mysqli_connect_error() . "</h2>");

                    if ($conect) {
                        $sql = "SELECT * FROM blogs";
                        $result = mysqli_query($conect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) :
                    ?>

                                <div class="col-auto mb-3 mx-auto mx-md-0">
                                    <div class="card border-0 shadow" style="max-width: 20rem;">
                                        <img src="img/blogs.jpg" class="card-img rounded-0 rounded-top" alt="blogs image">
                                        <div class="card-img-overlay p-0 text-end">
                                            <small class="badge">
                                                <?php echo date('d M Y', strtotime($data['date'])); ?>
                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title mb-1"><?php echo $data['title']; ?></h5>
                                            <small class="card-subtitle">
                                                <i class="far fa-edit text-primary">
                                                </i> <?php echo $data['writer']; ?>
                                            </small>

                                            <p class="card-text mt-2"><?php echo $data['content']; ?></p>
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                        </div>
                                    </div>
                                </div>
                    <?php

                            endwhile;
                        } else {
                            echo "query failed";
                        }
                    }
                    mysqli_close($conect);
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