<html>
<body>
<?php
require_once('conf/connexion.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST["txtName"];
    $password = $_POST["txtPassword"];

    $select = $connexion->query("SELECT * FROM utilisateur WHERE nom = $username, motdepasse = $password");
    $select->bindParam("username",$username, PDO::PARAM_STR);
    $select->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!result) {
        echo '<p class="error"> Username ou password incorect</p>'
    } 
    else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
              echo '<p class="success">Connexion réussie</p>';
        } else {
            echo '<p class="error">Username ou password incorect</p>'
        }
    }
}
?>
</body>
</html>