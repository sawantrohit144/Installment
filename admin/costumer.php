<?php
include ('header.php');
?>




<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Costumer Management</h4>
                  <a href="costumer_add.php"><button type="button" class="btn btn-primary " style="font-size: 12px;">Add Costumer</button></a>
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
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Postal</th>
                        <th>Email</th>
                        <th>Job</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>

<?php
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM costumer ORDER BY z_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
              ?>
              <tr>
              <td><!-- <a href="product_info.php?id=<?php echo $row['s_id']?>"><span class="fa fa-user-o mr-3"></span> -->
                  <?php echo $row['z_idnum']?></td>
              <td><?php echo $row['z_lastname']?></td>
              <td><?php echo $row['z_firstname']?></td>
              <td><?php echo $row['z_mi']?></td>
              <td><?php echo $row['z_age']?></td>
              <td><?php echo $row['z_contact']?></td>
              <td><?php echo $row['z_address']?></td>
              <td><?php echo $row['z_postal']?></td>
              <td><?php echo $row['z_email']?></td>
              <td><?php echo $row['z_job']?></td>
              <td><?php echo $row['z_salary']?></td>
              <td><?php echo $row['z_status']?></td>
              <td><a href="costumer_edit.php?id=<?php echo $row['z_id']?>" >Edit</a> | <a href="que/costumer_que.php?id=<?php echo $row['z_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['z_idnum']?>?')">Delete</a>  </td>

                
              </tr>
              <?php
                }
              ?>

                      </tbody>
				</table>
</div>
    </div>
  </div>
        <div class="footer">
    <div id="pagination">
  <?php 
 
  $result = $conn->prepare("SELECT COUNT(z_id) FROM costumer");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='costumer.php?page=".$i."'";
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
