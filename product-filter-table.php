<?php 

$sql = "SELECT p.part, p.tool_type, p.series, p.family, p.brand, p.sub_type
        FROM `master_product_data` p
        WHERE tool_type = 'MILLING'
        LIMIT 250";

$result = $conn->query($sql);
if($result->num_rows > 0) {


?>
<table id="product-filter-table"
    data-toggle="table" id="product-filter-table"
    data-sortable="true"
    data-sort-reset="true"
    data-pagination="true"
    data-loading-template="loadingTemplate"
    data-page-size="10"
    class="table-striped table-sm">
    <thead>
        <th>Part Number</th>
        <th>Series</th>
        <th>Sub Type</th>
        <th>Brand</th>
    </thead>
<?php 
    while($rows = $result->fetch_assoc()) { 
        $part = $rows['part'];
        $series = $rows['series'];
        $family = $rows['family'];
        $sub_type = $rows['sub_type'];
?>
    <tr>
        <td><a href="/product?<?php echo $part;?>"><?php echo $part; ?></a></td>
        <td><?php echo $series; ?></td>
        <td><?php echo $sub_type; ?></td>
        <td><?php echo $family; ?></td>
    </tr>
    <?php }?>
    
</table>
<?php
} else {
    echo "No Results";
}
 $conn->close(); ?>
<script src="/wp-content/themes/storefront-child/products/product-helpers.js"></script>

