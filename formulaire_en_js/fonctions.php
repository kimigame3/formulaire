<?php

function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function displayAuteur(string $auteurEmail, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $auteur = $users[$i];
        if ($auteurEmail === $auteur['email']) {
            return $auteur['full_name'] . '(' . $auteur['age'] . ' ans)';
        }
    }
}

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}