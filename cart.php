<?php
// start the session
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JavaJam Home</title>
    <link rel="stylesheet" type="text/css" href="css\javacoffee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
     
</head>

<body id="wrapper">
    <section class="row">
        <div id="navContainer" class="col-xs-12 col-md-3 col-lg-2">
            <img src="images/javajamlogo.jpg" width="100%" alt="">
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="music.php">Music</a></li>
                    <li><a href="jobs.html">Jobs</a></li>
                    <li><a href="gear.php">Gear</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="placeyourorder.php">Order</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <section>
                <header>
                    <h1>JavaJam Coffee House</h1>
                </header>
            </section>
           <!-- <section>
                <img src="images/sofa.jpg" width="100%" alt="">
            </section>-->
            <article>
                <p id="h5Gear"><b>Shopping Cart</b></p>
                <section>
                            <?php 
                                # connect to db
                                include 'db_connection.php';
                                $con = OpenCon();
                                echo '<table class ="cartTable">';
                                echo '<tr class="cartTR" ><th> <b> Description </b></th><th> <b> Quantity </b></th><th> <b> Price </b></th></tr>';
                                $qty1 = 1;
                                $qty =1;
                                $cost1 = 0;

                                if(isset($_POST["submit"]))
                                {
                                    if(isset($_POST["desc0"])){
                                        echo '<tr>';
                                        echo '<td>'.$_POST["desc0"] .'</td>';
                                        $_SESSION['cost0'] = $_POST["cost0"];
                                        $_SESSION['desc0'] = $_POST["desc0"]; 
                                        /*0echo "before Product";-*/
                                        $_SESSION['Product'] = '0';
                                        if(isset($_SESSION['Qty'])){
                                            $_SESSION['Qty'] = $_SESSION['Qty'] + 1;
                                            $qty1 = $_SESSION['Qty'];   
                                        }
                                        else{
                                            $_SESSION['Qty'] = 1;
                                            $qty1 = $_SESSION['Qty'];
                                        }
                                        echo '<td> '.$qty1. '</td>';
                                        $cost1 = $_SESSION["cost0"] * $qty1;
                                        echo '<td>'.$cost1 .'</td>';
                                        echo '</tr>';
                                        if(isset($_SESSION["desc1"])){
                                            echo '<tr>';
                                            echo '<td>'.$_SESSION["desc1"] .'</td>';
                                            /*$_SESSION['cost1'] = $_POST["cost1"];
                                            $_SESSION['desc1'] = $_POST["desc1"]; 
                                            $_SESSION['Product'] = '1';*/
                                            $qty = $_SESSION['Qty1'];
                                            echo '<td> '.$qty. '</td>';
                                            $cost1 = $_SESSION["cost1"] * $qty;
                                            echo '<td>'.$cost1.'</td>';
                                            echo '</tr>';   
                                            /*echo "Second - ".$_SESSION['Qty1'];*/
                                        }
                                    }/* end of first*/

                                    if(isset($_POST["desc1"])){
                                        echo '<tr>';
                                        echo '<td>'.$_POST["desc1"] .'</td>';
                                        $_SESSION['cost1'] = $_POST["cost1"];
                                        $_SESSION['desc1'] = $_POST["desc1"]; 
                                        $_SESSION['Product'] = '1';
                                       if(isset($_SESSION['Qty1'])){
                                            $_SESSION['Qty1'] = $_SESSION['Qty1'] + 1;
                                            $qty = $_SESSION['Qty1'];
                                        }
                                        else{
                                            $_SESSION['Qty1'] = 1;
                                            $qty = $_SESSION['Qty1'];
                                        }
                                        echo '<td> '.$qty. '</td>';
                                        $cost1 =  $qty * $_POST["cost1"];
                                        echo '<td>'.$cost1 .'</td>';
                                        echo '</tr>';   
                                        if(isset($_SESSION["desc0"])){
                                            echo '<tr>';
                                            echo '<td>'.$_SESSION["desc0"] .'</td>';
                                            /*$_SESSION['cost1'] = $_POST["cost1"];
                                            $_SESSION['desc1'] = $_POST["desc1"]; 
                                            $_SESSION['Product'] = '1';*/
                                            $qty = $_SESSION['Qty'];
                                            echo '<td> '.$qty. '</td>';
                                            $cost1 = $qty * $_SESSION["cost0"];
                                            echo '<td>'.$cost1.'</td>';
                                            echo '</tr>';   
                                            /*echo "First - ".$_SESSION['Qty'];*/
                                        }
                                        /*echo $_SESSION['Qty1'];*/
                                    }/* end of second*/
                                }
                                $total = 0;
                                if(isset($_SESSION['Qty1']) && isset($_SESSION['Qty'])){
                                    $total = $_SESSION['Qty1'] * $_SESSION["cost1"] + $_SESSION['Qty'] * $_SESSION["cost0"];
                                }else{
                                    if(isset($_SESSION['Qty1'])){
                                      $total = $_SESSION['Qty1'] * $_SESSION["cost1"];  
                                  }else{
                                    if(isset($_SESSION['Qty'])){
                                        $total = $_SESSION['Qty'] * $_SESSION["cost0"];
                                    }
                                  }
                                }  
                                echo '<tr><td></td><td>Total</td><td>'.$total.'</td>';
                                echo '</table>'; 
                                # close the connection    
                                CloseCon($con);
                            ?>
                            <div class="rowCart">
                                <div class="columnCart"><br>
                                    <form method="post" action="http://localhost/javajam/gear.php">
                                        <input type="submit" name="submit" value="Continue Shopping" class="cartButton2">
                                    </form>
                                </div>
                                <div class="columnCart"><br>
                                    <form method="post" action="http://localhost/javajam/placeyourorder.php">
                                        <input type="submit" name="Place Order" value="Place Order" class="cartbutton1" >
                                    </form>
                                </div>
                            </div>
                                
                </section>
            </article>
    </section>
    <section class="row">
        <footer class="col-sm-12">
            <div>Copyright &copy 2018 JavaJam Coffee House</div>
            <a href="mailto:shreyas@duraphe.com">shreyas@duraphe.com</a>
        </footer>
    </section>
</body>
</html>