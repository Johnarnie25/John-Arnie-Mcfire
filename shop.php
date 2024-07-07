<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

// Check if search query is submitted
$search_query = '';
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

?>

<!-- HTML structure -->
<div id="content">
    <div class="container">
        <div class="col-md-12"></div>
        <div class="col-md-3">
            <?php include("includes/sidebar.php"); ?>
        </div>
        <div class="col-md-9">
            <!-- Search form -->
            <form action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products..." name="search" value="<?php echo $search_query; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                    </span>
                </div>
            </form>

            <!-- Display products -->
            <div id="Products" class="row">
                <?php
                // Check if search query is provided
                if (!empty($search_query)) {
                    // Display filtered products based on search query
                    $product_count = filterProducts($search_query);
                    if ($product_count === 0) {
                        echo "<div id='no-products' class='col-md-12'><div class='alert alert-warning'>No products found.</div></div>";
                    }
                } else {
                    // Display all products
                    getProducts();
                }
                ?>
                <!-- Pagination -->
                <div class="col-xs-12">
                    <center>
                        <ul class="pagination">
                            <?php getPaginator(); ?>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    // Add your JavaScript/jQuery code here
</script>

</body>
</html>

<?php
// Function to filter products based on search query
function filterProducts($search_query)
{
    global $db;
    // Perform the search query on the database
    $query = "SELECT * FROM products WHERE product_title LIKE '%$search_query%'";
    $result = mysqli_query($db, $query);
    // Display the filtered products
    $counter = 0; // Counter to limit the number of products per page
    while ($row_products = mysqli_fetch_array($result)) {
        if ($counter < 6) {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            // Display product information
            echo "
            <div class='col-md-4 col-sm-6'>
                <div class='product'>
                    <a href='$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <hr>
                        <h3><a href='$pro_id'>$pro_title</a></h3>
                        <p class='price'>₱$pro_price</p>
                        <p class='buttons'>
                            <a href='$pro_id' class='btn btn-default'>View details</a>
                            <a href='$pro_id' class='btn btn-danger'>
                                <i class='fa fa-shopping-cart' data-price='$pro_price'></i> Add To Cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>";
            $counter++;
        }
    }
    return $counter;
}
?>










