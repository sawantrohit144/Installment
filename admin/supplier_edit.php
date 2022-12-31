<?php
include ('header.php');
?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `supplier` WHERE `s_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>  

<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Supplier Edit</h4>
   <hr>
  <div class="card-body">

            

 <form action="que/supplier_que.php" method="POST">
  <div class="form-group " >

 <input name="id" type="hidden" value="<?php echo $row['s_id']?>">

   <div class="row">
    <div class="col"> 
     
      <label>Id Number:</label>
      <input type="text" class="form-control" name="idnum" required value="<?php echo $row['s_idnum']?>">
    </div>
    <div class="col">
       <label>Lastname:</label>
      <input type="text" class="form-control" name="lastname" required value="<?php echo $row['s_lastname']?>">
    </div>
  </div>
  </div>
 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Firstname:</label>
      <input type="text" class="form-control" name="firstname" required value="<?php echo $row['s_firstname']?>">
    </div>
    <div class="col">
       <label>Mi:</label>
      <input type="text" class="form-control" name="mi" required value="<?php echo $row['s_mi']?>">
    </div>
     
  </div>
  </div>

 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Age:</label>
      <input type="number" class="form-control" name="age" required value="<?php echo $row['s_age']?>">
    </div>
    <div class="col">
       <label>Contact:</label>
      <input type="number" class="form-control" name="contact" required value="<?php echo $row['s_contact']?>">
    </div>
     
  </div>
  </div>
   <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Email:</label>
      <input type="text" class="form-control" name="email" required value="<?php echo $row['s_email']?>">
    </div>
    <div class="col">
       <label>Address:</label>
      <input type="text" class="form-control" name="address" required value="<?php echo $row['s_address']?>">
    </div>
     
  </div>
  </div>

       <label>Company:</label>
      <input type="text" class="form-control" name="company" required value="<?php echo $row['s_company']?>">
    </div>

      <div class="modal-footer">
         <a href="stock.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="editsupplier" style="font-size: 12px;">Save</button>
      </div>
      </form>
