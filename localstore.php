<?php
session_start();

include_once "includes/db.php";
include_once "includes/header.php";
include_once "functions/functions.php";
include_once "includes/main.php";
?>
<style>
  body {
    background-color: #171b22;
    background: linear-gradient(to right, #121212, #171b22);
    text-align: center;
  }
</style>

<h2 style="color: #FFFFFF; font-size: 20px; font-weight: bold;">BRANCH</h2>

<div id="content"><!-- content Starts -->
  <div class="container-fluid"><!-- container Starts -->
    <div class="col-md-12"><!-- col-md-12 Starts -->
      <div class="services row"><!-- services row Starts -->
        <?php
        $get_services = "select * from services";
        $run_services = mysqli_query($con, $get_services);

        while ($row_services = mysqli_fetch_array($run_services)) {
          $service_id = $row_services['service_id'];
          $service_title = $row_services['service_title'];
          $service_image = $row_services['service_image'];
          $service_desc = $row_services['service_desc'];
          $service_button = $row_services['service_button'];
          $service_url = $row_services['service_url'];
        ?>
          <div class="col-md-4 col-sm-6 box"><!-- col-md-4 col-sm-6 box Starts -->
            <img src="admin_area/services_images/<?php echo $service_image; ?>" class="img-responsive" alt="Service Image">
            <h2><?php echo $service_title; ?></h2>
            <p><?php echo $service_desc; ?></p>
            <a href="<?php echo $service_url; ?>" class="btn btn-primary"><?php echo $service_button; ?></a>
          </div><!-- col-md-4 col-sm-6 box Ends -->
        <?php } ?>

        <?php
        $get_stores = "SELECT * FROM store";
        $run_stores = mysqli_query($con, $get_stores);

        while ($row_stores = mysqli_fetch_array($run_stores)) {
          $store_title = $row_stores['store_title'];
          $store_image = $row_stores['store_image'];
          $store_desc = $row_stores['store_desc'];
          $store_button = $row_stores['store_button'];
          $store_url = $row_stores['store_url'];
        ?>
          <div class="col-md-4 col-sm-6 box"><!-- col-md-4 col-sm-6 box Starts -->
            <div class="panel panel-primary"><!-- panel panel-primary Starts -->
              <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><?php echo $store_title; ?></h3>
              </div><!-- panel-heading Ends -->
              <div class="panel-body"><!-- panel-body Starts -->
                <img src="admin_area/store_images/<?php echo $store_image; ?>" class="img-responsive" style="width: 750px; height: 550px;" alt="Store Image">
                <br>
                <p><?php echo $store_desc; ?></p>
                <p>Branch URL: <a href="<?php echo $store_url; ?>" target="_blank"><?php echo $store_url; ?></a></p>
              </div><!-- panel-body Ends -->
              <div class="panel-footer"><!-- panel-footer Starts -->
                <div class="clearfix"></div>
              </div><!-- panel-footer Ends -->
            </div><!-- panel panel-primary Ends -->
          </div><!-- col-md-4 col-sm-6 box Ends -->
        <?php } ?>
      </div><!-- services row Ends -->
    </div><!-- col-md-12 Ends -->
  </div><!-- container Ends -->
</div><!-- content Ends -->

<?php
include_once "includes/footer.php";
?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


