<?php
$name = "";
$email = "";
$password = "";

if (isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
  $name = $_POST["nom"];
  $email = $_POST["email"];
  $password = md5($_POST["pass"]);

  if (!empty($name) && !empty($email) && !empty($password)) {
    include("connexion.php");
    $query = "insert into client values( null,'$name' , '$email' , '$password')";
    $db->exec($query);
    header("location: index1.php");
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <form action="" method="POST">
    <div id="content_container">
      <div id="form_container">
        <div id="form_header_container">
          <h2 id="form_header"> Inscription</h2>
        </div>

        <div id="form_content_container">
          <input type="text" id="full_name" name="nom" placeholder="Full name" value="<?php echo $name ?>">
          <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email ?>">
          <input type=" password" id="password" name="pass" placeholder="New password" value="<?php echo $password ?>">

          <div id=" button_container">

            <button id="right-button" onclick="register()">Register</button>
          </div>

        </div>
      </div>
    </div>
  </form>
</body>



</html>