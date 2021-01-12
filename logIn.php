<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- Links -->
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

        <div class="row">
            <div class="col-md-6 mb-3 mx-auto mx-md-0">
                <div class="card" style="max-width: 30rem;">
                    <div class="card-body">
                        <h2 class="card-text mb-3">Log In </h2>
                        <!-- Log In Form -->
                        <form class="mb-3" action="authAdmin.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="text" class="form-control" name="email" placeholder="name@example.com" required>
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="******" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Log In</button>

                        </form>

                        <div class="d-flex justify-content-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Create New Account
                            </button>

                            <!-- Sign Up Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel">Sign Up</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Sign Up Form -->
                                            <form action="process/signUpAuth.php" method="POST">
                                                <div class="mb-3">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control" name="userName" placeholder="Username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email address</label>
                                                    <input type="text" class="form-control" name="userEmail" placeholder="name@example.com" required>
                                                    <div class="form-text">We'll never share your email with anyone else.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="userPassword" placeholder="******" required>
                                                </div>

                                                <div class="mb-3 text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-6 d-none d-md-block position-fixed bottom-0 end-0">
                <img src="img/undraw_Fingerprint_re_uf3f.png" class="img-fluid m-auto" alt="undraw online reading">
            </div>
        </div>

    </section>


    <!-- script -->
    <script src="bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>