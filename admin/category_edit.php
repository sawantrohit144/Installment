<?php
include ('header.php');
?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `category` WHERE `c_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>  


      <div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Category Edit</h4>
   <hr>
  <div class="card-body">
            
 <form action="que/category_que.php" method="POST">
  <div class="form-group " >
   <div class="row">
    <div class="col">
    	 <input name="id" type="hidden" value="<?php echo $row['c_id']?>">
      <label>Code:</label>
      <input type="text" class="form-control" name="catid" required value="<?php echo $row['c_code']?>">
    </div>
    <div class="col">
       <label>Category Name:</label>
      <input type="text" class="form-control" name="catname" required value="<?php echo $row['c_name']?>"> 
    </div>
  </div>
  </div>
 

       <label>Description:</label>
      <input type="text" class="form-control" name="description" required value="<?php echo $row['c_description']?>">
    </div>

      <div class="modal-footer">
         <a href="category.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="editcategory" style="font-size: 12px;">Save</button>
      </div>
      </form>
