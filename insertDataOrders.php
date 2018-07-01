<?php
    session_start();
	# connect to db
	include 'db_connection.php';
	$con = OpenCon();
    
    $nm = $_GET["nm"];
    $em = $_GET["em"];
    $adds = $_GET["add"];
 	$city = $_GET["city"];
 	$state = $_GET["state"];
 	$zip = $_GET["zip"];
 	$credit = $_GET["cred"];
 	$month = $_GET["mon"];
 	$year = $_GET["year"];
    $product = "";
    $product1 = "";
    $qty = 0;
    $qty1 = 0;
    if(isset($_SESSION['desc0']))
    {
        $product = $_SESSION['desc0'];
        $qty = $_SESSION["Qty"];
    }
    if(isset($_SESSION['desc1'])){
        $product1 = $_SESSION['desc1'];
        $qty1 = $_SESSION["Qty1"];
    }
    /*
    $qty1 = $_GET["qty"];
    $qty2 = $_GET["qty1"];
    $product2 = $_GET["product1"];*/

 	mysqli_autocommit($con,FALSE);

    # execute the query
    mysqli_query($con,"INSERT INTO orders VALUES (DEFAULT,'$nm','$em','$adds','$city','$state','$zip','$credit','$month','$year','$product','$qty','$product1','$qty1')");
    mysqli_commit($con);
        
    #close connection
    CloseCon($con);
?>