<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Biblio-Listes-Livres</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body class="bg-dark text-white">
<h1>Liste des livres</h1>
    <?php
require_once('conf/connexion.php');
$stmt = $connexion->prepare("SELECT * FROM livre where nom=:nom");
$nom = $_GET["txtRecherche"];
$stmt->bindValue(":nom", $nom); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $select->fetch())

{
  // Affichage des champs nom et prenom de la table 'utilisateur'
  echo '<h1>', $enregistrement->nom '</h1>';
}
?>


</body>
</html>

