<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Biblio-Listes-Livres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-dark text-white">
    <div class="row">
        <div class="col-sm-11">
            <!--Barre de recherche-->
            <form action="lister_livre.php" method="get">
                <div class="container pt-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="submit" id="RButton">Search</button>
                        </div>
                        <input type="txt" class="form-control" name="txtRecherche" id="RechercheBarre"
                            placeholder="Rechercher un livre (titre, nom d'auteur) ">
                    </div>
                </div>
            </form>
        </div>
        <!--Panier-->
        <div class="col-sm-1">
            <a class="btn btn-outline-warning">Panier</a>
        </div>
    </div>

    <h1 class="text-center">Liste des livres</h1>
    <div class="row">
        <div class="col-sm-7">
            <?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT * from livre, auteur where livre.noauteur = auteur.noauteur and nom like :nom;");
$nom = $_GET["txtRecherche"];
$stmt->bindValue(":nom", $nom); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $stmt->fetch())

{
  echo "<a class='text-center' action='detail.php' href='http://127.0.0.1/Biblio/php/detail.php?nolivre=".$enregistrement->nolivre."'>".$enregistrement->titre,  $enregistrement->anneeparution.'</a><BR>';
}
?>
        </div>

        <!--Formulaire connexion-->
        <div class="col-sm-5">
            <form action="./php/login.php" method="post">

                <div class="container-fluid">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" id="LoginFormul" name="txtName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="LoginFormul" name="txtPassword">
                    </div>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" id="BlueButton" type="submit">Se Connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>