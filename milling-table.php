<?php 
session_start();
include 'db_connection.php'; 

$millSub = $_SESSION['milling-sub-categories'];
$millDia = $_POST['milling-dia'];
$locMin = $_POST['milling-loc-min'];
$locMax = $_POST['milling-loc-max'];
$oalMin = $_POST['milling-oal-min'];
$oalMax = $_POST['milling-oal-max'];
$radMin = $_POST['milling-radius-min'];
$radMax = $_POST['milling-radius-max'];
$flutes = $_POST['milling-flutes'];
$coating = $_POST['milling-coating'];




$sql = 'SELECT p.part, p.series, p.family, p.cut_dia_in_display, p.loc_in_display, p.oal_in_display, p.radius_in_display, p.flutes, p.coating, stock_and_price.pn, stock_and_price.LIST_PRICE
FROM master_product_data p
LEFT JOIN stock_and_price 
ON p.part = stock_and_price.pn
WHERE p.tool_type="MILLING"
AND p.sub_type=?
AND p.cut_dia_in_display=?
AND p.loc_in_display BETWEEN ? AND ?

AND p.flutes=?
AND p.coating=?
LIMIT 50';

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $millSub, $millDia, $locMin, $locMax, $flutes, $coating);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();?>
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
                <th data-sortable="true" data-sortReset="true">Part</th>
                <th data-sortable="true" data-sortReset="true">Series</th>
                <th data-sortable="true" data-sortReset="true">Diameter</th>
                <th data-sortable="true" data-sortReset="true">Length of Cut</th>
                <th data-sortable="true" data-sortReset="true">Overall Length</th>
                <th data-sortable="true" data-sortReset="true">Radius</th>
                <th data-sortable="true" data-sortReset="true">Flutes</th>
                <th data-sortable="true" data-sortReset="true">Coating</th>
                <th>Price</th>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) {
            $part = $row['part'];
            $series = $row['series'];
            $diameter = $row['cut_dia_in_display'];
            $loc = $row['loc_in_display'];
            $oal = $row['oal_in_display'];
            $radius = $row['radius_in_display'];
            $flutes = $row['flutes'];
            $coating = $row['coating'];
            $price = $row['LIST_PRICE'];
        ?>
            <tr>
                <td><a href="/product?<?php echo $part;?>"><?php echo $part; ?></a></td> 
                <td><a href="/product_series/series-<?php echo $series;?>"><?php echo $series; ?></a></td>
                <td><?php echo $diameter; ?></td>
                <td><?php echo $loc; ?></td>
                <td><?php echo $oal; ?></td>
                <td><?php echo $radius; ?></td>
                <td><?php echo $flutes; ?></td>
                <td><?php echo $coating; ?></td>
                <td>$<?php echo $price; ?></td>
            </tr>
            
        <?php }  
            ?>

        </tbody>
    </table>

<?php } else echo "Please try your search again."; ?>

