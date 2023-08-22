<?php

// Paramètres de connection à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomDeLaBase = "Boxe";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomDeLaBase);

// Vérification de la connection
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}
?>



<?php
define('HOST', 'localhost');
define('DB_NAME', 'Boxe');
define('USER', 'root');
define('PASS', '');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Tu est maintenant connecter';
} catch (PDOException $e) {
    echo $e;
    
}
?>

<!-- // Formulaire de connection -->
<form method="post">
    <input type="text" name="Identifiant" placeholder="Nom de l'utilisateur" required><br>
    <input type="password" name="Password" placeholder="Mot de passe" required><br>
    <input type="submit" name="Connection" id="Connection" value="Connection">
</form>

<?php
    if(isset($_PSOT['Connection'])){

    }
?>


<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomDeLaBase = "boxe";

// Connexion à la base de données. BDD
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomDeLaBase);

if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}

// Données de l'utilisateur à insérer
$nom = "Nom de l'utilisateur";
// Hash du mot de passe (Sécurité)
$motDePasse = password_hash("mot_de_passe", PASSWORD_DEFAULT); 

// Requête pour l'ajout d'utilisateur
$sql = "INSERT INTO utilisateurs (nom, mot_de_passe) VALUES (?, ?,)";
$requete = $connexion->prepare($sql);
if ($requete) {
    // Liaison des paramètres et exécution de la requête
    $requete->bind_param("sss", $nom, $email, $motDePasse);

    if ($requete->execute()) {
        echo "Utilisateur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $requete->error;
    }

    // Fermeture de la requête préparée
    $requete->close();
} else {
    echo "Erreur de préparation de la requête : " . $connexion->error;
}

// Fermeture de la connexion
$connexion->close();
?>
