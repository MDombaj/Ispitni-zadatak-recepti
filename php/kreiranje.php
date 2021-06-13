<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 12.06.2021.
#
#   Functionality:
#       Creating recipes, categories and ingridienta(tags).
*/

//database connection
require('databaseConnection.php');

// Function for creating new ingridient(tag) in database
function createIngridient(){
    $ingridientName = $_GET('ingridentName');

    $querryCreateIngridient = $DB->querry("INSERT INTO `tags` (ingredient_name)
                                            VALUES ($ingridientName);");
}

//function for creating new category in database
function createCategory(){
    $categoryName = $_GET('categoryName');

    $querryCreateCategory = $DB->querry("INSERT INTO `categories` (category_name)
                                         VALUES ($categoryName);");
}

//function for creating a new recipe and connections with other tabels
function createRecipe(){
    $recipeName = $_GET('recipeName');
    $recipePreparation = $_GET('preparation');
    //Get image file

    $querryCreateRecipe = $DB->querry("INSERT INTO `recipes` (recipe_name, preparation)
                                      VALUES ($recipeName, $recipePreparation)"); //Add image file

}

//function for creating connections and filling recipe_tag tabel in database
function createConnectionRecipeIngridient(){
    $ingridient = $_GET('ingridient');
    $amount = $_GET('amount');
    $recipe = $_GET('recipe');

    $querryCreateConnectionRecipeIngridient = $DB->querry("INSERT INTO `recipe_tag` (recipe_id, tag_id, ingridient_amount)
                                                            VALUES ($recipe, $ingridient, $amount)");
}

//function for creating connections and filling recipe_category tabel in database
function createConnectionRecipeIngridient(){
    $category = $_GET('category');
    $recipe = $_GET('recipe');

    $querryCreateConnectionRecipeIngridient = $DB->querry("INSERT INTO `recipe_category` (recipe_id, category_id)
                                                            VALUES ($recipe, $category)");
}

?>