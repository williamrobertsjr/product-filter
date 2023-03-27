<?php 
// Part number should equal url query to set up remainder of variables and logic for sql queries
$PN = $_SERVER["QUERY_STRING"];
// Intial sql query to grab series for PN
$seriesQ = "SELECT series FROM master_product_data WHERE part=?";
$stmt = $conn->prepare($seriesQ);
$stmt->bind_param("s", $PN);
$stmt->execute();
$seriesResult = $stmt->get_result();

if ($seriesResult->num_rows > 0) {
    $series_row = $seriesResult->fetch_assoc();
    $seriesID = $series_row['series'];
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
    
    $stmt2 = $conn->prepare($sql);
    $stmt2->bind_param("s", $seriesID);
    $stmt2->execute();
    $result = $stmt2->get_result();
    $row2 = $result->fetch_assoc();
    $toolType = $row2['tool_type'];
    if ($result->num_rows > 0) {?>
      
     <table id="product-table"
        data-toggle="table" id="table"
        data-sortable="true"
        data-sort-reset="true"
        data-pagination="true"
        data-loading-template="loadingTemplate"
        data-page-size="10"
        class="table-striped table-sm table-title <?php echo $toolType . " " . $series;?>">
        <thead>
            <tr>
                <th data-sortable="true" data-sortReset="true">Part Number</th>
       <?php
        
       $rows = $result->fetch_assoc();
    //    $stock = $rows['qty_on_hand'];
       $tableCols = explode(",",$rows['data_fields']);
       foreach($tableCols as $value) {?>
            <th class="<?php echo $value; ?>" data-sortable="true"><?php echo $value; ?></th>
        <?php } ?>     
                <th>Stock</th>
                <th>List Price</th>
                <th>Customize</th>
            </tr>
            </thead>
            
        <?php 
        
        // If there are results (after a one time pass through the table head) while there are rows echo the rows below
        while ($rows = $result->fetch_assoc()) {

            // Variable Declarations
            $series = $rows["series"];
            $family = $rows["family"];
            $brand = $rows["brand"];
            $part = $rows["part"];
            $coat = $rows['coating'];
            $stock = number_format($rows['QTY_ON_HAND'],0);
            $price = $rows['LIST_PRICE'];
            ?>
            <tr>
                <td><a href="/product?<?php echo $part;?>"><?php echo $part; ?></a></td>
            <?php
            foreach ($tableCols as $value) {
                $val = $rows[$value];?>
                <td class="value"><?php echo $val;?></td>
            <?php }?>
                <td><?php echo $stock; ?></td>
                <td>$<?php echo $price; ?></td>
                <td><a class="button ms-button dark-blue modify-btn" href="https://www.gwstoolgroup.com/modify-a-stocked-tool/?EDP=<?php echo $part; ?>">Modify</a></td>
         </tr>     
       <?php }
    } else {
    echo "No Results";
    }?>
    </table>
<?php }
$conn->close();
?>

<!-- <script src="/wp-content/themes/storefront-child/products/product-helpers.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script defer src="/wp-content/themes/storefront-child/products/product-helpers.js"></script> -->