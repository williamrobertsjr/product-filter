<?php 
// Template Name: Product Filter V2
get_header();


include 'db_connection.php';
// include 'filter_queries.php'; 
session_start();
?>

<!-- Bootstrap Table Stylesheets -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="/wp-content/themes/storefront-child/noUiSlider/nouislider.css">
<link rel="stylesheet" href="/wp-content/themes/storefront-child/products/product-style.css">
<link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

<section id="heading">
    <div>
        <h1>Product Filter</h1>
    </div>
</section>


<section id="filter-container">
<div class="filter-list">
    <div id="filter-options">
        <div id="tool-type-filters">   
            <form id="tool-type-form">
                <label for="tool-type">Tool Type</label>
                <select name="tool-type" id="tool-type">
                    <option value="default">Choose one</option>
                    <option value="milling" data-filter="milling">Milling</option>
                    <option value="holemaking" data-filter="holemaking">Holemaking</option>
                    <option value="threading" data-filter="threading">Threading</option>
                    <option value="specialty" data-filter="specialty">Specialty</option>
                    <option value="inserts" data-filter="inserts">Inserts</option>
                </select> 
                <!-- <input type="submit"> -->
            </form>
        </div>
        
        <div id="filtersHere">

        </div>
        <?php //include 'filter-content.php' ; ?>
    </div>
        
    </div>

    <div class="filter-table">
        <section id ="filter-results">
            <div id="filter-table-container">
                <!-- <h3>Search Results</h3> -->
                
                <?php
                // include('db_new.php');
                // include('product-filter-table.php');
                // include('inserts-table.php');
                
                ?>
                
            </div>     
            <div id="hello"></div>
        </section>
    </div>

</section>


<!-- Bootstrap Table Scripts -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script> -->
<!-- noUiSlider -->
<!-- <script src="/wp-content/themes/storefront-child/noUiSlider/nouislider.min.js" defer></script> -->    
<script src="/wp-content/themes/storefront-child/products/product-filter.js"></script>
<!-- <script src="/wp-content/themes/storefront-child/products/dimensions-filter-v1.5.js"></script> -->

<?php get_footer() ; ?>

