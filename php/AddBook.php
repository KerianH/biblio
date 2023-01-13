<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Biblio-Drives TEST GIT</title>
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
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <?php
require_once('connexion.php');
$stmt = $connexion->prepare("INSERT INTO auteur (nom, prenom) VALUES (:nom, :prenom)");
if(!isset($_POST['btnEnvoyer']))
{
    echo '<form method="post">
    <div class="container">
        <div class="form-group">
            <label for="FormBook">Auteur</label>
            <input type="text" class="form-control" name="txtAuteur">
        </div>
        <div class="form-group">
            <label for="FormBook">Titre</label>
            <input type="text" class="form-control" name="txtTitre">
        </div>
        <div class="form-group">
            <label for="FormBook">isbn13</label>
            <input type="text" class="form-control" name="txtIsbn">
        </div>
        <div class="form-group">
            <label for="FormBook">Année de parution</label>
            <input type="text" class="form-control" name="txtAnnee">
        </div>
        <div class="form-group">
            <label for="FormBook">Resumer</label>
            <textarea class="form-control" rows="5" name="txtResume"></textarea>
        </div>
        <div class="form-group">
            <label for="FormBook">Image</label>
            <input type="file" class="form-control-file border" name="file">
        </div>
        <div class="input-group-prepend">
            <button type="submit" name="btnEnvoyer" class="btn btn-outline-primary">Add book</button>
        </div>
    </div>
</form>';
}
else
{
  $nom = $_POST['txtNom']; 
  $prenom = $_POST["txtPrenom"];
  $stmt->bindValue(':nom',$nom);
    $stmt->bindValue(':prenom',$prenom);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, resume, dateajout, image) VALUES (:noauteur ,:titre, :isbn13, :anneeparution, :resume, :dateajout, :image)");
$titre = $_POST['txtTitre'];
$isbn13 = $_POST['txtIsbn'];
$anneeparution = $_POST['txtAnnee'];
$resume = $_POST['txtResume'];
$image = $_POST['image'];
$stmt->bindValue(':titre',$titre);
$stmt->bindValue(':isbn13',$isbn13);
$stmt->bindValue(':anneeparution',$anneeparution);
$stmt->bindValue(':resume',$resume);
$stmt->bindValue(':image',$image);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$NbLignes = $stmt->rowCount();
echo $NbLignes." ligne() insérée(s).<BR>";
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
                            <input type="password" class="form-control" id="LoginFormul" name="txtPassword">
                        </div>
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" id="BlueButton" type="submit">Se Connecter</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>