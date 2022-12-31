<?php
include ('header.php');
?>




<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Supplier Management</h4>
                  <a href="supplier_add.php"><button type="button" class="btn btn-primary " style="font-size: 12px;">Add Supplier</button></a>
                         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..." style="float: right; width: 20%; padding: 5px">

                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table" id="myTable">
                      <thead class=" text-warning">
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Mi</th>
                        <th>Age</th>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                      </thead>
                      <tbody>

<?php
                require 'que/db.php';
              if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM supplier ORDER BY s_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
              ?>
              <tr>
              <td><!-- <a href="product_info.php?id=<?php echo $row['s_id']?>"><span class="fa fa-user-o mr-3"></span> -->
                  <?php echo $row['s_idnum']?></td>
              <td><?php echo $row['s_lastname']?></td>
              <td><?php echo $row['s_firstname']?></td>
              <td><?php echo $row['s_mi']?></td>
              <td><?php echo $row['s_age']?></td>
              <td><?php echo $row['s_company']?></td>
              <td><?php echo $row['s_contact']?></td>
              <td><?php echo $row['s_address']?></td>
              <td><?php echo $row['s_email']?></td>
              <td><a href="supplier_edit.php?id=<?php echo $row['s_id']?>" >Edit</a> | <a href="que/supplier_que.php?id=<?php echo $row['s_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['s_idnum']?>?')">Delete</a>  </td>

                
              </tr>
              <?php
                }
              ?>

                      </tbody>
				</table>
      </div>
    </div>
  </div>
</div>
</div>

        <div class="footer">
    <div id="pagination">
  <?php 
 
  $result = $conn->prepare("SELECT COUNT(s_id) FROM supplier");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='supplier.php?page=".$i."'";
        if($page==$i)
        {
        echo "id=active";
        }
        echo ">";
        echo "".$i."</a> "; 
  }; 
  ?>
</div>
</div>