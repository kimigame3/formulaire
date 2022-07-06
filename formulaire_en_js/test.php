<?php

/*premier user
$userName1 = 'Mia Kalifa';
$userEmail1 = 'miakalifa@xxl.hub';
$userMdp = 'mia';
$userAge = 26;

//deuxieme user
$userName1 = 'Abella Danger';
$userEmail1 = 'abelladanger@xxl.hub';
$userMdp = 'abella';
$userAge = 24;*/

/*une autre façon d'écrire ce code dans un tableau 
$user1 = ['Mia kalifa', 'email', 'mia', 26];
echo $user1[0];//"Mia kalifa"
echo $user1[1];//"email"
echo $user1[3];//"26"*/

//Il est aussi possible de faire des tableaux de tableaux

$mia = ['Abella Danger', 'miakalifa@xxl.hub', 'mia', 26];
$abella = ['Mia Kalifa', 'abelladanger@xxl.hub', 'abella', 28];
$megan = ['Megan Rain', 'meganrain@xxl.hub', 'megan', 26];

$users = [$mia, $abella, $megan];

//echo $users[1][1]; //"miakalifa@xxl.hub"

//avec la boucle while

$lines = 3; //nombre d'utilisateurs dans le tableau
$counter = 0;

/*while ($counter < $lines)
{
    echo $users[$counter][0].' '.$users[$counter][1].'<br />';
    $counter++; //ne surtout pas publier la condition de sortie!
}*/

//avec la boucle for

/*for ($lines = 0; $lines <= 2; $lines++)
{
    echo $users[$lines][0].' '.$users[$lines][1].'<br />';
}*/


// retenir l'email de la personne connectée pendant 1 an
setcookie(
    'LOGGED_USER',
    'utilisateur@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);

?>
