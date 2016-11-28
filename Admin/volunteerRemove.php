<?php

    $id = $_REQUEST["id"];

    // Create connection
    $conn = new mysqli("localhost","root","","isa");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = 'DELETE FROM volunteers WHERE id  = '.$id;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>