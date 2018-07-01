<?php 
	# connect to db
	include 'db_connection.php';
	$con = OpenCon();

	#get variable values as passed by js
        echo "here!";
        $nm = $_GET["nm"];
        $em = $_GET["em"];
        $exp = $_GET["exp"];
        mysqli_autocommit($con,FALSE);

        # execute the query
        mysqli_query($con,"INSERT INTO jobs VALUES ('0','$nm','$em','$exp')");
        mysqli_commit($con);
        
        #close connection
        CloseCon($con);
?>