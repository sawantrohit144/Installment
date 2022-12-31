<?php
include ('header.php');




$dtt = date("l");


// if ($dtt = "Sunday")
// {
// 		echo "<script>alert('Hello Costumer The Payment Section Is close!');
// 					  window.location.href='installment.php';
// 					  </script>";
// }


$dt = date("y");

$randd = rand(1000,9999);

$transac =  "$dt". "00" . "$randd";




?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `installment` WHERE `i_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }

      ?>

      

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Payment Form</h4>
   <hr>
  <div class="card-body">
            
 <form action="que/installment_que.php" method="POST">
  <div class="form-group " >

     <input name="id" type="hidden" value="<?php echo $row['i_id']?>">

   <div class="row">
    <div class="col">
      <label>Transaction ID:</label>
      <input type="text" class="form-control" name="transacid" required value="<?php echo $row['i_transactionid'] ?>" readonly>
    </div>
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="productid" required value="<?php echo $row['i_productid']?>" readonly>
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="costumerid" required value="<?php echo $row['i_costumerid']?>" readonly>
    </div>
  </div>
  </div>




 <div class="form-group ">
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" required value="<?php echo $row['i_order']?>" readonly>
    </div>
    <div class="col">
       <label>Price:</label>
      <input type="number" class="form-control" id="price" name="price" required value="<?php echo $row['i_value']?>" readonly>
    </div>



    <div class="col">
      <label>balance:</label>
      <input type="number" class="form-control" name="balance" id="balance" value="<?php echo $row['i_balance']?>" required readonly>
    </div>
     
  </div>
</div>


 <div class="form-group " >
   <div class="row">
    <div class="col">
       <label>Monthly Payment:</label>
      <input type="number" class="form-control" id="mp" name="mp" readonly="" value="<?php echo $row['i_mp']?>">
    </div>
    <div class="col">
       <label>Tax:</label>
      <input type="number" class="form-control" id="tax" name="tax" readonly="" value="<?php echo $row['i_tax']?>">
    </div>
      <div class="col">
       <label>Enter Year/s To Pay ( 1 to 3 ):</label>
      <input type="number" class="form-control" id="yr" name="yr" readonly="" value="<?php echo $row['i_year']?>">
    </div>
</div>
</div>


<div class="form-group " >
   <div class="row">
    <div class="col">
       <label>Date:</label>
      <input type="text" class="form-control" id="date" name="date" readonly="" value="<?php echo date("m/d/Y") ; ?>">
    </div>
    <div class="col">
       <label>Penalty:</label>
      
<select name="penalty" id="penalty" class="form-control">
  <option value="0">0</option>
  <option value="1 month">100</option>
  <option value="2 months">200</option>
  <option value="3 months">300</option>
  <option value="4 months">400</option>
</select>  </div>
      <div class="col">
       <label>Enter Montly Payment:</label>
      <input type="number" class="form-control" id="mpp" step="any" name="mpp" >
    </div>
</div>
</div>


   
    </div>


<br>

      <div class="modal-footer">
         <a href="installment.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" value="Validate" onclick="return Validate()" name="savepay" style="font-size: 12px;">Save</button>

      </div>

      
      </form>
</div>
</div>
</div>
  