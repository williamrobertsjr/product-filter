<?php 
$row = '1';
$partNum = '';

// Open the instaquote file with qty and price info
$file = fopen("https://www.gwstoolgroup.com/docs/instaquote.csv", "r");

// echo '<table>';
// Fetch data from $file row by row
fgetcsv($file);
while(($data = fgetcsv($file, 200)) !== false) {
    $stockPart = $data[0];
        $price = $data[2];
        $stock = $data[4];
        $stockSeries = $data[6];
        
//    foreach ($data as $value) {
//         $stockPart = $data[0];
//         $price = $data[2];
//         $stock = $data[4];
//    }
    if($series == $stockSeries) {
        if($part == $stockPart) {
            echo '<td>' . $stock . '</td>';
            echo '<td>' . $price . '</td>';
        }
    }
   
     
    }
// echo '</table>';
// fclose($file); ?>
