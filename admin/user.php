<?php
include ('header.php');
?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User Management</h4>
                  <a href="user_add.php"><button type="button" class="btn btn-primary " style="font-size: 12px;">Add User</button></a>
                     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..." style="float: right; width: 20%; padding: 5px">

                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table" id="myTable">
                      <thead class=" text-warning">
      
                        <th>Username</th>
                        <th>Password</th>
                        <th>Position</th>
                        <!-- <th>Action</th> -->
                      </thead>
                      <tbody>

            <?php
               if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM user ORDER BY u_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
              ?>
              <tr>
              <td><!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
                  <?php echo $row['u_idnumber']?></td>
              <td><?php echo "******" ?></td>
              <td><?php echo $row['u_position']?></td>
              <!-- <td> <a href="que/category_que.php?id=<?php echo $row['c_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['c_code']?>?')">Delete</a>  </td> -->

                
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
 
  $result = $conn->prepare("SELECT COUNT(u_id) FROM user");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='user.php?page=".$i."'";
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
