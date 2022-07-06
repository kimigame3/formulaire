<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_POST);

session_start();
$bdd = New PDO('mysql:host=localhost;dbname=formulaire;', 'root', 'root');
/*
if(isset($_POST['Valider']) && isset($_POST['users'])){
     $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
     $phone = $_POST["phone"];
     $email = $_POST["email"];
     $mdp = $_POST["mdp"];
     $condition = $_POST["condition"];
     $comment = $_POST["comment"];
    $message = "nouvelle préinscription à l'asso : ".$nom." ".$prenom." ".$phone." ".$email." ".$mdp." ".$condition." ".$comment;
}*/

    if(isset($_POST['Valider'])){
        if(!empty($_POST['nom']) && !empty($_POST['prenom'])  && !empty($_POST['phone'])  && !empty($_POST['email']) && !empty($_POST['mdp'])  && !empty($_POST['condition'])  && !empty($_POST['comment'])){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = sha1($_POST['mdp']);
            $condition = $_POST['condition'];
            $comment = htmlspecialchars($_POST['comment']);
            $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, phone, email, mdp, condition, comment)VALUES(?, ?, ?, ?, ?, ?, ?)');
            $insertUser->execute(array($nom, $prenom, $phone, $email, $mdp, $condition, $comment));

            var_dump($bdd->errorInfo());


            $recupUser = $bdd->prepare('SELECT * FROM users WHERE nom = ? AND prenom = ? AND phone = ? AND email = ? AND mdp = ? AND condition = ? AND comment = ?');
            $recupUser->execute(array($nom, $prenom, $phone, $email, $mdp, $condition, $comment));
            if($recupUser->rowCount() > 0){
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['phone'] = $phone;
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['condition'] = $condition;
                $_SESSION['comment'] = $comment;
                $_SESSION['id'] = $recupUser->fetch()['id'];
            }
    
            echo $_SESSION['id'];
    

        }else{
            echo "complétez les cases";
        }
        
        
    }
    
    /*$message = "nouvelle préinscription à l'asso : ".$nom." ".$prenom." ".$phone." ".$email." ".$mdp." ".$condition." ".$comment;

    if($message != " ") {
    mail("kimigame3@gmail.com","formulaire",$message);
    }*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <h1 align="center">
        Inscrivez vous..
    </h1>
    <form action="" method="POST" align="center">
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" autocomplete="off">
        </p>
        <p id="v1" class="red cache">
            le champ est vide...
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" autocomplete="off">
        </p>
        <p id="v2" class="red cache">
            le champ est vide...
        </p>
        <p>
            <label for="phone">Numéro de phone </label>
            <input type="tel" name="phone" min="0" max="9" id="phone" autocomplete="off">
        </p>
        <p id="v3" class="red cache">
            le champ est vide...
        </p>
        <p>
            <label for="email">E-mail </label>
            <input type="email" name="email" id="email" autocomplete="off">
        </p>
        <p id="v4" class="red cache">
            le champ est vide...
        </p>
        <p>
            <label for="mdp">mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </p>
        <p id="v6" class="red cache">
            le champ est vide...
        </p>
        <p>
            <label for="cdn">j'accepte les conditions d'utilisation</label>
            <input type="checkbox" name="condition" id="cdn">
        </p>
        <p id="v5" class="red cache">
            cochez pour valider
        </p>
        <p>
            <label for="comment">laissez un commentaire</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </p>
        <p id= "verif" class="red cache">
            le texte est invalide
        </p>
        <p>
            <input type="submit" name="Valider" id="Valider">
        </p>
      
    </form>

    <script src="script.js"></script>
</body>
</html>