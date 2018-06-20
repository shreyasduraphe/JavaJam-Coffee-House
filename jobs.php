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
                        <?php
                      /*echo "php me";*/
                        if(isset($_POST["submit"])){
                            /*echo "submit me";*/
                            $name = trim($_POST["myName"]);
                            $email = trim($_POST["myEmail"]);
                            $experience = trim($_POST["myComments"]);
                            /*echo "fuck you!";*/
                            $errorMsg = "";
                            $code1 = $code2 = $code3 = 0;
                            if($name =="") {
                                 echo "<p> - Error : Name cannot be empty !</p>";
                                 $code = 1;
                            } /* name */
                            if($experience == ""){
                                echo "<p> - Error : Experience cannot be empty !</p>";
                            } /* experience */
                            if($email == ""){
                                echo "<p> - Error : Email cannot be empty !</p>";
                            }else{
                                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
                                        echo "<p>- Error : invalid Email !</p>";   
                                        $code3 = 1;
                                    }
                            }/* invalid email */
                            try{
                            if($name == "" || $email != "" || $code3 == 1 || $experience == ""){
                                $code1 = 0;
                            }else{
                                    # connect to db
                                    include 'db_connection.php';
                                    $con = OpenCon();
                                    mysqli_autocommit($con,FALSE);

                                    # execute the query
                                    mysqli_query($con,"INSERT INTO jobs VALUES (DEFAULT,'$name','$email','$experience')");
                                    mysqli_commit($con);
                                    echo "Your Application is Submitted Successfully !";
                                    #close connection
                                    CloseCon($con);

                            }
                        }catch(Exception $e){

                        }
                        } /* is submit */
                    ?>
    <section class="row">
        <div id="navContainer" class="col-xs-12 col-md-3 col-lg-2">
            <img src="images/javajamlogo.jpg" width="100%" alt="">
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="music.html">Music</a></li>
                    <li><a href="jobs.php">Jobs</a></li>
                    <li><a href="gear.php">Gear</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-10">
            <section>
                <header id="jobsHeader">
                    <h1>JavaJam Coffee House</h1>
                </header>
            </section>
            <?php 
            if (isset($errorMsg)) 
                { 
                    echo "<p>" .$errorMsg. "</p>" ;
                } 
            ?>
            <main>
                <article>
                    <section>
                        <h2 id="menuH2">Jobs at JavaJam</h2>
                    </section>
                    <section class="musicData">
                        <p>Want to work at JavaJam? Fill out the form below to start your application. Required
                        fields are marked with (*).</p>
                    </section>

                    <section>
                        <form method="post" action="">
                            <!-- <form> -->
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>*Name:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="text" name="myName" id="myName"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>*E-mail:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><input type="E-mail" name="myEmail" id="myEmail" ></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-1 text-right"><label>*Experience:</label></div>
                                <div class="col-x-12 col-md-5 col-lg-5"><textarea name="myComments" id="myComments" rows="2" cols="20"></textarea></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" name="submit" value="Apply Now">
                                </div>
                            </div>
                      </form>
                    </section>
                </article>
            </main>
    </section>
    <section class="row">
        <footer class="col-sm-12">
            <div>Copyright &copy 2018 JavaJam Coffee House</div>
            <a href="mailto:shreyas@duraphe.com">shreyas@duraphe.com</a>
        </footer>
    </section>
</body>
</html> 