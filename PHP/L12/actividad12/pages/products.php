<?php
/* ***********************************
    ACTIVIDAD LECCION 12
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);



$productsToDisplay = $products;
$input = "";


// Function to search for products
function getSearchResults()
{
    $result = [];

    // Check if a search word or phrase has been input
    if (isset($_GET["search"]) && !empty($_GET["search"])) {
        $input = strtolower($_GET["search"]); // set input to lower case
        $GLOBALS["input"] = $input; //this will be displayed inside the searchbar 

        // if the search is empty, show all products:
        if (empty($input)) {
            $GLOBALS["productsToDisplay"] = $GLOBALS["products"];
        } else {
            foreach ($GLOBALS["productsToDisplay"] as $product) {
                //set title to lowercase and check if the input can be found
                if (str_contains(strtolower($product["title"]), $input)) {
                    array_push($result, $product);
                }
            }
            // set te results for display
            $GLOBALS["productsToDisplay"] = $result;
        }
    } else {
        // if no search then show all products
        $GLOBALS["productsToDisplay"] = $GLOBALS["products"];
    }
}

getSearchResults();

?>

<div class="container">
    <div class="row">
        <form action="" method="GET">
            <!-- Search bar for products -->
            <div class="row mb-5">
                <input type="text" name="search" value="<?= $input ?>" placeholder="Que buscas?" class="form-control " id="search">
                
                <?php if (!empty($GLOBALS["input"])) { ?>
                     <a href="./" class="btn btn-primary mt-3"> Clear </a>
                <?php } ?>
            
            </div>
        </form>

        <!-- Display of products -->
        <?php foreach ($productsToDisplay as $article) {
            require("modules/card.php");
        } ?>
    </div>
</div>