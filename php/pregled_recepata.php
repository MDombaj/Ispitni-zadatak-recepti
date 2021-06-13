<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 04.06.2021.
    Edited on: 10.06.2021.
#
#   Functionality:
#       Review of all recipies.
*/

//database connection
require('databaseConnection.php');

//function to create an array of all recipes
function allRecipes(){
    $querryResaultRecipes = $DB->querry('SELECT *
                            FROM `recipes`;');
    $recipes = array();
    while($recipe = $querryResaultRecipes->fetch_object()){
        $recipes[] = $recipe;
    }

    return $recipes;
}

//function to get information for specific recipe
function recipeById(){
    $recipe_id = $_GET['recipe_id']; // za pregled odredjenog recepta neophodno je proslediti id recepta pod nazivom promenljive recipe_id

    $querryResaultRecipeAndCategory = $DB->querry("SELECT 
                                                        `recipes`.id as recipe_id, /* Dodeljen naziv recipe_id radi lakseg razumevanja znacenja i funkcije u ostatku aplikacije*/
                                                        `recipes`.recipe_name,
                                                        `recipes`.food_image,
                                                        `recipes`.preparation,
                                                        `categories`.category_name
                                                    FROM `recipes` 
                                                        INNER JOIN `recipe_category` ON `recipe_category`.recipe_id = `recipes`.id
                                                        INNER JOIN `categories`ON `categories`.id = `recipe_category`.category_id
                                                    WHERE
                                                        `recipes`.id = $recipe_id;");
                                                        
    $recipeAndCategory = $querryResaultRecipeAndCategory->fetch_object();

    return $recipeAndCategory;
}
//function to get ingridient information for specific recipe. Note It is required to have bouth functions () called for full information on recipe.
function recipeIgridientsByRecipeId(){
    $recipe_id = $_GET['recipe_id']; // za pregled odredjenog recepta neophodno je proslediti id recepta pod nazivom promenljive recipe_id. Porebno je da bude isti ID kao za funkciju recipeById radi potpunih podataka.
    $querryResaultIngridientsAndAmounts = $DB-querry("SELECT 
                                                        `tags`.id AS ingridient_id, /* Dodeljen naziv ingridient_id radi lakseg razumevanja znacenja i funkcije u ostatku aplikacije */
                                                        `tags`.ingredient_name,
                                                        `recipe_tag`.ingridient_amount
                                                    FROM `recipes` 
                                                        INNER JOIN `recipe_tag` ON `recipe_tag`.recipe_id = `recipes`.id
                                                        INNER JOIN `tags`ON `tags`.id = `recipe_tag`.tag_id
                                                    WHERE
                                                        receptaplikacjaispit.`recipes`.id = $recipe_id;");
    
    $ingridientsAndAmounts = array();
    while($ingridientAndAmount = $querryResaultIngridientsAndAmounts->fetch_object()){
        $ingridientsAndAmounts[] = $ingridientAndAmount; 
    }

    return $ingridientsAndAmounts;
}

?>