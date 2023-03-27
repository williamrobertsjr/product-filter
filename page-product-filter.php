<?php 
// Template Name: Product Filter
get_header() ;?>

<!-- Bootstrap Table Stylesheets -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="/wp-content/themes/storefront-child/noUiSlider/nouislider.css">
<link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

<section id="filter-options">
    <div>
        <h1>Product Filter</h1>
    </div>
    <div id="tool-type-filters">
        <h3>What type of tool are you looking for?</h3>
        <div>
            <button class="filter-btn" data-filter="milling">Milling</button>
            <button class="filter-btn" data-filter="holemaking">Holemaking</button>
            <button class="filter-btn" data-filter="threading">Threading</button>
            <button class="filter-btn" data-filter="inserts">Inserts</button>
            <button class="filter-btn" data-filter="specialty">Specialty</button>
            <button class="filter-btn" data-filter="specialty">Micro</button>
        </div>
    </div>
    <div id="milling-filters" class="filter-options hide"  data-filter="milling">
        <div class="filters-left">
            <div>
                <label for="milling-length">Length of Cut</label>
                <div class="range-div">
                    <div class="slider"></div>
                </div>
                
            </div>
            <div>
                <label for="milling-flutes">Number of Flutes</label>
                <div class="range-div">
                    <!-- <div class="slider"></div> -->
                    <select name="milling-flutes" id="milling-flutes">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <!-- <input type="range" name="milling-flutes" id="milling-flutes" min="0" max="12">
                    <output name="rangeOutput" id="">6</output> -->
                </div>      
            </div>
            <div>
                <label for="milling-overall">Overall Length</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="milling-overall" id="milling-overall" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <!-- <div>
                <label for="milling-shank-dia">Shank Diameter</label>
                <div class="range-div">
                    <div class="slider"></div>
                </div>
            </div> -->
            <div>
                <label for="milling-dia">Diameter</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="milling-dia" id="milling-dia" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="milling-radius">Radius</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="milling-radius" id="milling-radius" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="milling-coating">Coating</label>
                <select multiple size="3" name="milling-coating" id="milling-coating">
                    <option value="1">Bright</option>
                    <option value="2">FX1</option>
                    <option value="3">FX2</option>
                    <option value="4">FX3</option>
                    <option value="5">FX5</option>
                </select>
            </div>
            <div>
                <label for="milling-work-materials">Work Material</label>
                <select size="3" name="milling-work-materials" id="milling-work-materials">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="milling-sub-categories">Milling Sub Type</label>
                <select size="3" name="milling-sub-categories" id="milling-sub-categories">
                    <option value="1">Ball Nose</option>
                    <option value="2">Square</option>
                    <option value="3">Corner Radius</option>
                    <option value="4">Roughing</option>
                    <option value="5">High Feed</option>
                    <option value="6">Micro</option>
                    <option value="7">Corner Chamfer</option>
                    <option value="8">Drill/Mill</option>
                </select>
            </div>
            
        </div>
        <div>
            <button class="filter-submit">Search</button>
        </div>
        <!-- <div class="filters-right">
            <img src="/wp-content/uploads/2022/06/1030_catalog_clean.png" alt="" class="filter-img">
            <h3>MILLING</h3>
        </div> -->
    </div>

    <div id="holemaking-filters" class="filter-options hide"  data-filter="holemaking">
        <div class="filters-left">
            <div>
                <label for="holemaking-length">Length of Cut</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="holemaking-length" id="holemaking-length" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="holemaking-flutes">Number of Flutes</label>
                <div class="range-div">
                    <select name="holemaking-flutes" id="holemaking-flutes">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <!-- <input type="range" name="holemaking-flute" id="holemaking-flute" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="holemaking-overall">Overall Length</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="holemaking-overall" id="holemaking-overall" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="holemaking-dia">Diameter</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="holemaking-dia" id="holemaking-dia" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="holemaking-point">Point Angle</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="holemaking-angle" id="holemaking-angle" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="holemaking-coolant">Coolant Through</label>
                <select multiple size="3" name="holemaking-coolant" id="holemaking-coolant">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div>
                <label for="holemaking-coating">Coating</label>
                <select multiple size="3" name="holemaking-coating" id="holemaking-coating">
                    <option value="1">Bright</option>
                    <option value="2">FX1</option>
                    <option value="3">FX2</option>
                    <option value="4">FX3</option>
                    <option value="5">FX5</option>
                </select>
            </div>
            <div>
                <label for="holemaking-work-materials">Work Materials</label>
                <select name="holemaking-work-materials" id="holemaking-work-materials">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="holemaking-sub-categories">Holemaking Sub Type</label>
                <select name="holemaking-sub-categories" id="holemaking-sub-categories">
                    <option value="1">Carbide Drills</option>
                    <option value="2">Carbide Tip Drills</option>
                    <option value="3">Reamers</option>
                    <option value="4">Aircraft Drills</option>
                    <option value="5">Countersinks</option>
                    <option value="6">Boring Bars</option>
                </select>
            </div>
        </div>
        <div>
            <button class="filter-submit">Search</button>
        </div>
        <!-- <div class="filters-right">
            <img src="/wp-content/uploads/2022/06/1030_catalog_clean.png" alt="" class="filter-img">
            <h3>HOLEMAKING</h3>
        </div> -->
    </div>

    <div id="threading-filters" class="filter-options hide"  data-filter="threading">
        <!-- <h2>Threading Filters</h2> -->
        <div class="filters-left">
            <div>
                <label for="threading-measure">Inch or Metric</label>
                <select name="threading-measure" id="threading-measure">
                    <option value="1">Inch</option>
                    <option value="2">Metric</option>
                </select>
            </div>
            <div>
                <label for="threading-flutes">Number of Flutes</label>
                <div class="range-div">
                    <select name="threading-flutes" id="threading-flutes">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                    </select>        
                </div>
            </div>
            <div>
                <label for="threading-chamfer">Chamfer Length</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="threading-chamfer" id="threading-chamfer" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="threading-limit">Thread Limit</label>
                <div class="range-div">
                    <div class="slider"></div>
                    <!-- <input type="range" name="threading-limit" id="threading-limit" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="threading-direction">Thread Direction</label>
                <select name="threading-direction" id="threading-direction">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="threading-size">Thread Size</label>
                <div class="range-div">
                    <div class="slider"></div>
                </div>
            </div>
            <div>
                <label for="threading-standard">Thread Standard</label>
                <select name="threading-standard" id="threading-standard">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="threading-coolant">Coolant Through</label>
                <select name="threading-coolant" id="threading-coolant">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div>
                <label for="threading-tap">Tap Material</label>
                <select name="threading-tap" id="threading-tap">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="threading-coating">Coating</label>
                <select multiple size="3" name="threading-coating" id="threading-coating">
                    <option value="1">Bright</option>
                    <option value="2">FX1</option>
                    <option value="3">FX2</option>
                    <option value="4">FX3</option>
                    <option value="5">FX5</option>
                </select>
            </div>
            <div>
                <label for="threading-work-materials">Work Materials</label>
                <select name="threading-work-materials" id="threading-work-materials">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="threading-sub-categories">Threading Sub Type</label>
                <select name="threading-sub-categories" id="threading-sub-categories">
                    <option value="1">Carbide Taps</option>
                    <option value="2">Thread Mills</option>
                    <option value="3">Spiral Point Taps</option>
                    <option value="4">Pipe Taps</option>
                    <option value="5">Hand Taps</option>
                    <option value="6">Spiral Flute Taps</option>
                    <option value="6">Forming Taps</option>
                    <option value="6">Conduit Taps</option>
                    <option value="6">Combo Drill/Tap</option>
                    <option value="6">Round Dies</option>
                    <option value="6">Plug Gages</option>
                    <option value="6">Ring Gages</option>
                </select>
            </div>
        </div>
        <div>
            <button class="filter-submit">Search</button>
        </div>
        <!-- <div class="filters-right">
            <img src="/wp-content/uploads/2022/06/1030_catalog_clean.png" alt="" class="filter-img">
            <h3>THREADING</h3>
        </div> -->
    </div>
    <div id="inserts-filters" class="filter-options hide"  data-filter="inserts">
        <h2>Show all inserts</h2>
    </div>
    <div id="specialty-filters" class="filter-options hide"  data-filter="specialty">
        <!-- <h2>Specialty Filters</h2> -->
        <div class="filters-left">
            <div>
                <label for="specialty-flute">Length of Cut</label>
                <div class="range-div">
                    <div class="slider"></div>   
                <!-- <input type="range" name="specialty-flutes" id="specialty-flutes" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <div>
                <label for="specialty-overall">Overall Length</label>
                <div class="range-div">
                    <div class="slider"></div>   
                <!-- <input type="range" name="specialty-overall" id="specialty-overall" min="0" max="12">
                    <output name="rangeOutput" id="">6</output>             -->
                </div>
            </div>
            <!-- <div>
                <label for="specialty-shank-dia">Shank Diameter</label>
                <div class="range-div">
                    <div class="slider"></div>   
              
                </div>
            </div> -->
            <div>
                <label for="specialty-coating">Coating</label>
                <select multiple size="3" name="specialty-coating" id="specialty-coating">
                    <option value="1">Bright</option>
                    <option value="2">FX1</option>
                    <option value="3">FX2</option>
                    <option value="4">FX3</option>
                    <option value="5">FX5</option>
                </select>
            </div>
            <div>
                <label for="specialty-work-materials">Work Materials</label>
                <select multiple size="3" name="specialty-work-materials" id="specialty-work-materials">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="specialty-sub-categories">Specialty Sub Type</label>
                <select multiple size="3" name="specialty-sub-categories" id="specialty-sub-categories">
                    <option value="1">Routers</option>
                    <option value="2">Burrs</option>
                    <option value="3">Engraving</option>
                    <option value="4">ID Grinding</option>
                    <option value="5">Carbide Blanks</option>
                    <option value="6">Armory</option>
                    <option value="7">Diamond Cut Routers</option>
                    
                </select>
            </div>
        </div>
        <div>
            <button class="filter-submit">Search</button>
        </div>
        <!-- <div class="filters-right">
            <img src="/wp-content/uploads/2022/06/1030_catalog_clean.png" alt="" class="filter-img">
            <h3>SPECIALTY</h3>
        </div> -->
    </div>
</section>


<section id ="filter-results">
    <div id="filter-table-container">
        <h3>Search Results</h3>

    <?php
    // include('db_connection.php');
    // include('product-filter-table.php');
    include('inserts-table.php');
    ?>
<!-- </table> -->

    </div>
    
</section>

<!-- Bootstrap Table Scripts -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<!-- noUiSlider -->
<script src="/wp-content/themes/storefront-child/noUiSlider/nouislider.min.js" defer></script>
<script src="/wp-content/themes/storefront-child/js/product-table.js" defer></script>

<?php get_footer() ; ?>

