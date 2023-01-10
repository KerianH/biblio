<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Biblio-Drives</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
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

    <div class="row">
        <div class="col-sm-7">
            <form>
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="usr">Mail</label>
                        <input type="text" class="form-control" name="txtMel">
                    </div>
                    <div class="form-group">
                        <label for="usr">Mots De Passe</label>
                        <input type="text" class="form-control" name="txtMdp">
                    </div>
                    <div class="form-group">
                        <label for="usr">Nom</label>
                        <input type="text" class="form-control" name="txtNom">
                    </div>
                    <div class="form-group">
                        <label for="usr">Prenom</label>
                        <input type="text" class="form-control" name="txtPrenom">
                    </div>
                    <div class="form-group">
                        <label for="usr">Adresse</label>
                        <input type="text" class="form-control" name="txtAddress">
                    </div>
                    <div class="form-group">
                        <label for="usr">Ville</label>
                        <input type="text" class="form-control" name="txtVille">
                    </div>
                    <div class="form-group">
                        <label for="usr">Code Postal</label>
                        <input type="text" class="form-control" name="txtCodePostale">
                    </div>
                    <div class="input-group-prepend">
                        <button type="submit" class="btn">Créer un membre</button>
                    </div>
                </div>
            </form>
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
$CodePostale = $_POST["txtCodePostale"];
$profil = "Membre";

$stmt->bind_param(':mel', $email);
$stmt->bind_param(':motdepasse', $motDePasse);
$stmt->bind_param(':nom',$nom);
$stmt->bind_param(':prenom',$prenom);
$stmt->bind_param(':adresse',$address);
$stmt->bind_param(':ville',$ville);
$stmt->bind_param(':codepostale',$CodePostale);
$stmt->bind_param(':profil',$profil);
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
                        <input type="text" class="form-control" id="InputFormul" name="txtName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="InputFormul" name="txtPassword">
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