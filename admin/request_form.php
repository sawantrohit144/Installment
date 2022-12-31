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
          $sql = $conn->prepare("SELECT * FROM `product` WHERE `p_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>

      

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Request Form</h4>
   <hr>
  <div class="card-body">
            
 <form action="que/request_que.php" method="POST">
  <div class="form-group " >

     <input name="id" type="hidden" value="<?php echo $row['p_id']?>">

   <div class="row">
    <div class="col">
      <label>Transaction ID:</label>
      <input type="text" class="form-control" name="transacid" required value="<?php echo $transac; ?>" readonly>
    </div>
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="productid" required value="<?php echo $row['p_code']?>" readonly>
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="name" required value="<?php echo $row['p_name']?>" readonly>
    </div>
  </div>
  </div>




 <div class="form-group ">
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" required value="<?php echo $row['p_quantity']?>" readonly>
    </div>
    <div class="col">
       <label>Price:</label>
      <input type="number" class="form-control" id="price" name="price" required value="<?php echo $row['p_mprice']?>" readonly>
    </div>



    <div class="col">
      <label>Order:</label>
      <input type="number" class="form-control" name="order" id="order" required>
    </div>
     
  </div>
</div>


 <div class="form-group " >
   <div class="row">
    <div class="col">
       <label>Total Price:</label>
      <input type="number" class="form-control" id="total" name="total" readonly="">
    </div>
    <div class="col">
       <label>Tax:</label>
      <input type="number" class="form-control" id="tax" name="tax" readonly="">
    </div>
      <div class="col">
       <label>Enter Year/s To Pay ( 1 to 3 ):</label>
      <input type="number" class="form-control" id="yr" name="yr" min="1" max="3">
    </div>
</div>
</div>

<script>

    $('#order').keyup(function(){
    var price;
    var order;
    price = parseFloat($('#price').val());
    order = parseFloat($('#order').val());
    var total = price * order;
    var tae = total * .025;
    var taemo = total - tae;
    var tax = total - taemo;
    $('#tax').val(tax.toFixed(2));
    $('#total').val(total.toFixed(2));
    });

</script>


<!-- Get Monthly & Downpayment -->
    <script>


    $('#yr').keyup(function(){
    var yr;
    var total;
    total = parseFloat($('#total').val());
    yr = parseFloat($('#yr').val());
  
    var dp = total * .40;
    var dpp =  total - dp;

if (yr == 1){

    yr = 12;

}else if (yr == 2){

    yr = 24;

}else if (yr == 3){

    yr = 36;

}else {

    yr = 0;

}
    var mp = dpp / yr;

    $('#mp').val(mp.toFixed(2));
    
    $('#dp').val(dp.toFixed(2));
    });
    </script>

   


  <div class="form-group " >
       <div class="row">
    <div class="col">
      <label>Monthly Payment:</label>
      <input type="text" class="form-control" id="mp" name="mp" readonly  required>
    </div>
<div class="col">
      <label>Down Payment:</label>
      <input type="text" class="form-control" id="dp" name="dp" readonly required="">
    </div>

    </div>
  </div>

<script type="text/javascript">
 function Validate() {
        var costumerid = document.getElementById("costumerid");
        if (costumerid.value == "") {
            //If the "Please Select" option is selected display error.
            alert("Please select an costumer!");
            return false;
        }
        return true;

    }
</script>

 <div class="form-group">
   <div class="row">
  <label>Costumer:</label>
    <select class="form-control" name="costumerid" id="costumerid">
<option value=""> Select Costumer...</option>
  <?php 
require ("que/db.php");
$stmt = $conn->prepare("SELECT * from costumer");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['z_idnum'];
$a = $row['z_lastname'];
$b = $row['z_firstname'];
$c = $row['z_mi'];
$salary = $row['z_salary'];
?>

<option value="<?php echo $id; ?>" required><?php echo $a .", ". $b ." ".$c .". ". " [ The Salary of This Costumer is : ". $salary ."]"; ?> </option>

<?php 

} 

  ?>
  </select>

   
    </div>


<br>

      <div class="modal-footer">
         <a href="request.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" value="Validate" onclick="return Validate()" name="savereq" style="font-size: 12px;">Save</button>

      </div>

      
      </form>
</div>
</div>
</div>
  