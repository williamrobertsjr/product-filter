<?php 


$sql_milling = "SELECT * FROM `master_product_data` 
WHERE tool_type='MILLING'";
$result = $conn->query($sql_milling);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo"<tr><td>" . $row["part"] . "</td>";
echo"<td>" . $row["series"] . "</td>";
echo"<td>" . $row["family"] . "</td>";
echo"<td>" . $row["brand"] . "</td>";
// echo"<td>" . $row["tool_type"] . "</td></tr>";
}
} else {
echo "No Results";
}
$conn->close();

?>
