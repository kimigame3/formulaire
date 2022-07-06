<?php

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

<?php include_once('header.php'); ?>
    <h1>Site de recettes</h1>

    <!-- inclusion des variables et fonctions -->
    <?php
        include_once('variables.php');
        include_once('fonctions.php');
    ?>

    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    
    <?php foreach(getRecipes($recipes) as $recipe) : ?>
        <article>
            <h3><?php echo $recipe['title']; ?></h3>
            <div><?php echo $recipe['recipe']; ?></div>
            <i><?php echo displayAuteur($recipe['auteur'], $users); ?></i>
        </article>
    <?php endforeach ?>
</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>

</body>
</html>