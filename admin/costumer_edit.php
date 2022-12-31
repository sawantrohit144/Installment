<?php
include ('header.php');
?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `costumer` WHERE `z_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>  

<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Costumer Edit</h4>
   <hr>
  <div class="card-body">

            

 <form action="que/costumer_que.php" method="POST">
  <div class="form-group " >

 <input name="id" type="hidden" value="<?php echo $row['z_id']?>">

   <div class="row">
    <div class="col">
      <label>Id Number:</label>
      <input type="text" class="form-control" name="idnum" required value="<?php echo $row['z_idnum']?>">
    </div>
    <div class="col">
       <label>Lastname:</label>
      <input type="text" class="form-control" name="lastname" required value="<?php echo $row['z_lastname']?>">
    </div>
  </div>
  </div>
 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Firstname:</label>
      <input type="text" class="form-control" name="firstname" required value="<?php echo $row['z_firstname']?>">
    </div>
    <div class="col">
       <label>Mi:</label>
      <input type="text" class="form-control" name="mi" required value="<?php echo $row['z_mi']?>">
    </div>
     
  </div>
  </div>

 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Age:</label>
      <input type="number" class="form-control" name="age" required value="<?php echo $row['z_age']?>">
    </div>
    <div class="col">
       <label>Contact:</label>
      <input type="number" class="form-control" name="contact" required value="<?php echo $row['z_contact']?>">
    </div>
     
  </div>
  </div>
   <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Email:</label>
      <input type="text" class="form-control" name="email" required value="<?php echo $row['z_email']?>">
    </div>
    <div class="col">
       <label>Address:</label>
      <input type="text" class="form-control" name="address" required value="<?php echo $row['z_address']?>">
    </div>
     
  </div>
  </div>

<div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Postal:</label>
      <input type="text" class="form-control" name="postal" required value="<?php echo $row['z_postal']?>">
    </div>
    <div class="col">
       <label>Job:</label>
      <input type="text" class="form-control" name="job" required value="<?php echo $row['z_job']?>">
    </div>
    <div class="col">
       <label>Salary:</label>
      <input type="text" class="form-control" name="salary" required value="<?php echo $row['z_salary']?>">
    </div>
     
  </div>
  </div>

       <label>Status:</label>
      <input type="text" class="form-control" name="status" required value="<?php echo $row['z_status']?>">
    </div>
    


      <div class="modal-footer">
         <a href="costumer.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="editcostumer" style="font-size: 12px;">Save</button>
      </div>
      </form>
