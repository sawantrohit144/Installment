<?php
include ('header.php');
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Register Product</h4>
   <hr>
  <div class="card-body">
            
 <form action="que/product_que.php" method="POST">
  <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="code" required>
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="name" required>
    </div>
  </div>
  </div>
 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Description:</label>
      <input type="text" class="form-control" name="description" required>
    </div>
     
  </div>
  </div>



<!--  <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" id="quantity" required>
    </div>
    <div class="col">
       <label>Supplier Price:</label>
      <input type="number" class="form-control" name="value" id="value" required>
    </div>
<script>

    $('#value').keyup(function(){
    var qty;
    var value;
    qty = parseFloat($('#quantity').val());
    value = parseFloat($('#value').val());
    var c1 = qty * value;
    var c2 = c1 * .20;
    var c3 = c1 + c2;
    var cc1 = value * .20;
    var cc2 = cc1 + value;
    var cc3 = cc2 * 1;
    var mprice = cc3;
    var newvalue =  c3;
    
    $('#mprice').val(mprice.toFixed(2));
    $('#newvalue').val(newvalue.toFixed(2));
    });


</script>

 <div class="col">
       <label>Market Price:</label>
      <input type="number" class="form-control" name="mprice" id="mprice" required readonly>
    </div>
     

    <div class="col">
       <label>Price:</label>
      <input type="number" class="form-control" name="newvalue" id="newvalue" required readonly>
    </div>
     
  </div>
  </div>
 -->

<label>Category:</label>
    <select class="form-control" name="category" readonly>
  <?php 
require ("que/db.php");
$stmt = $conn->prepare("SELECT * from category");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['c_code'] ;
$name = $row['c_name'];
?>
<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php 
} 

  ?>
  </select>


<!--    <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Color:</label>
      <input type="text" class="form-control" name="color" required>
    </div>
    <div class="col">
       <label>Status:</label>
      <input type="text" class="form-control" name="status" required>
    </div>
     
  </div>
  </div>
 -->
     <!--  <label>Supplier:</label>
    <select class="form-control" name="supname" readonly>
  <?php 
require ("que/db.php");
$stmt = $conn->prepare("SELECT * from supplier");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['s_idnum'] ;
$name = $row['s_company'];
?>
<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php 
} 

  ?>
  </select>

    </div> -->

      <div class="modal-footer">
         <a href="stock.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="saveproduct" style="font-size: 12px;">Save</button>
      </div>
      </form>
