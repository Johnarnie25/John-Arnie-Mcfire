
<?php
$aMan  = array();

$aPCat = array();

$aCat  = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aMan[(int)$sVal] = (int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aPCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Categories Code Ends ///


?>

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

Brands

<div class="pull-right"><!-- pull-right Starts -->

<a href="#" style="color:black;">

<span class="nav-toggle hide-show">

Hide

</span>

</a>

</div><!-- pull-right Ends -->

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data starts -->

<div class="panel-body"><!-- panel-body Starts -->



</div><!-- panel-body Ends -->

<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

<ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu Starts -->

<?php
/// Manufacturers Code Starts ///
$get_manufacturers = "SELECT * FROM manufacturers";
$run_manufacturers = mysqli_query($con, $get_manufacturers);

while ($row_manufacturer = mysqli_fetch_array($run_manufacturers)) {
    $manufacturer_id = $row_manufacturer['manufacturer_id'];
    $manufacturer_title = $row_manufacturer['manufacturer_title'];
    $manufacturer_image = $row_manufacturer['manufacturer_image'];

    if ($manufacturer_image != "") {
        $image_path = "admin_area/other_images/$manufacturer_image";
    
        // Set the desired width and height
        $desired_width = 30;
        $desired_height = 10;
    
        // Insert the image with specified width and height attributes
        $manufacturer_image = "<img src='$image_path' width='$desired_width' height='$desired_height'>&nbsp;";
    }
    

    echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
        <a>
            <label>
                <input type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                <span>
                    $manufacturer_image
                    $manufacturer_title
                </span>
            </label>
        </a>
    </li>";
}
/// Manufacturers Code Ends ///

?>

</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

</div><!-- panel-body scroll-menu Ends -->

</div><!-- panel-collapse collapse-data Ends -->


</div><!-- panel panel-default sidebar-menu Ends -->


<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

Accesories

<div class="pull-right"><!-- pull-right Starts -->

<a href="#" style="color:black;">

<span class="nav-toggle hide-show">

Hide

</span>

</a>

</div><!-- pull-right Ends -->

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

<div class="panel-body"><!-- panel-body Starts -->



</div><!-- panel-body Ends -->

<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

<ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

<?php

/// Products Categories Code Starts ///
$get_p_cats = "SELECT * FROM product_categories";
$run_p_cats = mysqli_query($con, $get_p_cats);

while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
    $p_cat_id = $row_p_cats['p_cat_id'];
    $p_cat_title = $row_p_cats['p_cat_title'];
    $p_cat_image = $row_p_cats['p_cat_image'];

    if ($p_cat_image != "") {
        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='30'> &nbsp;";
    }

    echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
        <a>
            <label>
                <input type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat'>
                <span>
                    $p_cat_image
                    $p_cat_title
                </span>
            </label>
        </a>
    </li>";
}
/// Products Categories Code Ends ///
?>

</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

</div><!-- panel-body scroll-menu Ends -->

</div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->



<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

Nic / MG

<div class="pull-right"><!-- pull-right Starts -->

<a href="#" style="color:black;">

<span class="nav-toggle hide-show">

Hide

</span>

</a>

</div><!-- pull-right Ends -->


</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

<div class="panel-body"><!-- panel-body Starts -->



</div><!-- panel-body Ends -->

<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

<ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

<?php

/// Categories Code Starts ///
$get_cats = "SELECT * FROM categories";
$run_cats = mysqli_query($con, $get_cats);

while ($row_cat = mysqli_fetch_array($run_cats)) {
    $cat_id = $row_cat['cat_id'];
    $cat_title = $row_cat['cat_title'];
    $cat_image = $row_cat['cat_image'];

    if ($cat_image != "") {
        $cat_image = "<img src='admin_area/other_images/$cat_image' width='40'>&nbsp;";
    }

    echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
        <a>
            <label>
                <input type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'>
                <span>
                    $cat_image
                    $cat_title
                </span>
            </label>
        </a>
    </li>";
}


?>

</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

</div><!-- panel-body scroll-menu Ends -->

</div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->

<script>
$(document).ready(function(){

    /// Search Filters code Starts ///
    $(function(){
        $.fn.extend({
            filterTable: function(){
                return this.each(function(){
                    $(this).on('keyup', function(){
                        // ... (existing code)
                    });
                });
            }
        });

        $('[data-action="filter"][id="dev-table-filter"]').filterTable();
    });
    /// Search Filters code Ends ///

    // Function to get products based on selected checkboxes
    function getFilteredProducts() {
        var sPath = '';

        // Manufacturers
        var aManInputs = $('li').find('.get_manufacturer');
        var aManKeys = getCheckedValues(aManInputs, 'man');

        // Products Categories
        var aPCatInputs = $('li').find('.get_p_cat');
        var aPCatKeys = getCheckedValues(aPCatInputs, 'p_cat');

        // Categories
        var aCatInputs = $('li').find('.get_cat');
        var aCatKeys = getCheckedValues(aCatInputs, 'cat');

        // Combine selected checkboxes into the search path
        sPath = aManKeys.concat(aPCatKeys, aCatKeys).join('&');

        // Loader Code Starts
        $('#wait').html('<img src="images/load.gif">');

        // ajax Code Starts
        $.ajax({
            url: "load.php",
            method: "POST",
            data: sPath + '&sAction=getProducts',
            success: function(data) {
                $('#Products').html('');
                $('#Products').html(data);
                $("#wait").empty();
            }
        });

        $.ajax({
            url: "load.php",
            method: "POST",
            data: sPath + '&sAction=getPaginator',
            success: function(data) {
                $('.pagination').html('');
                $('.pagination').html(data);
            }
        });
        // ajax Code Ends
    }

    // Function to get checked values from checkboxes
    function getCheckedValues(inputs, paramName) {
        var keys = [];
        $.each(inputs, function(key, oInput) {
            if (oInput.checked) {
                keys.push(paramName + '[]=' + oInput.value);
            }
        });
        return keys;
    }

    // Checkbox click events
    $('.get_manufacturer, .get_p_cat, .get_cat').click(function() {
        getFilteredProducts();
    });

});
</script>