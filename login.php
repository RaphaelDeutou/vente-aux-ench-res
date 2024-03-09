<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>ISTA School Prime :: login</title>
    <link rel="stylesheet" href="stylelog.css">


</head>

<body>

    <?php
    $email = "";
    $password = "";
    $message = "";

    //connexion � la base de donn�es
    include "acces_bd.php";




    if (!empty($_POST)) {
        //r�cup�ration des donn�es saisies dans le formulaire
        $email = $_POST["email"];
        $password = md5($_POST["pass"]);
        //controle: on s'assure que tous les champs ont �t� remplis
        if (empty($email) || empty($password)) {
            $message = "Veuillez saisir vos param�tres de connexion";
        } else //si ok on part verifier dans la base que l'utilisateur existe
        {


            //pour executer une requete on utilise mysqli_query avec 2 param�tres :
            //le resultat de la connexion � la B.D qui est contenu dans $con
            // et la requete propre �crite en SQL encadr�e des doubles c�tes
            $req = mysqli_query($con, "select email, password from client where email='$email' && password = '$password'");

            //pour compter le nombre ligne que renvoie une requete on utilise mysqli_num_rows
            //avec en param�tre la requ�te dont on veut savoir le nombre de ligne
            $nbre_ligne = mysqli_num_rows($req);

            //si l'utilisateur est dans la base alors on va trouver une ligne avec ses informations

            if ($nbre_ligne == 1) {
                //ex�cution de la requ�te
                $req = mysqli_query($con, "select email, password from client where email='$email' && password = '$password'");

                //mysqli_fetch_object me permet de recup�rer chaque information contenu dans une colonne de la table
                //je dois mettre cette information dans une variable que j'ai choisi d'appeler ici $ro
                if ($ro = mysqli_fetch_object($req)) {
                    //si l'utilisateur est dans la table
                    //on sauvegarde ses informations dans les variables de session
                    //a gauche la variable de session et � droite la donn�e qui vient de la base mysql
                    //N.B: le signe -> est le tiret de 6 (-) suivi de la balise fermante >
                    // il n y a pas d'espace en le signe -> et le nom de la colonne de la table
                    //exemple juste $ro->nom
                    //exemple faux $ro -> nom ou $ro-> nom

                    $_SESSION['id'] = $ro->id;
                    $_SESSION['email'] = $ro->email;



                    header('location:index1.php');
                }
            } else {
                $message = "Erreur : mauvais email ou mot de passe incorrecte";
            }
        }
    }

    ?>
    <form action="" method="post">
        <div id="form_container">

            <h2> Connectez-vous </h2>

            <input type="text" id="email" name="email" placeholder="votre email" value="" autocomplete="off" />

            <input type="password" id="password" placeholder="votre mot de passe" autocomplete="off" name="pass" />

            <input type="submit" value="Envoyer" />
            <a href="index.php">Inscrire</a>

            <tr>
                <td colspan="2"><?php echo $message; ?></td>
            </tr>


    </form>
    </div>


    <!--fin-->

    <!-- d�but du pied -->

    <!-- fin-->
</body>

</html>