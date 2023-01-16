<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="./js/tarteaucitron/tarteaucitron.js"></script>
    <script>
    tarteaucitron.init({
        "privacyUrl": "",
        /* URL de la page de la politique de vie privée */
        "hashtag": "#tarteaucitron",
        /* Ouvrir le panneau contenant ce hashtag */
        "cookieName": "tarteaucitron",
        /* Nom du Cookie */
        "orientation": "middle",
        /* Position de la bannière (top - bottom) */
        "showAlertSmall": true,
        /* Voir la bannière réduite en bas à droite */
        "cookieslist": true,
        /* Voir la liste des cookies */
        "adblocker": false,
        /* Voir une alerte si un bloqueur de publicités est détecté */
        "AcceptAllCta": true,
        /* Voir le bouton accepter tout (quand highPrivacy est à true) */
        "highPrivacy": true,
        /* Désactiver le consentement automatique : OBLIGATOIRE DANS l'UE */
        "handleBrowserDNTRequest": false,
        /* Si la protection du suivi du navigateur est activée, tout interdire */
        "removeCredit": false,
        /* Retirer le lien vers tarteaucitron.js */
        "moreInfoLink": true,
        /* Afficher le lien "voir plus d'infos" */
        "useExternalCss": false,
        /* Si false, tarteaucitron.css sera chargé */
        //"cookieDomain": ".my-multisite-domaine.fr", /* Cookie multisite - cas où SOUS DOMAINE */
        "readmoreLink": "/cookiespolicy",
        /* Lien vers la page "Lire plus" A FAIRE OU PAS  */
    });
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
    </script>
    <title>Biblio-Drives</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.css" />
    <link rel="stylesheet" href="./bootstrap4/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-dark text-white">
    <div class="container">
        <h1>Bienvenue sur Biblio-Drive</h1>
    </div>


    <div class="row">
        <div class="col-sm-11">
            <!--Barre de recherche-->
            <form action="./php/lister_livre.php" method="get">
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





    <!--IMG-->
    <div class="row">
        <div class="col-sm-7">
            <h4 class="text-center">Dernières nouveauté</h4>
            <!--Carousel-->
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/L'etanger.jpg" alt="Etranger">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/notre-dame-de-paris-172.jpg" alt="Victor Hugo">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/La formule de Dieu.jpg" alt="SaintLouis">
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!--Formulaire connexion-->
        <form action="./php/login.php" method="post">
            <div class="col-sm-5">
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
            </div>
    </div>
    </form>
    <div class="youtube_player" videoID="PJCvmeRILLk" width="560" height="315" theme="light" rel="0" controls="1" showinfo="1" autoplay="0"></div>
</body>
<?php
$x = 10;
$_SESSION["y"] = 10;
?>
</html>