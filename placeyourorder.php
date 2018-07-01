<?php
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
     
    <script type="text/Javascript" src="jobs.js"></script>

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
            
            <article>
                              <h5 id="h5Gear"><Strong>Shopping Cart<strong></h5>
                <section>
                            <?php 
                                # connect to db
                                include 'db_connection.php';
                                $con = OpenCon();
                                echo '<table class ="cartTable">';
                                echo '<tr class="cartTR" ><th> <b> Description </b></th><th> <b> Quantity </b></th><th> <b> Price </b></th></tr>';
                                if(isset($_SESSION['desc0']))
                                {
                                    echo '<tr>';
                                    echo '<td id = "product">'.$_SESSION['desc0'] .'</td>';
                                    echo '<td id = "qty"> '.$_SESSION['Qty'].' </td>';
                                    echo '<td id = "price">'.$_SESSION['cost0'] .'</td>';
                                    echo '</tr>';
                                    if(isset($_SESSION['desc1'])){
                                        echo '<tr>';
                                        echo '<td id = "product1">'.$_SESSION['desc1'] .'</td>';
                                        echo '<td id = "qty1"> '.$_SESSION['Qty1'].' </td>';
                                        echo '<td id = "price1">'.$_SESSION['cost1'] .'</td>';
                                        echo '</tr>';
                                    }
                                }else{
                                    echo '<tr>';
                                    echo '<td id = "product">'.$_SESSION['desc1'] .'</td>';
                                    echo '<td id = "qty"> '.$_SESSION['Qty1'].' </td>';
                                    echo '<td id = "price">'.$_SESSION['cost1'] .'</td>';
                                    echo '</tr>';
                                    if(isset($_SESSION['desc0'])){
                                        echo '<tr>';
                                        echo '<td id = "product1">'.$_SESSION['desc0'] .'</td>';
                                        echo '<td id = "qty1"> '.$_SESSION['Qty0'].' </td>';
                                        echo '<td id = "price1">'.$_SESSION['cost0'] .'</td>';
                                        echo '</tr>';
                                    }
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
                                    }/*end of if inner*/
                                  }/*end of else inner*/
                                }/*end of if outer*/  
                                echo '<tr><td></td><td>Total</td><td>'.$total.'</td>';
                                echo '</table>'; 
                                # close the connection    
                                CloseCon($con);
                            ?>
                </section>
                <section>
                    <form>
                        <fieldset>
                            <legend>Fill Details:</legend>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Name:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myName" id="myName" ></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>E-mail:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="E-mail" name="myEmail" id="myEmail"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Address:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myAddress" id="myAddress"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>City:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myCity" id="myCity"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>State:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myState" id="myState"></div>
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Zip:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myZip" id="myZip"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Credit Card:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myCredit" id="myCredit"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Expire Month:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myMonth" id="myMonth"></div>
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>Year:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myYear" id="myYear"></div>
                            </div>
                            <input type="button" name="Place Order" value="Place Order" onclick="insertOrdersToDb()">
                        </fieldset>
                    </form>
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