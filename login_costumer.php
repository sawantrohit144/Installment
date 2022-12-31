<?php


session_start();
$host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "product_installment";  
 $message = "";  
 try  
 {  
  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["in"]))  
      {  
               if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = 'All fields are required';  
           }  
           else  
           {  
                $query = "SELECT * FROM costumer WHERE z_idnum = :username AND z_pass = :password  " ;  
                $statement = $connect->prepare($query);
                $statement->execute( 
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                         
                     )  
                );  
                $count = $statement->rowCount();  
        

                if($count > 0)  
                {  

                  $_SESSION["username"] = $_POST["username"];  
                  header("location:costumer/home.php");                 
                }  
                else  
                {  
                     $message = 'Wrong Data';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

?>

<link rel="icon" href="../images/ye.gif" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

 <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                  <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="images/ye.gif" style="width: 30px; height: 30px" alt="..." /> HAHAHA</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php"><span class="fa fa-user mr-2"></span> Register</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="select.php"><span class="fa fa-sign-in mr-2"></span> Login</a></li>
                   </ul>
                </div>
            </div>
        </nav>

<div class="center" align="center" style="margin: 10% 0;">

<form  method="POST" style="width: 30%">
        <h2 class="text-center">Log in</h2><br>  

        <div class="form-group">
            <input type="text" class="form-control" placeholder="username" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="in">Log in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>        
    </form>

     <?php  
                if(isset($message))  
                {  
                     echo '<center><label class="text-danger" style="background-color: black; width: 200px">'.$message.'</label></center>';  
                }  
                ?>  
</div>

<div class="footer">
    <center><label>Costumer Form</label></center>
</div>