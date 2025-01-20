<?php
include 'connection.php';
?>
<?php
$id =$_GET['id'];
$edit ="select * from register where id='$id'";
$query = mysqli_query($conn,$edit);
$row=mysqli_fetch_assoc($query);
// var_dump($row);
//   $hobby_string=explode(",",$row['hobby']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal_balaji</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="" style="background-color:#15284c ;">

    <div class="container">

        <div class="card o-hidden shadow-lg my-5" style="border:solid 4px #c1b460">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form method="post" action="update.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                            name="firstname" value="<?php echo $row['firstname'] ?>"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName"
                                            name="lastname" value="<?php echo $row['lastname'] ?>"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        value="<?php echo $row['email'] ?>" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            value="<?php echo $row['password'] ?>" id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="repeat_password" value="<?php echo $row['repeat_password'] ?>"
                                            id="repeat_password" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <input type="submit" name="update" class="btn btn-user btn-block" value="update"
                                    style="background-color:#15284c ; color:white;">
                                <hr>
                                <a href="./index.php" class="btn btn-google btn-user btn-block"
                                    style="background-color:#c1b460;">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="./forgot-password.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="./login.php">Already have an account? Login!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>