<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Biblio-Drives   TEST GIT</title>
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
            <form method="POST">
                <div class="container">
                    <div class="form-group">
                        <label for="FormMembre">Mail</label>
                        <input type="text" class="form-control" name="txtMel">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Mots De Passe</label>
                        <input type="text" class="form-control" name="txtMdp">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Nom</label>
                        <input type="text" class="form-control" name="txtNom">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Prenom</label>
                        <input type="text" class="form-control" name="txtPrenom">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Adresse</label>
                        <input type="text" class="form-control" name="txtAddress">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Ville</label>
                        <input type="text" class="form-control" name="txtVille">
                    </div>
                    <div class="form-group">
                        <label for="FormMembre">Code Postal</label>
                        <input type="text" class="form-control" name="txtCodePostal">
                    </div>
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-outline-primary">Créer un membre</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
        <?php
require_once('connexion.php');
$stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, :profil)");

$email = $_POST["txtMel"];
$motDePasse = $_POST["txtMdp"];
$nom = $_POST["txtNom"];
$prenom = $_POST["txtPrenom"];
$address = $_POST["txtAddress"];
$ville = $_POST["txtVille"];
$CodePostale = $_POST["txtCodePostal"];
$profil = "Membre";

var_dump($_POST);


$stmt->bindValue(':mel', $email);
$stmt->bindValue(':motdepasse', $motDePasse);
$stmt->bindValue(':nom',$nom);
$stmt->bindValue(':prenom',$prenom);
$stmt->bindValue(':adresse',$address);
$stmt->bindValue(':ville',$ville);
$stmt->bindValue(':codepostal',$CodePostale);
$stmt->bindValue(':profil',$profil);

$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$NbLignes = $stmt->rowCount();
echo $NbLignes." ligne() insérée(s).<BR>";
?>
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
</body>
</html>