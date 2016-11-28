<?php
    $con = mysqli_connect("localhost","root","","isa") or die('Could not connect: ' . mysql_error());
    //mysql_select_db("isa", $con);

    // use prepare statement for insert query
    //$stmt = mysqli_prepare($con, 'INSERT INTO traveldata(id, name, travelDate, email, phone, volunteerAssigned) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt = mysqli_prepare($con, 'INSERT INTO volunteers(id, name, email, phone) VALUES (?, ?, ?, ?)');

    // bind variables to insert query params
    //mysqli_stmt_bind_param($stmt, 'isssss', $id, $name, $travelDate, $email, $phone, $volunteerAssigned);
    mysqli_stmt_bind_param($stmt, 'isss', $id, $name, $email, $phone);

    // read json file
    //$filename = 'data.json';
    $filename = 'volunteer.json';
    $json = file_get_contents($filename);   

    //convert json object to php associative array
    $data = json_decode($json, true);

    // loop through the array
    foreach ($data as $row) {

        // get the employee details
        $id = $row['id'];
        $name = $row['name'];
        //$travelDate = $row['travelDate'];
        $email = $row['email'];
        $phone = $row['phone'];
        //$volunteerAssigned = $row['volunteerAssigned']; 
        
        // execute insert query
        mysqli_stmt_execute($stmt);
        //printf("inserted");
    }
    
    //mysqli_commit($con);
    //close connection
    mysqli_close($con);

?>