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

$sql = "SELECT * FROM volunteers";
$result = mysqli_query($conn, $sql);

$rows = array();
while($temp = mysqli_fetch_assoc($result)) {
    $rows[] = $temp;
}
echo json_encode($rows);

// SELECT v.name, t.name, t.travelDate ,t.email, t.phone from traveldata t inner join volunteers v ON v.id = t.volunteerAssigned


?>