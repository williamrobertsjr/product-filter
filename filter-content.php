<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// session_start();
// $tool_type = $_POST['tool-type'];

if (isset($_POST['tool-type'])) {
    $_SESSION['tool-type'] = $_POST['tool-type'];
}
$tool_type = $_SESSION['tool-type'];
$_SESSION['tool-sub-categories'] = $_POST['tool-sub-categories'];
$sub_type = $_SESSION['tool-sub-categories'];
if(isset($_POST['milling-sub-categories'])) {
    $_SESSION['milling-sub-categories'] = $_POST['milling-sub-categories'];
} 

if(isset($_SESSION['milling-sub-categories'])) {
    $millingSub = $_SESSION['milling-sub-categories'];
}

if(isset($_POST['holemaking-sub-categories'])) {
    $_SESSION['holemaking-sub-categories'] = $_POST['holemaking-sub-categories'];
}
if (isset($_SESSION['holemaking-sub-categories'])){
    $holemakingSub = $_SESSION['holemaking-sub-categories'];
}

if(isset($_POST['threading-sub-categories'])) {
    $_SESSION['threading-sub-categories'] = $_POST['threading-sub-categories'];
} 
if (isset($_SESSION['threading-sub-categories'])) {
    $threadingSub = $_SESSION['threading-sub-categories'];
}

if(isset($_POST['specialty-sub-categories'])) {
    $_SESSION['specialty-sub-categories'] = $_POST['specialty-sub-categories'];
}
if (isset($_SESSION['specialty-sub-categories'])){
    $specialtySub = $_SESSION['specialty-sub-categories'];
}
// include 'session-variables.php';
include 'filter_queries.php'; 
?>



