
<?php include ('header.php')?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <!-- Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active"><span class="fa fa-registered mr-3"></span>Product Inforamtion Form</a>
                </li>
              </ul>
              <ul class="nav navbar-nav ml-auto">
           
                  <li class="nav-item">
                    <a class="nav-link active" href="product_add.php"><span class="fa fa-plus mr-3"></span>Add Product...</a>
                </li>
             
                  <li class="nav-item">
                    <a class="nav-link active" href="logout.php"><span class="fa fa-sign-out mr-3"></span>Logout...</a>
                </li>

              </ul>
            </nav>
<!-- End Navbar -->

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `product` WHERE `p_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>

 <form action="que/product_que.php" method="POST">
     <input name="id" type="hidden" value="<?php echo $row['p_id']?>">
  <div class="form-group " >
  
      <label>Code :</label>
      <?php echo $row['p_code']?>
      <hr>
    </div>
    <div class="form-group " >
       <label>Product Name :</label>
     <?php echo $row['p_name']?>
     <hr>
    </div>

  <div class="form-group">
  <label >Category :</label>
 <?php echo $row['p_category']?>
 <hr>
</div>
    <div class="form-group">
    <label >Description :</label>
    <?php echo $row['p_description']?>
    <hr>
  </div>
    <div class="form-group " >
        <label>Quantity :</label>
     <?php echo $row['p_quantity']?>
   <hr>
    </div>
   <div class="form-group " >
        <label>Price :</label>
     <?php echo $row['p_value']?>
     <hr>
    </div>
   <div class="form-group " >
        <label>Price :</label>
     <?php echo $row['p_color']?>
     <hr>
    </div>
   
     <div class="form-group " >
        <label>Status :</label>
     <?php echo $row['p_status']?>
    </div>


  


      <div class="modal-footer">
         <a href="product.php"> <button type="button" class="btn btn-secondary">Close</button></a>

        <a href="register_product_edit.php?id=<?php echo $row['m_id']?>"><button type="button" class="btn btn-primary" >Update</button></a>
        <a href="conn/product_que.php?id=<?php echo $row['m_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['m_code']?>?')"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
      </form>
</body>
</html>