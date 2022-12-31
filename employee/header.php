<?php

 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {
 $username = $_SESSION['username'];  

 }  
 else  
 {  
      header("location:../index.php");  
 }  
 


require ('que/db.php');

$pdoQuery = "SELECT  * FROM product";
$res = $conn->query($pdoQuery);
$countproduct = $res->rowCount();


$pdoQuery = "SELECT  * FROM supplier";
$res = $conn->query($pdoQuery);
$countsupp = $res->rowCount();

$pdoQuery = "SELECT  * FROM costumer";
$res = $conn->query($pdoQuery);
$countcos = $res->rowCount();

$pdoQuery = "SELECT  * FROM category";
$res = $conn->query($pdoQuery);
$countcat = $res->rowCount();

$pdoQuery = "SELECT  * FROM request";
$res = $conn->query($pdoQuery);
$countreq = $res->rowCount();

$pdoQuery = "SELECT  * FROM installment";
$res = $conn->query($pdoQuery);
$countins = $res->rowCount();

$res1 = $conn->prepare('SELECT sum(p_newvalue) AS nv FROM product ');
$res1->execute();
$row = $res1->fetch(PDO::FETCH_ASSOC);
$expensescount =  $row['nv'];

$res2 = $conn->prepare('SELECT sum(py_payment) AS dd FROM payment ');
$res2->execute();
$row = $res2->fetch(PDO::FETCH_ASSOC);
$sscount =  $row['dd'];


?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Installment Management</title>
    <link rel="icon" href="../images/ye.gif" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";

      }
    }
  }
}
</script><style type="text/css">
  
  #pagination {
  text-align: center;
  margin-top: 20px;
}
#pagination a {
  border: 1px solid #CCCCCC;
  padding: 5px 10px;
  font-family: arial;
  text-decoration: none;
  background: none repeat scroll 0 0 #EEEEEE;
  color: #222222;
}
#pagination a:hover {
  background-color: #FFFFFF;
}
a#active{
  background-color: #FFFFFF;
}
</style>


<style type="text/css">
  
  #pagination {
  text-align: center;
  margin-top: 20px;
}
#pagination a {
  border: 1px solid #CCCCCC;
  padding: 5px 10px;
  font-family: arial;
  text-decoration: none;
  background: none repeat scroll 0 0 #EEEEEE;
  color: #222222;
}
#pagination a:hover {
  background-color: #FFFFFF;
}
a#active{
  background-color: #FFFFFF;
}
</style>


  </head>

  <body style="font-size: 12px">

		
		<div class="wrapper d-flex align-items-stretch" >
			<nav id="sidebar">
				<div class="p-4 pt-1">
		  	<a href="#" class="img logo rounded-circle mb-1" style="background-image: url(../images/ye.gif);" data-toggle="modal" data-target="#myModal"></a>
          <center><label  style="letter-spacing: 2px">HAHAHA</label></center>
         
          <hr style="border: 2px solid white">
	        <ul class="list-unstyled components mb-5" >
	          <li >
	        
                <a href="home.php"><span class="fa fa-home mr-3"></span>Home</a>
            </li>

            <li>
              <a href="#insSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-inbox mr-3"></span>Instalment</a>
              <ul class="collapse list-unstyled" id="insSubmenu">
                 <li>
                    <a href="installment.php"><span class="fa fa-caret-right mr-3"></span>Installment</a>
                </li>
                <li>
                    <a href="request.php"><span class="fa fa-caret-right mr-3"></span>Request <span class="badge badge-pill badge-danger"><?php echo $countreq; ?></span></a>
                </li>
                                
              </ul>
            </li>
	          
            <li>
              <a href="#settSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-cog mr-3"></span>Setting</a>
              <ul class="collapse list-unstyled" id="settSubmenu">
                 <!-- <li>
                    <a href="#"><span class="fa fa-caret-right mr-3"></span>Notification</a>
                </li> -->
                  <li>
                    <a href="logout.php"><span class="fa fa-caret-right mr-3"></span>logout</a>
                </li>
                
              </ul>
            </li>

             
	        </ul>



	        <div class="footer">
	        	 <center><label style="letter-spacing: 2px">Product Installment</label></center>
             	        </div>

	      </div>
    	</nav>


      <div id="content" class="p-4 p-md-5">
        
   

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>