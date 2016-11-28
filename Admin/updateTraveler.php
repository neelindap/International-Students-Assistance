<?php

    $volunteerId = $_REQUEST["volunteerId"];
    $travelerIds = $_REQUEST["travelerIds"];

    // Create connection
    $conn = new mysqli("localhost","root","","isa");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = 'UPDATE traveldata SET volunteerAssigned = '.$volunteerId.' WHERE id IN ('.$travelerIds. ')';

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>