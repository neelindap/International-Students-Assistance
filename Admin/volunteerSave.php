<?php	
	$name = urldecode($_REQUEST["name"]);
	$email = urldecode($_REQUEST["email"]);
	$phone = rawurldecode($_REQUEST["phone"]);
	$id = $_REQUEST["id"];

	// Create connection
    $conn = new mysqli("localhost","root","","isa");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE volunteers SET 
    			name = '".$name."',
    			email = '".$email."',
    			phone = '".$phone."' 
    			WHERE id = ".$id;

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>