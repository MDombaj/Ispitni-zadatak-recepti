/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created: 04.06.2021.
#
#   Functionality:
#      Querry for searching and selecting all nessery data from database for recipe and category of that recipe.
*/
SELECT 
	receptaplikacjaispit.`recipes`.id as recipe_id, /* Dodeljen naziv recipe_id radi lakseg razumevanja znacenja i funkcije u ostatku aplikacije*/
    receptaplikacjaispit.`recipes`.recipe_name,
    receptaplikacjaispit.`recipes`.food_image,
    receptaplikacjaispit.`recipes`.preparation,
    receptaplikacjaispit.`categories`.category_name
FROM receptaplikacjaispit.`recipes` 
	INNER JOIN receptaplikacjaispit.`recipe_category` ON receptaplikacjaispit.`recipe_category`.recipe_id = receptaplikacjaispit.`recipes`.id
	INNER JOIN receptaplikacjaispit.`categories`ON receptaplikacjaispit.`categories`.id = receptaplikacjaispit.`recipe_category`.category_id
WHERE
	receptaplikacjaispit.`recipes`.id = 1; /* ID = 1 je ovde unet kao primer i koriscen je za proveru ispravnosti koda. Treba promeniti u dinaminu promenljivu u implementaci ovog query-ja u aplikaciji*/