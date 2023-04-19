<?php 
// Template Name: Product Filter V2
get_header();

// include 'filter_queries.php'; 
session_start();
include 'db_connection.php';
// include ('filter_queries.php'); 
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
                    <?php include('filter-tool-select.php');?>
                </div>
            
                <div id="sub-form-container"></div>

                <div id="dimensions-container"></div>
            
            </div> 
        </div>
    <?php //get_template_part('template-parts/filter', 'tool'); ?>
    
    <div class="filter-table">
        <section id ="filter-results">
            <div id="filter-table-container"></div>     
            <div id="hello"></div>
        </section>
    </div>

</section>


<script src="/wp-content/themes/storefront-child/products/product-filter.js"></script>


<?php get_footer() ; ?>