<div id="milling-filters" class="filter-options">

        <div class="filters-left">                   
            <div class="filter-options hide" data-tool-type="milling">
                <label for="milling-work-materials">Work Material</label>
                <select name="milling-work-materials" id="milling-work-materials" class="work-materials">
                    <option value="any">Any</option>
                    <option value="n1">Aluminum Alloy (6061, 7075)</option>
                    <option value="n2">Aluminum Casting</option>
                    <option value="n2">Aluminum > 10% Si</option>
                    <option value="n1">Beryllium Copper</option>
                    <option value="n1">Brass</option>
                    <option value="n1">Bronze</option>
                    <option value="c1">Composite</option>
                    <option value="c1">CFRP</option>
                    <option value="n1">Copper</option>
                    <option value="k1">CGI</option>
                    <option value="k2">Ductile Cast Iron</option>
                    <option value="k1">Graphite</option>
                    <option value="k1">Gray Cast Iron</option>
                    <option value="p3">Hard. Steel (32-35 Rc)</option>
                    <option value="p3">Hard. Steel (35-44 Rc)</option>
                    <option value="h1">Hard. Steel (45-54 Rc)</option>
                    <option value="h2">Hard. Steel (> 54 HRC)</option>
                    <option value="p2">High Carbon Steel (1144, 1545)</option>
                    <option value="p1">Low Carbon Steel (1010, 1018)</option>
                    <option value="n1">Magnesium Alloy</option>
                    <option value="p2">Medium Carbon Steel (1035, 1045, 1050)</option>
                    <option value="s1">Ni-Alloys (Inconel 718, Hasteloy, A286)</option>
                    <option value="s1">Co-Alloys (Stellite, Haynes)</option>
                    <option value="c1">PEEK</option>
                    <option value="c1">Plastic</option>
                    <option value="m1">Stainless Steel (302, 304, 304L)</option>
                    <option value="m1">Stainless Steel (310, 316, 316L)</option>
                    <option value="m2">Stainless Steel (15-5PH, 17-4PH)</option>
                    <option value="p3">Alloy & Tool Steel (4140, 8620, P20)</option>
                    <option value="s2">Ti-Alloy (Ti6Al4V, Ti99.9)</option>     
                </select>
            </div>

        </div>
    
        <div id="milling-dimensions-ajax"></div>

    <form id="milling-dimensions" method="post">
        <div class="filters hide" data-tool-type="milling" data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill">
            
            <label for="milling-dia-select">Diameter</label>
            <select name="milling-dia" id="milling-dia">
                
                <?php diameter_filter($tool_type, $sub_type); ?>
            </select>
        </div>
        
        <div class="filters hide" data-tool-type="milling"  data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill">
            <label for="milling-loc-select">Length of Cut</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="milling-loc-min">Min</label>
                    <select name="milling-loc-min" id="milling-loc-min">
                        <?php loc_filter($tool_type, $sub_type); ?>  
                    </select>
                </div>
                <div class="max-select">
                <label for="milling-loc-max">Max</label>
                    <select name="milling-loc-max" id="milling-loc-max">
                        <?php loc_filter($tool_type, $sub_type); ?> 
                    </select>
                </div>
            </div> 
        </div>
        
        <div class="filters hide" data-tool-type="milling"  data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill">
            <label for="milling-oal-select">Overall Length</label>
            <!-- <select name="milling-oal-select" id="milling-oal-select"></select> -->
            <div class="min-max-row">
                <div class="min-select">
                    <label for="milling-oal-min">Min</label>
                    <select name="milling-oal-min" id="milling-oal-min">
                        
                        <?php oal_filter($tool_type, $sub_type); ?> 
                    </select>
                </div>
                <div class="max-select">
                <label for="milling-oal-max">Max</label>
                    <select name="milling-oal-max" id="milling-oal-max">
                        
                        <?php oal_filter($tool_type, $sub_type); ?> 
                    </select>
                </div>
            </div> 
        </div>

        <div class ="filters hide" data-tool-type="milling"  data-filter="Corner Radius">
            <label for="milling-radius-select">Radius</label>
            <!-- <select name="milling-radius-select" id="milling-radius-select"></select> -->
            <div class="min-max-row">
                <div class="min-select">
                    <label for="milling-radius-min">Min</label>
                    <select name="milling-radius-min" id="milling-radius-min">
                        
                        <?php rad_filter($tool_type, $sub_type); ?> 
                    </select>
                </div>
                <div class="max-select">
                <label for="milling-radius-max">Max</label>
                    <select name="milling-radius-max" id="milling-radius-max">
                        
                        <?php rad_filter($tool_type, $sub_type); ?> 
                    </select>
                </div>
            </div> 
        </div>

        <div class="filters hide" data-tool-type="milling"  data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill">
            <label for="milling-flutes">Number of Flutes</label>
            <div class="range-div">
                <select name="milling-flutes" id="milling-flutes">
                    
                    <?php flute_filter($tool_type, $sub_type); ?> 
                </select>
                
            </div>      
        </div>    

        <div class="filters hide" data-tool-type="milling"  data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill">
            <label for="milling-coating">Coating</label>
            <select name="milling-coating" id="milling-coating">
                
                <?php coating_filter($tool_type, $sub_type); ?> 
            </select>
        </div>

        <div class="filters hide" data-tool-type="milling"  data-filter="Ball Nose Square Corner Radius Corner Chamfer Rougher Drill/Mill" style="text-align: center;">
            <button name="milling-search" type="submit" class="button ms-button dark-blue">Search</button>
        </div>
    </form>
</div>


