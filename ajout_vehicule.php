      <?php
        include("acces_bd.php");
        if (isset($_POST['btadd'])) {
            $photo = $_POST['photo'];
            $prix = $_POST['Prix'];
            $nom = $_POST['nom'];
            $cmt = $_POST['commentaire'];

            $image = $_FILES['photo']['tmp_name'];

            $traget = "images/" . $_FILES['photo']['name'];

            /* move_uploaded_file() tente de déplacer 
                        les fichiers d'un répertoire temporaire
                         vers un répertoire de destination. */

            move_uploaded_file($image, $traget);

            $reqAdd = "INSERT INTO produit (null,nom,Prix,commentaire,photo) VALUES(null,'$nom', '$prix','$cmt','$traget')";

            $resultat = mysqli_query($con, $reqAdd);

            if ($resultat) {
                echo "Insertion des données validées";
            } else {
                echo "Echec d Insertion des données";
            }

            header('location:liste_vehicule.php');
        }
        ?>


      <!DOCTYPE html>

      <html lang="en">

      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width,initial-scale=1">
          <title> produit</title>


      </head>

      <body>



          <div class="content-body">
              <div class="container-fluid">
                  <form action="" name="formAdd" method="post">
                      <h2 align="center">Ajouter Nouveau produit..</h2>

                      <label><b>Nom Produit :</b></label>
                      <input type="text" name="nom" class="form-control" placeholder="Entrer le produit" required>
                      <br><br>
                      <label><b>Prix :</b></label>
                      <input type="text" name="Prix" class="form-control" placeholder="Entrer le prix" required>
                      <br><br>
                      <label><b>commentaire :</b></label>
                      <input type="text" name="commentaire" class="form-control" placeholder="Description" required>
                      <br><br>

                      <label><b>photo :</b></label>
                      <input type="file" name="photo" class="form-control" placeholder="choisir une image" required>
                      <br><br>
                      <input type="submit" name="btadd" value="Ajouter" class="btn btn-primary">

                  </form>

              </div>



          </div>

          <script src="./vendor/global/global.min.js"></script>
          <script src="./js/quixnav-init.js"></script>
          <script src="./js/custom.min.js"></script>

          <script src="./vendor/chartist/js/chartist.min.js"></script>

          <script src="./vendor/moment/moment.min.js"></script>
          <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


          <script src="./js/dashboard/dashboard-2.js"></script>


      </body>

      </html>