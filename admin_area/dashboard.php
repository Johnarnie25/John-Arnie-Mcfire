<?php
include("../includes/db.php");
// Check if the admin is logged in
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    // Fetch earnings data from your database or wherever you store it
    // Assuming $earningsData is an array with earnings data
    $earningsData = [$count_total_earnings];
?>
<style>
body {
    background-color: #e8edf2;
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
  }
    </style>
<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<!-- <h1 class="page-header">Dashboard</h1> -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-primary"><!-- panel panel-primary Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-tasks fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_products; ?> </div>

<div>Products</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_products">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-green"><!-- panel panel-green Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-comments fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_customers; ?> </div>

<div>Customers</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_customers">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-shopping-cart fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_p_categories; ?> </div>

<div>Brands</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_p_cats">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-red"><!-- panel panel-red Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-support fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php echo $count_total_orders; ?> </div>

<div>Orders</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_orders">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-red Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


</div><!-- 2 row Ends -->

<div class="row">
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-info"><!-- panel panel-red Starts -->
        
        <div class="panel-heading"><!-- panel-heading Starts -->
        
        <div class="row"><!-- panel-heading row Starts -->
        
        <div class="col-xs-3"><!-- col-xs-3 Starts -->
        
        <i class="fa fa-money fa-5x"> </i>
        
        </div><!-- col-xs-3 Ends -->
        
        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
        
        <div class="huge"> <?php echo $count_total_earnings ?> </div>
        
        <div>PHP Earnings</div>
        
        </div><!-- col-xs-9 text-right Ends -->
        
        </div><!-- panel-heading row Ends -->
        
        </div><!-- panel-heading Ends -->
        
        <a href="index.php?view_orders">
        
        <div class="panel-footer"><!-- panel-footer Starts -->
        
        <span class="pull-left"> View Details </span>
        
        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
        
        <div class="clearfix"></div>
        
        </div><!-- panel-footer Ends -->
        
        </a>
        
        </div><!-- panel panel-red Ends -->
        
        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-warning"><!-- panel panel-red Starts -->
            
            <div class="panel-heading"><!-- panel-heading Starts -->
            
            <div class="row"><!-- panel-heading row Starts -->
            
            <div class="col-xs-3"><!-- col-xs-3 Starts -->
            
            <i class="fa fa-spinner fa-5x"> </i>
            
            </div><!-- col-xs-3 Ends -->
            
            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
            
            <div class="huge"> <?php echo $count_pending_orders ?> </div>
            
            <div>Pending Orders</div>
            
            </div><!-- col-xs-9 text-right Ends -->
            
            </div><!-- panel-heading row Ends -->
            
            </div><!-- panel-heading Ends -->
            
            <a href="index.php?view_orders">
            
            <div class="panel-footer"><!-- panel-footer Starts -->
            
            <span class="pull-left"> View Details </span>
            
            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
            
            <div class="clearfix"></div>
            
            </div><!-- panel-footer Ends -->
            
            </a>
            
            </div><!-- panel panel-red Ends -->
            
            </div><!-- col-lg-3 col-md-6 Ends -->



            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                <div class="panel panel-success"><!-- panel panel-red Starts -->
                
                <div class="panel-heading"><!-- panel-heading Starts -->
                
                <div class="row"><!-- panel-heading row Starts -->
                
                <div class="col-xs-3"><!-- col-xs-3 Starts -->
                
                <i class="fa fa-check fa-5x"> </i>
                
                </div><!-- col-xs-3 Ends -->
                
                <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                
                <div class="huge"> <?php echo $count_completed_orders ?> </div>
                
                <div>Completed Orders</div>
                
                </div><!-- col-xs-9 text-right Ends -->
                
                </div><!-- panel-heading row Ends -->
                
                </div><!-- panel-heading Ends -->
                
                <a href="index.php?view_orders">
                
                <div class="panel-footer"><!-- panel-footer Starts -->
                
                <span class="pull-left"> View Details </span>
                
                <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                
                <div class="clearfix"></div>
                
                </div><!-- panel-footer Ends -->
                
                </a>
                
                </div><!-- panel panel-red Ends -->
                
                </div><!-- col-lg-3 col-md-6 Ends -->



                <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                    <div class="panel panel-danger"><!-- panel panel-red Starts -->
                    
                    <div class="panel-heading"><!-- panel-heading Starts -->
                    
                    <div class="row"><!-- panel-heading row Starts -->
                    
                    <div class="col-xs-3"><!-- col-xs-3 Starts -->
                    
                    <i class="fa fa-percent fa-5x"> </i>
                    
                    </div><!-- col-xs-3 Ends -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
                    
                    <div class="huge"> <?php echo $count_coupons; ?> </div>
                    
                    <div>Total Coupons</div>
                    
                    </div><!-- col-xs-9 text-right Ends -->
                    
                    </div><!-- panel-heading row Ends -->
                    
                    </div><!-- panel-heading Ends -->
                    
                    <a href="index.php?view_orders">
                    
                    <div class="panel-footer"><!-- panel-footer Starts -->
                    
                    <span class="pull-left"> View Details </span>
                    
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    
                    <div class="clearfix"></div>
                    
                    </div><!-- panel-footer Ends -->
                    
                    </a>
                    
                    </div><!-- panel panel-red Ends -->
                    
                    </div><!-- col-lg-3 col-md-6 Ends -->
</div>

<center>
<div class="row"><!-- row Starts -->
<div class="col-lg-6"><!-- col-lg-6 Starts -->

    <div class="panel"><!-- panel Starts -->
        <div class="panel-heading"><!-- panel-heading Starts -->
            <h3 class="panel-title">
                Earnings Combo Chart
            </h3>
        </div><!-- panel-heading Ends -->
        <div class="panel-body"><!-- panel-body Starts -->
            <canvas id="comboChart"></canvas>
        </div><!-- panel-body Ends -->
    </div><!-- panel Ends -->
</div><!-- col-lg-6 Ends -->

</div><!-- row Ends -->

</div><!-- container Ends -->
</center>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Assuming $earningsData is an associative array with month names as keys
    var earningsData = <?php echo json_encode($earningsData); ?>;
    var allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Set a threshold for low sales and high sales
    var lowSalesThreshold = 100; // Adjust as needed
    var highSalesThreshold = 500; // Adjust as needed

    var chartData = {
        labels: allMonths,
        datasets: [
            {
                label: 'Earnings',
                data: Object.values(earningsData),
                type: 'bar',
                backgroundColor: function(context) {
                    // Determine the sales value for the current bar
                    var value = context.dataset.data[context.dataIndex];

                    // Set color based on sales
                    if (value < lowSalesThreshold) {
                        return 'rgba(255, 99, 132, 0.6)'; // Red for low sales
                    } else if (value >= lowSalesThreshold && value <= highSalesThreshold) {
                        return 'rgba(255, 255, 0, 0.6)'; // Yellow for moderate sales
                    } else {
                        return 'rgba(75, 192, 192, 0.6)'; // Green for high sales
                    }
                },
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Earnings (Line)',
                data: Object.values(earningsData),
                type: 'line',
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2
            }
        ]
    };

    var ctxCombo = document.getElementById('comboChart').getContext('2d');

    var comboChart = new Chart(ctxCombo, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                x: [{
                    position: 'bottom'
                }],
                y: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        boxWidth: 20,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    mode: 'index',
                    intersect: false,
                }
            },
            title: {
                display: true,
                text: 'Earnings Overview',
                fontSize: 16,
                fontStyle: 'bold'
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>

<?php
}
?>
