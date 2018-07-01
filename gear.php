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
                </ul>
            </nav>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <section>
                <header>
                    <h1>JavaJam Coffee House</h1>
                </header>
            </section>
            <section>
                <img src="images/sofa.jpg" width="100%" alt="">
            </section>
            <article>
                <section>
                    <h2 id="menuH2">JavaJam Gear</h2>
                </section>
                <section class="menuData">
                    <p>JavaJam gear  not only liiks good, it's good at your wallet too. </p>
                    <p>Get a 10% discount when you wear a JavaJam shirt or bring in your JavaJam mug!</p>
                </section>
                <section>

                            <?php 
                                # connect to db
                                include 'db_connection.php';
                                $con = OpenCon();
                                #get variable values as passed by js
                                $sql = "SELECT ProductId, Name, Description, Product_Image_URL, price FROM products";
                                $result = mysqli_query($con,$sql);
                                $pro1 = 0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '<div class="rowGear">';
                                        echo '<div class = "columnGear"><img src="'.$row["Product_Image_URL"].'"></div>';
                                        echo '<div class = "innerDiv"><p>'.$row["Description"].'</p>';
                                        echo '<form method="post" action="http://localhost/javajam/cart.php" class="gearForm">';
                                        echo '<input type="hidden" name="desc'.$pro1.'" id="desc'.$pro1.'" value="'.$row["Name"].'">';
                                        echo '<input type="hidden" name="cost'.$pro1.'" id="cost'.$pro1.'" value="'.$row["price"].'">';
                                        echo '<input type="submit" name = "submit" value ="Add to Cart">';
                                        $pro1 = $pro1 + 1;
                                        echo '</form>';
                                        echo '</div>';
                                        echo '</div>';
                                    }// end of while
                               } //end of if

                            CloseCon($con);
                            ?>

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