<?php
include("config.php");
$email="";
$password="";
session_start();

error_reporting(0);

if(isset($_POST['submit']))
 {
     $email = $_POST['email'];
     $password = md5($_POST['password']);

     $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
     $result = mysqli_query($conn, $sql);

     if ($result->num_rows > 0)
     {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location:index2.php"); 
    }
     else
     {
        echo "<script>alert('Woops! Email or Password is wrong.')</script>";
     }
 }
?>





<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login :: Connexion </title>

    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">CONNEXION</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                           
                                            <input type="email"   class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" value="<?php echo $password;?>" name="password" required>
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            
                                        
                                     

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit">CONNEXION</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                                    </div>
    <div class="login-social">
        <a href="#" class="facebook"><i class="fa fa-facebook"></i> Facebook</a>&nbsp;&nbsp;&nbsp;
        <a href="#" class="twitter"><i class="fa fa-twitter"></i> Twitter</a>&nbsp;&nbsp;&nbsp;
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i> Google plus</a>&nbsp;&nbsp;&nbsp;
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i> Linkedin</a>
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>