<div id="holemaking-filters" class="filter-options">
    <div class="filters-left">

            <div class="filter-options hide" data-tool-type="holemaking">
                <label for="holemaking-work-materials">Work Material</label>
                <select name="holemaking-work-materials" id="holemaking-work-materials">
                    <option value="any">Any</option>
                    <option value="n1">Aluminum Alloy (6061, 7075)</option>
                    <option value="n2">Aluminum Casting</option>
                    <option value="n2-2">Aluminum >10% Si</option>
                    <option value="n1-2">Beryllium Copper</option>
                    <option value="n1-3">Brass</option>
                    <option value="n1-4">Bronze</option>
                    <option value="c1">Composite</option>
                    <option value="c1-2">CFRP</option>
                    <option value="n1-5">Copper</option>
                    <option value="k1">CGI</option>
                    <option value="k2">Ductile Cast Iron</option>
                    <option value="k1-2">Graphite</option>
                    <option value="k1-3">Gray Cast Iron</option>
                    <option value="p3">Hard. Steel (32-35 Rc)</option>
                    <option value="p3-2">Hard. Steel (35-44 Rc)</option>
                    <option value="h1">Hard. Steel (45-54 Rc)</option>
                    <option value="h2">Hard. Steel (> 54 HRC)</option>
                    <option value="p2">High Carbon Steel (1144, 1545)</option>
                    <option value="p1">Low Carbon Steel (1010, 1018)</option>
                    <option value="n1-6">Magnesium Alloy</option>
                    <option value="p2-2">Medium Carbon Steel (1035, 1045, 1050)</option>
                    <option value="s1">Ni-Alloys (Inconel 718, Hasteloy, A286)</option>
                    <option value="s1-2">Co-Alloys (Stellite, Haynes)</option>
                    <option value="c1-3">PEEK</option>
                    <option value="c1-4">Plastic</option>
                    <option value="m1">Stainless Steel (302, 304, 304L)</option>
                    <option value="m1-2">Stainless Steel (310, 316, 316L)</option>
                    <option value="m2">Stainless Steel (15-5PH, 17-4PH)</option>
                    <option value="p3-3">Alloy & Tool Steel (4140, 8620, P20)</option>
                    <option value="s2">Ti-Alloy (Ti6Al4V, Ti99.9)</option>     
                </select>
            </div>

           

            <div class="filters hide" data-tool-type="holemaking">
                <label for="holemaking-dia">Diameter</label>
                <select name="holemaking-dia" id="holemaking-dia" data-filter="Drill Boring Bar Reamers Countersinks">
                    
                    <?php diameter_filter($tool_type, $sub_type); ?>
                </select>
                
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks">
                <label for="holemaking-length">Flute Length</label>
                <div class="min-max-row">
                    <div class="min-select">
                        <label for="holemaking-loc-min">Min</label>
                        <select name="holemaking-loc-min" id="holemaking-loc-min">
                            
                            <?php loc_filter($tool_type, $sub_type); ?>
                        </select>
                    </div>
                    <div class="max-select">
                    <label for="holemaking-loc-max">Max</label>
                        <select name="holemaking-loc-max" id="holemaking-loc-max">
                            
                            <?php loc_filter($tool_type, $sub_type); ?>
                        </select>
                    </div>
                </div> 
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks">
                <label for="holemaking-overall">Overall Length</label>
                <div class="min-max-row">
                    <div class="min-select">
                        <label for="holemaking-oal-min">Min</label>
                        <select name="holemaking-oal-min" id="holemaking-oal-min">
                            
                            <?php oal_filter($tool_type, $sub_type); ?>
                        </select>
                    </div>
                    <div class="max-select">
                    <label for="holemaking-oal-max">Max</label>
                        <select name="holemaking-oal-max" id="holemaking-oal-max">
                            
                            <?php oal_filter($tool_type, $sub_type); ?>
                        </select>
                    </div>
                </div> 
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill">
                <label for="holemaking-point">Point Angle</label>
                <select name="holemaking-angle" id="holemaking-angle">
                    
                    <?php angle_filter($tool_type, $sub_type); ?>
                </select>
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks">
                <label for="holemaking-flutes">Number of Flutes</label>
                
                    <select name="holemaking-flutes" id="holemaking-flutes">
                        
                        <?php flute_filter($tool_type, $sub_type); ?>
                    </select>
                    
                
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks">
                <label for="holemaking-coolant">Coolant Through</label>
                <select name="holemaking-coolant" id="holemaking-coolant">
                    
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks">
                <label for="holemaking-coating">Coating</label>
                <select name="holemaking-coating" id="holemaking-coating">
                    
                    <?php coating_filter($tool_type, $sub_type); ?>
                </select>
            </div>
            <div class="filters hide" data-tool-type="holemaking" data-filter="Drill Boring Bar Reamers Countersinks" style="text-align: center;">
                <a class="button ms-button dark-blue" href="#">Search</a>
            </div>
    </div>
