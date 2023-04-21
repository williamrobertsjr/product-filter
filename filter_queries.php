<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['milling-sub-categories'])){
    $millingSub = $_SESSION['milling-sub-categories'];
}
if (isset($_SESSION['holemaking-sub-categories'])){
    $holemakingSub = $_SESSION['holemaking-sub-categories'];
}
if (isset($_SESSION['threading-sub-categories'])){
    $threadingSub = $_SESSION['threading-sub-categories'];
}
if (isset($_SESSION['specialty-sub-categories'])){
    $specialtySub = $_SESSION['specialty-sub-categories'];
}
// $holemakingSub = $_SESSION['holemaking-sub-categories'];
// $threadingSub = $_SESSION['threading-sub-categories'];
// $specialtySub = $_SESSION['specialty-sub-categories'];

function tool_sub($tool_type) {
    include 'db_connection.php';
    $tool_sub_sql = "SELECT 
        s.tool_sub_type
    FROM 
        master_series_data s
    WHERE 
        s.tool_type=?
    GROUP BY s.tool_sub_type
    ORDER BY
        s.tool_sub_type, s.id ASC";
    $stmt = $conn->prepare($tool_sub_sql);
    $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<option value='default'>Select a Sub Type</option>";
        while($row = $result->fetch_array()) {
            $sub_val = $row['tool_sub_type'];
            $sub_val_trim = str_replace(' ', '',$sub_val);
            echo "<option value='$sub_val'>$sub_val</option>";
            // echo "<option value='$sub_val_trim' class='$sub_val'>$sub_val</option>";
        }
    }
    
}
// echo "Tool Type carried to filter_queries: " . $tool_type . "<br>";

if ($tool_type == 'milling' && isset($millingSub)) {
    $sub_type = $millingSub;
    // echo 'here it is' . $tool_type;
 } else if ($tool_type == 'holemaking' && isset($holemakingSub) ) {
    $sub_type = $holemakingSub;
} else if ($tool_type == 'threading' && isset($threadingSub)) {
    $sub_type = $threadingSub;
} else if ($tool_type == 'specialty' && isset($specialtySub)) {
    $sub_type = $specialtySub;
}

// echo "Sub Type carried to filter_queries: " . $sub_type . "<br>"

function diameter_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $dia_sql = "SELECT DISTINCT cut_dia_in_display
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY cut_dia_in_display ASC";
    $stmt = $conn->prepare($dia_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $dia_val = $row['cut_dia_in_display'];
            if($dia_val != "") {
                
                echo "<option value='$dia_val'>$dia_val</option>";
            } else {
                continue;
            }  
        }
    }
}


function loc_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $loc_sql = "SELECT DISTINCT loc_in_display
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY loc_in_display ASC";
    $stmt = $conn->prepare($loc_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $loc_val = $row['loc_in_display'];
            if($loc_val != "") {
                echo "<option value='$loc_val'>$loc_val</option>";
            } else {
                continue;
            }  
        }
    }
}

// loc_filter($sub_type);

