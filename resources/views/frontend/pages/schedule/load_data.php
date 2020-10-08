<?php
$mysqli = new mysqli("127.0.0.1:3308", "root", "", "hv_beauty");
if($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT se_name
FROM hv_service WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $se_name, $se_status, $se_spa_id);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CompanyName</th>";
echo "<td>" . $se_name . "</td>";
echo "</table>";
?>
