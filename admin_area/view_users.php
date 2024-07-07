<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Users

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Users

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>User Name</th>

<th>Email</th>

<th>Image</th>

<th>Country</th>

<th>Job</th>

<th>Delete</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_admin = "select * from admins";

$run_admin = mysqli_query($con,$get_admin);

while($row_admin = mysqli_fetch_array($run_admin)){

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_country'];

$admin_job = $row_admin['admin_job'];





?>

<tr>

<td><?php echo $admin_name; ?></td>

<td><?php echo $admin_email; ?></td>

<td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60" ></td>

<td><?php echo $admin_country; ?></td>

<td><?php echo $admin_job; ?></td>

<td>

<a href="#" onclick="confirmDelete(<?php echo $admin_id; ?>)" class="btn btn-danger">
        <i class="fa fa-trash-o"></i> Delete
    </a>

</td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>
<script>
function confirmDelete(adminId) {
    if (confirm('Are you sure you want to delete this user?')) {
        // AJAX request to delete user
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Reload the page or update the list dynamically without reloading
                // For simplicity, let's reload the page in this example
                location.reload();
            }
        };
        xhttp.open("GET", "delete_user.php?admin_id=" + adminId, true);
        xhttp.send();
    }
}
</script>
