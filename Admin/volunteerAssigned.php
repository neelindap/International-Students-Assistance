<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT v.name as vname, t.name, t.travelDate ,t.email, t.phone from traveldata t inner join volunteers v ON v.id = t.volunteerAssigned WHERE t.volunteerAssigned != 0";

$result = mysqli_query($conn, $sql);

$rows = array();
while($temp = mysqli_fetch_assoc($result)) {
    $rows[] = $temp;
}
echo json_encode($rows);

?>