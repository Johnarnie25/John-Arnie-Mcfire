<?php
include("includes/db.php");
include("functions/functions.php");

$searchTerm = mysqli_real_escape_string($db, $_POST['search_term']);

$query = "SELECT * FROM products WHERE product_title LIKE '%$searchTerm%'";
$run_query = mysqli_query($db, $query);

if (mysqli_num_rows($run_query) > 0) {
    while ($row_products = mysqli_fetch_array($run_query)) {
        // Output product HTML markup
        // You can reuse the HTML markup used in getProducts() function
        echo "<div class='col-md-4 col-sm-6 single'>";
        echo "<div class='product'>";
        // Output product details here
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No products found";
}
?>

