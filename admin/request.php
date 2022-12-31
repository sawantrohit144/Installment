<?php
include ('header.php');

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Request Management</h4>
                  <a href="request_select.php"><button type="button"  class="btn btn-primary " style="font-size: 12px;">Add Request</button></a>
                   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..." style="float: right; width: 20%; padding: 5px">

                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table" id="myTable">
                      <thead class=" text-warning">
                
                        <th>Transaction ID</th>
                        <th>Product ID</th>
                        <th>Costumer ID</th>
                        <th>Order</th>
                        <th>Value</th>
                        <th>Total Price</th>
                        <th>Tax</th>
                        <th>Monthly</th>
                        <th>Down Paymnet</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
			          <?php
			         if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM request ORDER BY r_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
			        ?>
			        <tr>
			        	<td><?php echo $row['r_transactionid']?></td>
			        <!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
			      	<td><?php echo $row['r_productid']?></td>
			        <td><?php echo $row['r_costumerid']?></td>
			        <td><?php echo $row['r_quantity'] . " Pc/s"?></td>
			        <td><?php echo "₱ ".  $row['r_price']?></td>
			        <td><?php echo "₱ ".  $row['r_total']?></td>
			        <td><?php echo "₱ ".  $row['r_tax']?></td>
			        <td><?php echo "₱ ". $row['r_montly']?></td>
			        <td><?php echo "₱ ".  $row['r_downpayment']?></td>
			        <td><?php echo $row['r_year' ] . " Yr/s"?></td>
			        <td><label class="badge badge-danger">Pending</label></td>
			        <td><?php echo $row['r_date']?></td>
			        <td><a href="request_approve.php?id=<?php echo $row['r_id']?>" >Approve</a> | <a href="que/request_que.php?id=<?php echo $row['r_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['r_transactionid']?>?')">Delete</a>  </td>

			          
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
 
  $result = $conn->prepare("SELECT COUNT(r_id) FROM request");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='request.php?page=".$i."'";
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

			<!-- 	<?php
					
					$pdoQuery = "SELECT  * FROM product";
					$res = $conn->query($pdoQuery);
					$countproduct = $res->rowCount();

					if ($countproduct <= 0)
					{
						echo "Your Stock is Empty!" ;
					}
					else
					{
						echo "The Total Count of Stock is "." "."$countproduct" ;
					}
				?> -->