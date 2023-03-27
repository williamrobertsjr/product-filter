<?php include('db_connection.php'); 

$sql = 'SELECT p.part, p.series, p.thickness, p.width, p.ic, p.radius_in_display, p.edge_prep, p.iso_code, stock_and_price.LIST_PRICE
FROM master_product_data p
LEFT JOIN stock_and_price 
ON p.part = stock_and_price.pn
WHERE p.tool_type="INSERTS"';

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc(); ?>
    <h3>Search Results</h3>
     <table id="product-table"
            data-toggle="table"
            data-sortable="true"
            data-sort-reset="true"
            data-pagination="true"
            data-undefined-text="-"
            data-page-size="10"
            class="table-striped table-sm table-title">
        <thead>
            <tr>
                <th data-sortable="true" data-sortReset="true">Part</th>
                <th data-sortable="true" data-sortReset="true">Series</th>
                <th data-sortable="true" data-sortReset="true">Thickness</th>
                <th data-sortable="true" data-sortReset="true">Width</th>
                <th data-sortable="true" data-sortReset="true">IC</th>
                <th data-sortable="true" data-sortReset="true">Radius</th>
                <th data-sortable="true" data-sortReset="true">Edge Prep</th>
                <th data-sortable="true" data-sortReset="true">ISO Code</th>
                <th>List Price</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) {
            $part = $row['part'];
            $series = $row['series'];
            $thickness = $row['thickness'];
            $width = $row['width'];
            $ic = $row['ic'];
            $radius = $row['radius_in_display'];
            $edge_prep = $row['edge_prep'];
            $iso = $row['iso_code'];
            $price = $row['LIST_PRICE'];
        ?>
            <tr>
                <td><a href="/product?<?php echo $part;?>"><?php echo $part; ?></a></td> 
                <td><a href="/product_series/series-<?php echo $series;?>"><?php echo $series; ?></a></td>
                <td><?php echo $thickness; ?></td>
                <td><?php echo $width; ?></td>
                <td><?php echo $ic; ?></td>
                <td><?php echo $radius; ?></td>
                <td><?php echo $edge_prep; ?></td>
                <td><?php echo $iso; ?></td>
                <td>$<?php echo $price; ?></td>
            </tr>
            
        <?php } ?>
        
        </tbody>
    </table>
<?php } ?>