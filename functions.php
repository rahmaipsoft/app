
<?php 

function get_recipes(array $recipes, int $limit) : array
{
    $valid_recipes = [];
    $counter = 0;

    foreach($recipes as $recipe) {
        if ($counter == $limit) {
            return $valid_recipes;
        }

        $valid_recipes[] = $recipe;
        $counter++;
    }

    return $valid_recipes;
}


?>