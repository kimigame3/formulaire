<?php

$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=partage_recette;charset=utf8',
    'root',
    'root'
);

if (
    (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_GET['message']) || empty($_GET['message']))
    )
{
	echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}

$email = $_POST['email'];
$message = $_POST['message'];

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0)
{
     // Testons si le fichier n'est pas trop gros
    if ($_FILES['screenshot']['size'] <= 1000000)
        {
             // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['screenshot']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions))
            {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
                echo "L'envoi a bien été effectué !";
            }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
<div>

    <?php include_once('header.php');?>)

    <h1>Message bien reçu !</h1>
    
    <div>
        <h5>Rappel de vos informations</h5>
        <p><b>Email</b> : <?php echo htmlspecialchars($_GET['email']); ?></p>
        <p><b>Message</b> : <?php echo htmlspecialchars($_GET['message']); ?></p>
    </div>
</div>

</body>
</html>