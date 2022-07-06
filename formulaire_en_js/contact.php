<?php
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=partage_recette;charset=utf8',
    'root',
    'root'
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<form action="submit_contact.php" method="GET" align="center" enctype="multipart/form-data">
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" autocomplete="off">
        </p>
        <p>
            <label for="email">E-mail </label>
            <input type="email" name="email" id="email" autocomplete="off">
        </p>
        <p>
            <label for="message">Ecrivez votre message</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </p>
        <p id= "verif" class="red cache">
            le texte est invalide
        </p>
        <p>
            <label for="screenshot" class="form-label">Votre capture d'écran</label>
            <input type="file" class="form-control" id="screenshot" name="screenshot">
        </p>
        <p>
            <input type="submit" name="Valider" id="Valider">
        </p>
</form>

</body>
</html>