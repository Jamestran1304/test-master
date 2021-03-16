<?php
/* Attempt Heroku Postgres connection 
	Assuming you are running Heroku Postgres add-on
	with default setting*/
	$link = pg_connect("host=ec2-34-234-228-127.compute-1.amazonaws.com 
	dbname=d5h9cjhocvtg35 port=5432 
	user=hrzkrwxbergaea 
	password=7aa76c616ffb103f2b31405631d732a94fdc6447c8a8cadabc3d815a5ef1f0b9 
	sslmode=require");
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}
	
	$customername = $_REQUEST['customername'];
	$gender = $_REQUEST['gender'];
	$dob = $_REQUEST['dob'];

	// Attempt insert query execution
	$sql = "INSERT INTO customer(customer_name, gender, dob) VALUES ('$customername','$gender', '$dob')";
	
	if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql" . pg_error($link);
	}
	
	// Close connection
	pg_close($link);
?>