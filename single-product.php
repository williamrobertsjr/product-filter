<?php 
$row = '1';
$partNum = '';
$PN = $_SERVER["QUERY_STRING"];

// echo $PN;
// Query the database and combine product data with series data to be used as variables for individual product page
$sql = "SELECT *
    FROM master_product_data
    LEFT JOIN master_series_data ON master_product_data.series = master_series_data.series
    LEFT JOIN stock_and_price ON master_product_data.part = stock_and_price.pn
    WHERE master_product_data.part=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $PN);
$stmt->execute();
$result = $stmt->get_result();

while($rows=$result->fetch_assoc()) {
    // Set variables for each result
    $part = $rows['part'];
    $series = $rows['series'];
    $family = strtolower($rows['family']);
    $brand = $rows['brand'];
    $seriesSub = $rows['subtitle'];
    $toolType = $rows['tool_type'];
    // Fetch values from cols column which tells us which columns to use for table display
    $dataFields = explode(",",$rows['data_fields']);
    $appIcons = explode(", ",$rows['app_icons']);
    $featIcons = explode(", ",strtolower($rows['feat_icons']));
    $price = $rows['LIST_PRICE'];
    $stock = number_format($rows['QTY_ON_HAND'],0);
    $coating = $rows['coating'];
    $p1 = $rows['p1'];
    $p2 = $rows['p2'];
    $p3 = $rows['p3'];
    $m1 = $rows['m1'];
    $m2 = $rows['m2'];
    $k1 = $rows['k1'];
    $k2 = $rows['k2'];
    $n1 = $rows['n1'];
    $n2 = $rows['n2'];
    $s1 = $rows['s1'];
    $s2 = $rows['s2'];
    $h1 = $rows['h1'];
    $h2 = $rows['h2'];
    ?>
    <div id="product-breadcrumbs">
        <p> 
            <a href="/product_family/<?php echo $family;?>"> <?php echo ucfirst($family) ; ?></a> > 
            <a href="/product_series/series-<?php echo $series;?>"> Series <?php echo $series ; ?></a>
        </p>
    </div>
    <div class="tool-heading">
        <div class="tool-title">
            <h1><?php echo $PN; ?> | <?php echo $seriesSub; ?></h1>
            <h5>Series <?php echo $series; ?> | <?php echo $brand; ?></h5>
        </div>
        <div class="brand-div"><a href="/product_family/<?php echo $family;?>"><img src="/wp-content/themes/storefront-child/products/brands/brand_<?php echo $family;?>.png" alt=""></a></div>
    </div>
    <div class="tool-info">
        <div class="tool-gallery">
            <!-- <img src="/wp-content/uploads/2022/06/114_catalog.png" alt=""> -->
            <?php if($series == 'Armory') {?>
                        <img src="/wp-content/themes/storefront-child/products/images/armory_<?php echo $part;?>_catalog.png" alt="">
                <?php
            } else { ?>
                <img src="/wp-content/themes/storefront-child/products/images/<?php echo $series;?>_catalog.png" alt="">
            <?php }  ?>
            
        </div>

        <div class="tool-details">
            <div class="details">
                <div class="tool-att">
                    <div class="title">
                        <h3>Attributes</h3>
                    </div>
                    <div class="att-list">
                        <!-- Display list of columns: $tableCols that are specific to EDP/Tool Type (not every attribute is relevant to every tool) -->
                        <p><span class="att">List Price: </span><span>$<?php echo $price; ?></span></p>
                        <p><span class="att">Stock: </span><span><?php echo $stock; ?></span></p>
                        <?php   
                        foreach ($dataFields as $attribute) {
                            $attributeData = $rows[$attribute]; ?>
                            <p><span class="att <?php echo $attribute; ?>"><?php echo $attribute; ?></span>: <span class="att-data"><?php echo $attributeData; ?></span></p>
                            <?php }?>
                        <!-- <p><span class="att">Coating: </span><span><?php echo $coating; ?></span></p> -->
                        <div style="margin-top:30px;">
                            <p><a class="button ms-button dark-blue" href="https://www.gwstoolgroup.com/modify-a-stocked-tool/?EDP=<?php echo $part; ?>">Modify Tool</EDP:php></a></p>
                        </div>
                    </div>
                </div>

                <div class="tool-app">
                    <div class="title">
                        <h3>Application</h3>
                    </div>
                    <div class="icons">
                        <?php   
                            foreach ($appIcons as $value) {?>
                            <img class ="app-icon" src="/wp-content/themes/storefront-child/products/icons/<?php echo $value;?>_icon.jpg" alt="">
                        <?php } ;?>
                    </div>
                </div>

                <div class="tool-features">
                    <div class="title">
                        <h3>Features</h3>
                    </div>
                    <div>
                        <div class="icons">
                            <?php   
                                foreach ($featIcons as $value) {
                                    // if value isn't speed and feed - just show icon
                                    if($value !== 'speedandfeed') {?>
                                <img class ="feat-icon <?php echo $value; ?>" src="/wp-content/themes/storefront-child/products/icons/<?php echo $value;?>_icon.jpg" alt=""> 
                            <?php 
                            // else, if value is speed and feed - icon wrapped in anchor tag that links to specific speed and feed for that series
                            } else {?>
                                <a style="margin:0;" href="/docs/speed_and_feed/<?php echo $series;?>_sf.pdf" target="_blank"><img class ="feat-icon <?php echo $value; ?>" src="/wp-content/themes/storefront-child/products/icons/<?php echo $value;?>_icon.jpg" alt=""></a>
                            <?php } } ;?>
                        </div>
                        <!-- <div class="speed-and-feed-div">
                            <a class="button ms-button white-btn" href="/speeds-and-feeds/">Speed & Feed</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="iso-mats">
                <div class="iso-div steel">
                    <div class="heading">
                        <p>Steel</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>P1</p>
                                <div class="dot">
                                    <p><?php echo $p1 ; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                            <p>P2</p>
                            <div class="dot">
                                <p><?php echo $p2 ;?></p>
                            </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>P3</p>
                                <div class="dot">
                                    <p><?php echo $p3; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iso-div stainless">
                    <div class="heading">
                        <p>Stainless</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>M1</p>
                                <div class="dot">
                                    <p><?php echo $m1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>M2</p>
                                <div class="dot">
                                    <p><?php echo $m2; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iso-div cast-iron">
                    <div class="heading">
                        <p>Cast Iron</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>K1</p>
                                <div class="dot">
                                    <p><?php echo $k1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>K2</p>
                                <div class="dot">
                                    <p><?php echo $k2; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iso-div non-ferrous">
                    <div class="heading">
                        <p>Non-Ferrous</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>N1</p>
                                <div class="dot">
                                    <p><?php echo $n1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>N2</p>
                                <div class="dot">
                                    <p><?php echo $n2; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iso-div hrsa">
                    <div class="heading">
                        <p>HRSA</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>S1</p>
                                <div class="dot">
                                    <p><?php echo $s1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>S2</p>
                                <div class="dot">
                                    <p><?php echo $s2; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iso-div hardened-steel">
                    <div class="heading">
                        <p>Hardened Steel</p>
                    </div>
                    <div class="mats-row">
                        <div class="mat">
                            <div class="mat-inner">
                                <p>H1</p>
                                <div class="dot">
                                    <p><?php echo $h1; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mat">
                            <div class="mat-inner">
                                <p>H2</p>
                                <div class="dot">
                                    <p><?php echo $h2; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">
                <p><span>&#11044; Best</span> <span>&#9675; Good</span></p>
            </div>
        </div>
    </div>


<?php  }; ?>


