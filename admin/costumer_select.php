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
                      </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table">
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
              <td><a href="request_form.php?id=<?php echo $row['z_id']?>" >Select</a> 

                
              </tr>
              <?php
                }
              ?>

                      </tbody>
				</table>

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