</div>     



<div id="threading-filters" class="filter-options">        
    <div class="filters-left">
        <div class="filter-options hide" data-tool-type="threading">
            <label for="milling-work-materials">Work Material</label>
            <select name="milling-work-materials" id="milling-work-materials">
                <option value="any">Any</option>
                <option value="n1">Aluminum Alloy (6061, 7075)</option>
                <option value="n2">Aluminum Casting</option>
                <option value="n2-2">Aluminum >10% Si</option>
                <option value="n1-2">Beryllium Copper</option>
                <option value="n1-3">Brass</option>
                <option value="n1-4">Bronze</option>
                <option value="c1">Composite</option>
                <option value="c1-2">CFRP</option>
                <option value="n1-5">Copper</option>
                <option value="k1">CGI</option> 
                <option value="k2">Ductile Cast Iron</option>
                <option value="k1-2">Graphite</option>
                <option value="k1-3">Gray Cast Iron</option>
                <option value="p3">Hard. Steel (32-35 Rc)</option>
                <option value="p3-2">Hard. Steel (35-44 Rc)</option>
                <option value="h1">Hard. Steel (45-54 Rc)</option>
                <option value="h2">Hard. Steel (> 54 HRC)</option>
                <option value="p2">High Carbon Steel (1144, 1545)</option>
                <option value="p1">Low Carbon Steel (1010, 1018)</option>
                <option value="n1-6">Magnesium Alloy</option>
                <option value="p2-2">Medium Carbon Steel (1035, 1045, 1050)</option>
                <option value="s1">Ni-Alloys (Inconel 718, Hasteloy, A286)</option>
                <option value="s1-2">Co-Alloys (Stellite, Haynes)</option>
                <option value="c1-3">PEEK</option>
                <option value="c1-4">Plastic</option>
                <option value="m1">Stainless Steel (302, 304, 304L)</option>
                <option value="m1-2">Stainless Steel (310, 316, 316L)</option>
                <option value="m2">Stainless Steel (15-5PH, 17-4PH)</option>
                <option value="p3-3">Alloy & Tool Steel (4140, 8620, P20)</option>
                <option value="s2">Ti-Alloy (Ti6Al4V, Ti99.9)</option>  
            </select>
        </div>

       
        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Thread Mill Die Specialty Gage">
            <label for="threading-measure">Inch or Metric</label>
            <select name="threading-measure" id="threading-measure">
                
                <option value="1">Inch</option>
                <option value="2">Metric</option>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Die">
            <label for="thread-material">Tool Material</label>
            <select name="thread-material" id="thread-material">
                
                <option value="hss">HSS</option>
                <option value="carbide">Carbide</option>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Thread Mill Die Specialty Gage">
            <label for="thread-size">Thread Size</label>
            <select name="thread-size" id="thread-size">
                
                <?php thread_size_filter(); ?>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form">
            <label for="thread-limit">Thread Limit</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="thread-limit-min">Min</label>
                    <select name="thread-limit-min" id="thread-limit-min">
                        
                        <?php thread_limit_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                    <label for="thread-limit-max">Max</label>
                    <select name="thread-limit-max" id="thread-limit-max">
                        
                        <?php thread_limit_filter(); ?>
                    </select>
                </div>
            </div> 
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Gage">
            <label for="thead-fit">Class of Fit</label>
            <select name="thread-fit" id="thread-fit">
                
                <?php class_fit_filter(); ?>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Thread Mill">
            <label for="thread-cut-dia">Cutter Diameter</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="thread-cut-dia-min">Min</label>
                    <select name="thread-cut-dia-min" id="thread-cut-dia-min">
                        
                        <?php thread_cut_dia_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="thread-cut-dia-max">Max</label>
                    <select name="thread-cut-dia-max" id="thread-cut-dia-max">
                        
                        <?php thread_cut_dia_filter(); ?>
                    </select>
                </div>
            </div> 
        </div> 

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form">
            <label for="thread-chamfer">Chamfer Length</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="thread-chamfer-min">Min</label>
                    <select name="thread-chamfer-min" id="thread-chamfer-min">
                        
                        <?php thread_chamfer_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="thread-chamfer-max">Max</label>
                    <select name="thread-chamfer-max" id="thread-chamfer-max">
                        
                        <?php thread_chamfer_filter(); ?>
                    </select>
                </div>
            </div> 
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Thread Mill">
            <label for="threading-flutes">Number of Flutes</label>
            <div class="range-div">
                <select name="threading-flutes" id="threading-flutes">
                    
                    <?php flute_filter($tool_type, $sub_type); ?>
                </select>        
            </div>
        </div>
        
        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form">
            <label for="threading-direction">Thread Direction</label>
            <select name="thread-direction" id="thread-direction">
                
                <option value="RH">RH</option>
                <option value="LH">LH</option>
            </select>
        </div>
        
        <div class="filters hide" data-tool-type="threading">
            <label for="threading-standard">Thread Standard</label>
            <select name="threading-standard" id="threading-standard">
                
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Thread Mill">
            <label for="threading-coolant">Coolant Through</label>
            <select name="threading-coolant" id="threading-coolant">
                
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" data-filter="Die">
            <label for="threading-od">Outer Dimensions</label>
            <select name="threading-od" id="threading-od">
                
                <?php od_filter(); ?>
            </select>
        </div>
        
        <div class="filters hide" data-tool-type="threading" data-filter="Hand Tap Spiral Point Spiral Flute Form Thread Mill">
            <label for="threading-coating">Coating</label>
            <select name="threading-coating" id="threading-coating">
                
                <?php coating_filter($tool_type, $sub_type); ?>
            </select>
        </div>

        <div class="filters hide" data-tool-type="threading" style="text-align: center;" data-filter="Hand Tap Spiral Point Spiral Flute Form Thread Mill">
            <a class="button ms-button dark-blue" href="#">Search</a>
        </div>

    </div> 
