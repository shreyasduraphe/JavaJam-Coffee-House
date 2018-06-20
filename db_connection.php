<?php
	# function to connect to mysql
	function OpenCon()
	{
		# Create connection String
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "java";	
		
		# connect to the database
		$conn = new mysqli($dbhost,$dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
		return $conn;
	}
	
	# functio to close the database connection
	function CloseCon($conn)
	{
		$conn -> close();
	}
?>