/*
# Created by: Gregor Stojanovic (Tikky-Dev)
#   Created: 04.06.2021.
#
#   Functionality:
#      Querry for searching all ingridient (tag) data from database for selected recipe.
*/
SELECT 
	receptaplikacjaispit.`tags`.id AS ingridient_id, /* Dodeljen naziv ingridient_id radi lakseg razumevanja znacenja i funkcije u ostatku aplikacije */
	receptaplikacjaispit.`tags`.ingredient_name,
    receptaplikacjaispit.`recipe_tag`.ingridient_amount
FROM receptaplikacjaispit.`recipes` 
	INNER JOIN receptaplikacjaispit.`recipe_tag` ON receptaplikacjaispit.`recipe_tag`.recipe_id = receptaplikacjaispit.`recipes`.id
	INNER JOIN receptaplikacjaispit.`tags`ON receptaplikacjaispit.`tags`.id = receptaplikacjaispit.`recipe_tag`.tag_id
WHERE
	receptaplikacjaispit.`recipes`.id = 1; /* ID = 1 je ovde unet kao primer i koriscen je za proveru ispravnosti koda. Treba promeniti u dinaminu promenljivu u implementaci ovog query-ja u aplikaciji */