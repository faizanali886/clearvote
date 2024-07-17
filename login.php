<?php

ob_start();

session_start();



include("config/config.php");



function encrypt($encrypt)
{
	$encrypted = sha1(md5(base64_encode($encrypt)));

	return $encrypted;
}



/********************If login button is set ***********************/

if (isset($_POST['login'])) {


	$sql = mysqli_query($con, "select id,name
	from tbl_user 
	
	where email='" . $_POST['userName'] . "' and 
	password='" . encrypt($_POST['password']) . "'");


	$num = mysqli_num_rows($sql);


	if ($num > 0) {

        
		$data = mysqli_fetch_assoc($sql);

       

		$_SESSION['userid'] = $data['id'];

		$_SESSION['name'] = $data['name'];

		$_SESSION['role'] = $data['role'];
	

        $_SESSION['session_id'] = time();
        

		
			header("Location: dashboard.php");
       
		
		exit;

	} else {

		header("Location: login.php?status=1");

		exit;

	}

}





$msg = '';

if (isset($_GET['status']) && $_GET['status'] == '1') {

	$msg = "<div class='col-md-12 alert alert-danger'>Invalid Login Credentials. Please Enter Correct Login Credentials.</div>";

} else if (isset($_GET['status']) && $_GET['status'] == '2') {

	$msg = "<div class='col-md-12 alert alert-success'>Your password has been recovered successfully and sent it to your email-id.</div>";

} else if (isset($_GET['status']) && $_GET['status'] == '3') {

	$msg = "<div class='col-md-12 alert alert-danger'>This email address is not registered.</div>";

} else if (isset($_GET['msg']) && $_GET['msg'] == 'email_sent') {

	$msg = "<div class='col-md-12 alert alert-danger'>Login details send successfully.</div>";

} else if (isset($_GET['msg']) && $_GET['msg'] == 'email_not') {

	$msg = "<div class='col-md-12 alert alert-danger'>This email address is not registered with us.</div>";

}else if (isset($_GET['verify']) && $_GET['verify'] == 'succ') {

	$msg = "<div class='col-md-12 alert alert-success'>Email verification successfully. Login to continue...</div>";

}else if (isset($_GET['verify']) && $_GET['verify'] == 'failed') {

	$msg = "<div class='col-md-12 alert alert-danger'>Email verification failed. Please check link and try again.</div>";

}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Governancy Information - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-10 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img src="img/logo.png" width="300"><br>Login</h1>
                                    </div>
                                    <?php
                                    if($_GET['reg']=='1')
                                    {
                                    ?>
                                    <div class="alert alert-success">
                                        <strong>Success!</strong> Registration successfull.. Please login to continue
                                    </div>
                                    <?php
                                    }
                                   ?>
                                    <?php
                                    
                                    if($_GET['status']=='1')
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                        <strong>Error!</strong> Login failed. Please check email id and password and try again
                                    </div>
                                    <?php
                                    }
                                    if($_GET['status']=='2')
                                    {
                                    ?>
                                    <div class="alert alert-success">
                                        You are logged out of the system
                                    </div>
                                    <?php
                                    }
                                    if($_GET['status']=='3')
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                        Login Session Expired. Login again to continue...
                                    </div>
                                    <?php
                                    }
                                    if($_GET['verify']=='succ')
                                    {
                                    ?>
                                    <div class="alert alert-success">
                                    Email verification successfull. Login to continue...
                                    </div>
                                    <?php
                                    }
                                    if($_GET['verify']=='failed')
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                    Email verification failed. Please check link and try again.
                                    </div>
                                    <?php
                                    }
                                    if($_GET['msg']=='no_verified')
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                    Please verify your email by clicking on link received in email or contact administrator for further assistance.
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address or Username..." name="userName" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                        <br><a href="register.php">Register here</a>
                                       
                                    </form>
                                   
                                    
                                </div>
                            </div>
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