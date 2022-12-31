<?php
include ('header.php');





$dt = date("y");

$randd = rand(1000,9999);

$transac =  "$dt". "00" . "$randd";


?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `request` WHERE `r_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Approve Form</h4>
   <hr>
  <div class="card-body">
            
 <form action="que/request_que.php" method="POST">
  <div class="form-group " >

     <input name="id" type="hidden" value="<?php echo $row['r_id']?>">

   <div class="row">
    <div class="col">
      <label>Transaction ID:</label>
      <input type="text" class="form-control" name="transacid" required value="<?php echo $row['r_transactionid'] ?>" readonly>
    </div>
    <div class="col">
      <label>Product ID:</label>
      <input type="text" class="form-control" name="productid" required value="<?php echo $row['r_productid']?>" readonly>
    </div>
    <div class="col">
      <label>Costumer ID:</label>
      <input type="text" class="form-control" name="costumerid" required value="<?php echo $row['r_costumerid']?>" readonly>
    </div>
    
  </div>




 <div class="form-group ">
   <div class="row">
    <div class="col">
        <label>Order:</label>
      <input type="number" class="form-control" name="order" required value="<?php echo $row['r_quantity']?>" readonly>
    </div>
    <div class="col">
       <label>Price:</label>
      <input type="number" class="form-control" id="price" name="price" required value="<?php echo $row['r_price']?>" readonly>
    </div>
 
  </div>
</div>


 <div class="form-group " >
   <div class="row">
    <div class="col">
       <label>Total Price:</label>
      <input type="number" class="form-control" id="total" name="total" value="<?php echo $row['r_total']?>" readonly="">
    </div>
    <div class="col">
       <label>Tax:</label>
      <input type="number" class="form-control" id="tax" value="<?php echo $row['r_tax']?>" name="tax" readonly="">
    </div>
      <div class="col">
       <label>Enter Year/s To Pay ( 1 to 3 ):</label>
      <input type="number" class="form-control" id="yr" name="yr" value="<?php echo $row['r_year']?>" min="1" max="3" readonly>
    </div>
</div>
</div>



  <div class="form-group " >
       <div class="row">
    <div class="col">
      <label>Monthly Payment:</label>
      <input type="text" class="form-control" id="mp" name="mp" readonly value="<?php echo $row['r_montly']?>" required>
    </div>
<div class="col">
      <label>Down Payment:</label>
      <input type="text" class="form-control" id="dp" name="dp" readonly required="" value="<?php echo $row['r_downpayment']?>">
    </div>

    </div>
  </div>

  <div class="form-group " >
       <div class="row">
    <div class="col">
      <label>Enter Down Payment Value:</label>
      <input type="text" class="form-control"  id="dpp" name="dpp"  required="">
    </div>
</div>

<br>

      <div class="modal-footer">
         <a href="request.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="approvereq" style="font-size: 12px;">Save</button>

      </div>

      
      </form>
</div>
</div>
</div>
  