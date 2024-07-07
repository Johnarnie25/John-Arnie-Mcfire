<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>




<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / View Branch

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> View Branch

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<?php

$get_store = "select * from store";

$run_store = mysqli_query($con,$get_store);

while($row_store = mysqli_fetch_array($run_store)){

$store_id = $row_store['store_id'];

$store_title = $row_store['store_title'];

$store_image = $row_store['store_image'];

$store_desc = substr($row_store['store_desc'],0,400);

$store_button = $row_store['store_button'];

$store_url = $row_store['store_url'];


?>

<div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 Starts -->

<div class="panel panel-primary"><!-- panel panel-primary Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title" align="center">

<?php echo $store_title; ?>

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<img src="store_images/<?php echo $store_image; ?>" class="img-responsive" style="width: 450px; height: 450px;">

<br>

<p><?php echo $store_desc; ?></p>

</div><!-- panel-body Ends -->

<div class="panel-footer"><!-- panel-footer Starts -->

<a href="#" onclick="confirmDelete(<?php echo $store_id; ?>)" class="btn btn-danger">
        <i class="fa fa-trash-o"></i> Delete
    </a>

<a href="index.php?edit_store=<?php echo $store_id; ?>" class="btn btn-success">
        <i class="fa fa-pencil"></i> Edit
</a>

<div class="clearfix"> </div>

</div><!-- panel-footer Ends -->

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-4 col-md-4 Ends -->

<?php } ?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>
<script>
function confirmDelete(storeId) {
    if (confirm('Are you sure you want to delete this Branch?')) {
        // AJAX request to delete size
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Reload the page or update the list dynamically without reloading
                // For simplicity, let's reload the page in this example
                location.reload();
            }
        };
        xhttp.open("GET", "delete_store.php?store_id=" + storeId, true);
        xhttp.send();
    }
}
</script>
