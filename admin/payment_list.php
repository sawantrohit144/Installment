<?php
include ('header.php');
?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Payment Management</h4>
                   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..." style="float: right; width: 20%; padding: 5px">

                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table" id="myTable">
                      <thead class=" text-warning">
      
                        <th>Transaction ID</th>
                        <th>Product ID</th>
                        <th>Costumer ID</th>
                        <th>Penalty</th>
                        <th>Payment</th>
                          <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>

            <?php
               if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM payment ORDER BY py_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
              ?>
              <tr>
              <td><!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
                  <?php echo $row['py_transactionid']?></td>
              <td><?php echo $row['py_productid']?></td>
              <td><?php echo $row['py_costumerid']?></td>
              <td><?php echo $row['py_penalty']?></td>
              <td><?php echo $row['py_payment']?></td>
              <td><?php echo $row['py_date']?></td>
              <td>
                <!-- <a href="category_edit.php?id=<?php echo $row['py_id']?>" >Edit</a> | <a href="que/category_que.php?id=<?php echo $row['c_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['c_code']?>?')">Delete</a> | -->
                <a  href="print.php?id=<?php echo $row['py_id']; ?>&report=<?php echo $row['py_id']; ?>">Print</a>  </td>

                
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
 
  $result = $conn->prepare("SELECT COUNT(py_id) FROM payment");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='payment_list.php?page=".$i."'";
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
