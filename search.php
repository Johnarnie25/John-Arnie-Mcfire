<?php
include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['search'])) {
  $search = $_GET['search'];
  // Perform a database query to fetch products based on the search query
  $query = "SELECT * FROM products WHERE product_title LIKE '%$search%'";
  $run_query = mysqli_query($con, $query);
  
  if(mysqli_num_rows($run_query) > 0) {
    // Display the filtered products
    while($row = mysqli_fetch_array($run_query)) {
      echo "<div class='product'>"; // Example product display
      echo "<h3>" . $row['product_title'] . "</h3>";
      // Display other product details as needed
      echo "</div>";
    }
  } else {
    echo "<p>No products found</p>";
  }
}
?>
