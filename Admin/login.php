<?php

session_start();
$uName = $_POST['name'];
$pWord = md5($_POST['pwd']);
$qry = "SELECT username FROM userData WHERE username='".$uName."' AND pass='".$pWord."'";
$res = mysql_query($qry);
$num_row = mysql_num_rows($res);
$row=mysql_fetch_assoc($res);
if( $num_row == 1 ) {
	echo 'true';
	$_SESSION['uName'] = $row['username'];
	$_SESSION['oId'] = $row['orgid'];
	$_SESSION['auth'] = $row['oauth'];
	}
else {
	echo 'false';
}

?>