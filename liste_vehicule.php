<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include("acces_bd.php");

    if (isset($_POST['btsubmit'])) 
    {
        $mc = $_POST['motcle'];
        $reqSelect = "select * from produit where nom like '%$mc%'";
    } else {
        $reqSelect = "select * from produit";
    }
    $resultat = mysqli_query($con, $reqSelect);
    $nbr = mysqli_num_rows($resultat);
    echo "<p><b>" . $nbr . "<b> resultat des recherches.....<p>";
    while ($ligne = mysqli_fetch_assoc($resultat)) {
    ?>
        <div>
            <img src="<?php echo $ligne['photo']; ?>"><br>
            <?php echo $ligne['nom']; ?>
            <?php echo $ligne['Prix']; ?>
            <?php echo $ligne['commentaire']; ?>
        </div>
    <?php } ?>
</body>

</html>