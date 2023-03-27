<?php 
// Template Name: Single Product Page
get_header();
include('db_connection.php'); 
?>
<link rel="stylesheet" href="/wp-content/themes/storefront-child/products/product-style.css">
<!-- Bootstrap Table Stylesheets -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<section id="product-info-container">
    <?php include('single-product.php'); ?>
</section>

<section>
    <h2 class="<?php echo $toolType . ' ' . $series;?>">Series <?php echo $series; ?> Offering</h2>
    <hr>
    <!-- <table 
        data-toggle="table" id="table"
        data-sortable="true"
        data-pagination="true"
        data-loading-template="loadingTemplate"
        data-page-size="10"
        class="table-striped table-sm">
        <thead>
            <tr>
                <th data-sortable="true">Part Number</th>
                <th data-sortable="true">Series</th>
                <th data-sortable="true">Family</th>
                <th data-sortable="true">Brand</th>
                <th>Coating</th>
            </tr>
        </thead> -->
        
        <?php include('single-product-table.php'); ?>
        
        
</section>

<!-- Bootstrap Table Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script defer src="/wp-content/themes/storefront-child/products/product-helpers.js"></script>



<?php 

get_footer() ; ?>
