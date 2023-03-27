<link rel="stylesheet" href="/wp-content/themes/storefront-child/products/product-style.css">
<!-- Bootstrap Table Stylesheets -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php 
// Template used for product tables on series pages
// Intial sql query to grab series for PN

if ($seriesID == '500') {
    $sql = "SELECT p.part, p.catalog, p.diasize, p.diadec, p.loc_in_display, p.oal_in_display, p.shank_dia_in_display, stock_and_price.LIST_PRICE, stock_and_price.QTY_ON_HAND, master_series_data.series, master_series_data.data_fields
            FROM master_product_data p
            LEFT JOIN master_series_data ON p.series = master_series_data.series
            LEFT JOIN stock_and_price ON p.part = stock_and_price.pn
            WHERE p.catalog = 'Y'
            AND p.series =?";
} else {
    $sql = "SELECT master_product_data.*, master_series_data.series, master_series_data.data_fields, stock_and_price.pn, stock_and_price.LIST_PRICE, stock_and_price.QTY_ON_HAND
            FROM master_product_data
            LEFT JOIN master_series_data ON master_product_data.series = master_series_data.series
            LEFT JOIN stock_and_price ON master_product_data.part = stock_and_price.pn
            -- WHERE master_product_data.catalog = 'Y'
            WHERE master_product_data.series=?";
}

// COMMENTING THIS OUT FOR THE TIME BEING - SERIES 294 WASN'T SHOWING ALL ITEMS SO I USED THE QUERIES ABOVE TO SHOW ALL AND ONLY ON SERIES 500 USE THE WHERE P.CATALOG='Y'
// $sql =  "SELECT master_product_data.*, master_series_data.series, master_series_data.data_fields, stock_and_price.pn, stock_and_price.LIST_PRICE, stock_and_price.QTY_ON_HAND
// FROM master_product_data
// LEFT JOIN master_series_data ON master_product_data.series = master_series_data.series
// LEFT JOIN stock_and_price ON master_product_data.part = stock_and_price.pn
// WHERE master_product_data.catalog = 'Y'
// AND master_product_data.series=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $seriesNum);
$stmt->execute();
$result = $stmt->get_result();
$row2 = $result->fetch_assoc();
$toolType = $row2['tool_type'];
$series = $row2['series'];

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();
    ?>
    <table id="product-table"
    data-toggle="table" id="table"
    data-sortable="true"
    data-sort-reset="true"
    data-pagination="true"
    data-loading-template="loadingTemplate"
    data-undefined-text="-"
    data-page-size="10"
    class="table-striped table-sm table-title <?php echo $toolType . " " . $series; ?>">
    <thead>
        <tr>
            <th data-sortable="true" data-sortReset="true">Part Number</th>
        <?php 
        $colHeadings = explode(",",$row['data_fields']);

        foreach($colHeadings as $heading) {?>
            <th data-sortable="true" data-sortReset="true" class="<?php echo $heading;?>"><?php echo $heading; ?></th> 
        <?php } ?>
            <th>Stock</th>
            <th>List Price</th>
        </tr>
    </thead>
    <tbody><?php 
    while($row = $result->fetch_assoc()) {
        // Variable Declarations
        $part = $row['part'];
        $series = $row["series"];
        $family = $row["family"];
        $brand = $row["brand"];
        $part = $row["part"];
        $coat = $row['coating'];
        $stock = number_format($row['QTY_ON_HAND'],0);
        $price = $row['LIST_PRICE'];
        ?>
        <tr>
            <td><a href="/product?<?php echo $part;?>"><?php echo $part; ?></a></td> 
        <?php foreach($colHeadings as $dataVal) {
            $val = $row[$dataVal];?>
            <td><?php echo $val ; ?></td>
        <?php } ?>
            <td><?php echo $stock; ?></td>
            <td>$<?php echo $price; ?></td>


        </tr>
    <?php } ?>
  
    </tbody>
    <?php ?> </table>
    <?php
}


?>
<!-- Bootstrap Table Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>

<!-- <script src="/wp-content/themes/storefront-child/js/product-table.js"></script> -->