</div>



<div id="inserts-filters" class="filter-options hide"  data-tool-type="inserts">
    
</div>



<div id="specialty-filters" class="filter-options hide"  data-tool-type="specialty">
    <div class="filters-left">
        <div class="filter-options hide"  data-tool-type="specialty">
            <label for="specialty-work-materials">Work Materials</label>
            <select name="specialty-work-materials" id="specialty-work-materials">
                <option value="any">Any</option>
                <option value="n1">Aluminum Alloy (6061, 7075)</option>
                <option value="n2">Aluminum Casting</option>
                <option value="n2-2">Aluminum >10% Si</option>
                <option value="n1-2">Beryllium Copper</option>
                <option value="n1-3">Brass</option>
                <option value="n1-4">Bronze</option>
                <option value="c1">Composite</option>
                <option value="c1-2">CFRP</option>
                <option value="n1-5">Copper</option>
                <option value="k1">CGI</option>
                <option value="k2">Ductile Cast Iron</option>
                <option value="k1-2">Graphite</option>
                <option value="k1-3">Gray Cast Iron</option>
                <option value="p3">Hard. Steel (32-35 RC)</option>
                <option value="p3-2">Hard. Steel (35-44 RC)</option>
                <option value="h1">Hard. Steel (45-54 RC)</option>
                <option value="h2">Hard. Steel (> 54 HRC)</option>
                <option value="p2">High Carbon Steel (1144, 1545)</option>
                <option value="p1">Low Carbon Steel (1010, 1018)</option>
                <option value="n1-6">Magnesium Alloy</option>
                <option value="p2-2">Medium Carbon Steel (1035, 1045, 1050)</option>
                <option value="s1">Ni-Alloys (Inconel 718, Hasteloy, A286)</option>
                <option value="s1-2">Co-Alloys (Stellite, Haynes)</option>
                <option value="c1-3">PEEK</option>
                <option value="c1-4">Plastic</option>
                <option value="m1">Stainless Steel (302, 304, 304L)</option>
                <option value="m1-2">Stainless Steel (310, 316, 316L)</option>
                <option value="m2">Stainless Steel (15-5PH, 17-4PH)</option>
                <option value="p3-3">Alloy & Tool Steel (4140, 8620, P20)</option>
                <option value="s2">Ti-Alloy (Ti6Al4V, Ti99.9)</option>  
            </select>
        </div>
        
        <div class="filters hide" data-tool-type="specialty" data-filter="CarbideBlanks">
            <label for="blanks-sub">Blanks Sub Type</label>
            <select name="blanks-sub" id="blanks-sub">
                
                    <option value="round">Round</option>
                    <option value="non-round">Non-Round</option>
                    <option value="tips">Tips</option>
            </select>  
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Burr">
            <label for="specialty-shape">Shape</label>
            <select name="specialty-shape" id="specialty-shape">
                
                <?php shape_filter(); ?>
            </select>   
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Burr">
            <label for="specialty-designation">Tool Designation</label>
            <select name="specialty-designation" id="specialty-designation">
                
                <?php designation_filter(); ?>
            </select>   
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Burr Router Engraving IDGrinding">
            <label for="specialty-dia">Diameter</label>
            <select name="specialty-dia" id="specialty-dia">
                
                <?php diameter_filter($tool_type, $sub_type); ?>
            </select>  
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Router IDGrinding">
            <label for="specialty-loc">Length of Cut</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="specialty-loc-min">Min</label>
                    <select name="specialty-loc-min" id="specialty-loc-min">
                        
                        <?php loc_filter($tool_type, $sub_type); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="specialty-loc-max">Max</label>
                    <select name="specialty-loc-max" id="specialty-loc-max">
                        
                        <?php loc_filter($tool_type, $sub_type); ?>
                    </select>
                </div>
            </div> 
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Router">
            <label for="speciality-shank">Shank</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="specialty-shank-min">Min</label>
                    <select name="specialty-shank-min" id="specialty-shank-min">
                        
                        <?php shank_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="specialty-shank-max">Max</label>
                    <select name="specialty-shank-max" id="specialty-shank-max">
                        
                        <?php shank_filter(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="filters hide" data-tool-type="specialty" data-filter="Engraving">
            <label for="specialty-overall">Overall Length</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="specialty-oal-min">Min</label>
                    <select name="specialty-oal-min" id="specialty-oal-min">
                        
                        <?php oal_filter($tool_type, $sub_type); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="specialty-oal-max">Max</label>
                    <select name="specialty-oal-max" id="specialty-oal-max">
                        
                        <?php oal_filter($tool_type, $sub_type); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="filters hide" data-tool-type="specialty">
            <label for="specialty-thickness">Thickness</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="specialty-thickness-min">Min</label>
                    <select name="specialty-thickness-min" id="specialty-thickness-min">
                        
                        <?php thickness_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="specialty-thickness-max">Max</label>
                    <select name="specialty-thickness-max" id="specialty-thickness-max">
                        
                        <?php thickness_filter(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="filters hide" data-tool-type="specialty">
            <label for="specialty-width">Width</label>
            <div class="min-max-row">
                <div class="min-select">
                    <label for="specialty-width-min">Min</label>
                    <select name="specialty-width-min" id="specialty-width-min">
                        
                        <?php width_filter(); ?>
                    </select>
                </div>
                <div class="max-select">
                <label for="specialty-width-max">Max</label>
                    <select name="specialty-width-max" id="specialty-width-max">
                        
                        <?php width_filter(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="filters hide" data-tool-type="specialty">
            <label for="specialty-coating">Coating</label>
            <select name="specialty-coating" id="specialty-coating">
                
                <?php coating_filter($tool_type, $sub_type); ?>
            </select>
        </div>
        <div class="filters hide" data-tool-type="specialty" style="text-align: center;" data-filter="Burr Router Engraving IDGrinding">
            <a class="button ms-button dark-blue" href="#">Search</a>
        </div>
    </div>
</div>