function oal_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $oal_sql = "SELECT DISTINCT oal_in_display
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY oal_in_display ASC";
    $stmt = $conn->prepare($oal_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $oal_val = $row['oal_in_display'];
            if($oal_val != "") {
                echo "<option value='$oal_val'>$oal_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function rad_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $rad_sql = "SELECT DISTINCT radius_in_display
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY radius_in_display ASC";
    $stmt = $conn->prepare($rad_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $rad_val = $row['radius_in_display'];
            if($rad_val != "") {
                echo "<option value='$rad_val'>$rad_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function flute_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $flute_sql = "SELECT DISTINCT flutes
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY ABS(flutes) ASC";
    $stmt = $conn->prepare($flute_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $flute_val = $row['flutes'];
            if($flute_val != "") {
                echo "<option value='$flute_val'>$flute_val</option>";
            } else {
                continue;
            }  
        }
    }
}
// flute_filter($sub_type);

function coating_filter($tool_type, $sub_type) {
    include 'db_connection.php';
    $coating_sql = "SELECT DISTINCT coating
    FROM master_product_data
    WHERE tool_type=?
    AND sub_type=?
    ORDER BY coating ASC";
    $stmt = $conn->prepare($coating_sql);
    $stmt->bind_param("ss", $tool_type, $sub_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $coating_val = $row['coating'];
            if($coating_val != "") {
                echo "<option value='$coating_val'>$coating_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function angle_filter($tool_type) {
    include 'db_connection.php';
    $angle_sql = "SELECT DISTINCT angle_display
    FROM master_product_data
    WHERE tool_type=?
    ORDER BY angle_display ASC";
    $stmt = $conn->prepare($angle_sql);
    $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $angle_val = $row['angle_display'];
            if($angle_val != "") {
                echo "<option value='$angle_val'>$angle_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function thread_size_filter() {
    include 'db_connection.php';
    $thread_size_sql = "SELECT DISTINCT taps_thread_size
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_thread_size ASC";
    $stmt = $conn->prepare($thread_size_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thread_size_val = $row['taps_thread_size'];
            if($thread_size_val != "") {
                echo "<option value='$thread_size_val'>$thread_size_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function thread_limit_filter() {
    include 'db_connection.php';
    $thread_limit_sql = "SELECT DISTINCT taps_thread_limit
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_thread_limit ASC";
    $stmt = $conn->prepare($thread_limit_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thread_limit_val = $row['taps_thread_limit'];
            if($thread_limit_val != "") {
                echo "<option value='$thread_limit_val'>$thread_limit_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function thread_chamfer_filter() {
    include 'db_connection.php';
    $thread_chamfer_sql = "SELECT DISTINCT taps_thread_length
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_thread_length ASC";
    $stmt = $conn->prepare($thread_chamfer_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thread_chamfer_val = $row['taps_thread_length'];
            if($thread_chamfer_val != "") {
                echo "<option value='$thread_chamfer_val'>$thread_chamfer_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function class_fit_filter() {
    include 'db_connection.php';
    $class_fit_sql = "SELECT DISTINCT taps_class_of_fit
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_class_of_fit ASC";
    $stmt = $conn->prepare($class_fit_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $class_fit_val = $row['taps_class_of_fit'];
            if($class_fit_val != "") {
                echo "<option value='$class_fit_val'>$class_fit_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function thread_cut_dia_filter() {
    include 'db_connection.php';
    $thread_cut_dia_sql = "SELECT DISTINCT taps_dia
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_dia ASC";
    $stmt = $conn->prepare($thread_cut_dia_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thread_cut_dia_val = $row['taps_dia'];
            if($thread_cut_dia_val != "") {
                echo "<option value='$thread_cut_dia_val'>$thread_cut_dia_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function od_filter() {
    include 'db_connection.php';
    $thread_od_sql = "SELECT DISTINCT taps_od1
    FROM master_product_data
    WHERE tool_type='THREADING'
    ORDER BY taps_od1 ASC";
    $stmt = $conn->prepare($thread_od_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thread_od_val = $row['taps_od1'];
            if($thread_od_val != "") {
                echo "<option value='$thread_od_val'>$thread_od_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function shape_filter() {
    include 'db_connection.php';
    $shape_sql = "SELECT DISTINCT sub_sub_type
    FROM master_product_data
    WHERE tool_type='SPECIALTY'
    AND sub_type='Burr'
    ORDER BY sub_sub_type ASC";
    $stmt = $conn->prepare($shape_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $shape_val = $row['sub_sub_type'];
            if($shape_val != "") {
                echo "<option value='$shape_val'>$shape_val</option>";
            } else {
                continue;
            }  
        }
    }
}
 
function shank_filter() {
    include 'db_connection.php';
    $shank_sql = "SELECT DISTINCT shank_dia_in_display
    FROM master_product_data
    WHERE tool_type='SPECIALTY'
    ORDER BY shank_dia_in_display ASC";
    $stmt = $conn->prepare($shank_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $shank_val = $row['shank_dia_in_display'];
            if($shank_val != "") {
                echo "<option value='$shank_val'>$shank_val</option>";
            } else {
                continue;
            }  
        }
    }
}
 
function thickness_filter() {
    include 'db_connection.php';
    $thickness_sql = "SELECT DISTINCT thickness
    FROM master_product_data
    WHERE tool_type='SPECIALTY'
    ORDER BY thickness ASC";
    $stmt = $conn->prepare($thickness_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $thickness_val = $row['thickness'];
            if($thickness_val != "") {
                echo "<option value='$thickness_val'>$thickness_val</option>";
            } else {
                continue;
            }  
        }
    }
}
 
function width_filter() {
    include 'db_connection.php';
    $width_sql = "SELECT DISTINCT width
    FROM master_product_data
    WHERE tool_type='SPECIALTY'
    ORDER BY width ASC";
    $stmt = $conn->prepare($width_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $width_val = $row['width'];
            if($width_val != "") {
                echo "<option value='$width_val'>$width_val</option>";
            } else {
                continue;
            }  
        }
    }
}

function designation_filter() {
    include 'db_connection.php';
    $designation_sql = "SELECT DISTINCT tool
    FROM master_product_data
    WHERE tool_type='SPECIALTY'
    AND sub_type='Burr'
    ORDER BY tool ASC";
    $stmt = $conn->prepare($designation_sql);
    // $stmt->bind_param("s", $tool_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $arr = [];
        echo "<option value='default'>Select</option>";
        while($row = $result->fetch_assoc()) {
            $designation_val = $row['tool'];
            if($designation_val != "") {
                echo "<option value='$designation_val'>$designation_val</option>";
            } else {
                continue;
            }  
        }
    }
}

?>