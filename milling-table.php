<?php 

session_start();
include 'db_connection.php'; 

// Table Variables
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
$filterArr = array();
if ($millSub != 'default') {
    $filterArr[] = $millSub;
}
if ($millDia != 'default') {
    $filterArr[] = $millDia;
} 
if ($locMin != 'default') {
    $filterArr[] = $locMin;
}
if ($locMax != 'default') {
    $filterArr[] = $locMax;
}
if ($oalMin != 'default') {
    $filterArr[] = $oalMin;
}
if ($oalMax != 'default') {
    $filterArr[] = $oalMax;
}
// if ($radMin != 'default') {
//     $filterArr[] = $radMin;
// }
// if ($radMax != 'default') {
//     $filterArr[] = $radMax;
// }
if ($flutes != 'default') {
    $filterArr[] = $flutes;
}
if ($coating != 'default') {
    $filterArr[] = $coating;
}

$sql = 'SELECT p.part, p.series, p.family, p.cut_dia_in_display, p.loc_in_display, p.oal_in_display, p.radius_in_display, p.flutes, p.coating, stock_and_price.pn, stock_and_price.LIST_PRICE
FROM master_product_data p
LEFT JOIN stock_and_price 
ON p.part = stock_and_price.pn
WHERE p.tool_type="MILLING"
AND p.sub_type=?';
if(! ($millDia == 'default') ) {
   $sql .= ' AND p.cut_dia_in_display=?'; 
}
// if(! ($locMin == 'default') ) {
//     $sql .= ' AND p.loc_in_display BETWEEN ?'
// }
$sql .= ' AND p.loc_in_display BETWEEN ? AND ?
AND p.oal_in_display BETWEEN ? AND ?';
// if(! ($radMin == 'default') ) {
//     $sql .= ' AND p.radius_in_display BETWEEN ? AND ?';
// }
if(! ($flutes == 'default') ){
    $sql .= ' AND p.flutes=?';
}
if(! ($coating == 'default') ){
    $sql .= ' AND p.coating=?';
}

// $sql .= ' LIMIT 50';

$stmt = $conn->prepare($sql);
$bindParams = str_repeat('s', count($filterArr));
echo $bindParams;
$stmt->bind_param($bindParams, ...$filterArr);
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
            data-page-size="25"
            class="table-striped table-sm table-title">
        <thead>
                <th data-sortable="true" data-sortReset="true">Part</th>
                <th data-sortable="true" data-sortReset="true">Series</th>
                <th data-sortable="true" data-sortReset="true">Diameter</th>
                <th data-sortable="true" data-sortReset="true">Length of Cut</th>
                <th data-sortable="true" data-sortReset="true">Overall Length</th>
                <?php if($millSub == 'Corner Chamfer' || $millSub == 'Corner Radius' ) {?>
                <th data-sortable="true" data-sortReset="true">Radius</th>
                <?php }; ?>
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
                <?php if($millSub == 'Corner Chamfer' || $millSub == 'Corner Radius' ) {?>
                <td><?php echo $radius; ?></td>
                <?php }; ?>
                <td><?php echo $flutes; ?></td>
                <td><?php echo $coating; ?></td>
                <td>$<?php echo $price; ?></td>
            </tr>
            
        <?php }  
            ?>

        </tbody>
    </table>

<?php } else echo "Please try your search again."; ?>

