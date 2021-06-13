<?php
/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created on: 12.06.2021.
#
#   Functionality:
#       Deliting recipes and 
*/

//database connection
require('databaseConnection.php');

//Function for deleting recipe_tag entery
function deleteRecipeTag(){
    $recipeTagId = $_GET('recipeTag');

    $querryDeleteRecipeTag = $DB->querry("DELETE 
                                         FROM `recipe_tag`
                                         WHERE `recipe_tag`.id = $recipeTagId;");
}

//Function for deleting recipe_category entery
function deleteRecipeVategory(){
    $recipeCategoryId = $_GET('recipeCategory');

    $querryDeleteRecipeTag = $DB->querry("DELETE 
                                         FROM `recipe_category`
                                         WHERE `recipe_category`.id = $recipeCategoryId;");
}

//function for deleting recipes
function deleteRecipe(){
    $recipeId = $_GET("recipe");

    //deleting all relations with categories to keep integrity
    $querryDeleteAllRelationCategories = $DB->querry("DELETE
                                            FROM `recipe_category`
                                            WHERE `recipe_category`.recipe_id = $recipeId;");

    //deleting all relations with tags(ingridients) to keep integrity
    $querryDeleteAllRelationTags = $DB->querry("DELETE
                                             FROM `recipe_tag`
                                             WHERE `recipe_tag`.recipe_id = $recipeId;");

    //after deleting all relatios deleting recipe
    $querryDeleteRecipe = $DB->querry("DELETE
                                     FROM `recipe`
                                     WHERE `recipe`.id = $recipeId;"); 
}

?>