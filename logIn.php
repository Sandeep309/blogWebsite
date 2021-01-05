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
        <div class="row">
            <div class="col-md-6 mb-3 mx-auto mx-md-0">
                <div class="card" style="max-width: 30rem;">
                    <div class="card-body">
                        <h2 class="card-text mb-3">Log In </h2>
                        <form action="authAdmin" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="text" class="form-control" name="email">
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>

                        </form>
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