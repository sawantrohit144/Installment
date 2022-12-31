<?php
include ('header.php');

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Report Management</h4>
                  	
                  	 		  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..." style="float: right; width: 20%; padding: 5px">

                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table" id="myTable">
                      <thead class=" text-warning">
                
                        <th>Product ID</th>
                        <th>Stock</th>
                        <th>Price</th>
                  		<th>Order</th>
                  		<th>Total Price</th>
                  		<th>Transaction</th>
                        <th>User ID</th>
                        <th>Date</th>
                        <!-- <th>Action</th> -->
                      </thead>
                      <tbody>
			          <?php
			          require 'que/db.php';
			         if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * 5; 		
		$result = $conn->prepare("SELECT * FROM logs ORDER BY l_id ASC LIMIT $start_from, 5");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			        ?>
			        <tr>
			        	<td><?php echo $row['l_productid']?></td>
			        <!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
			      	<td><?php echo $row['l_stock']?></td>
			        <td><?php echo $row['l_price']?></td>
			        <td><?php echo $row['l_order']?></td>
			        <td><?php echo $row['l_totalprice']?></td>
			        <td><?php echo $row['l_transaction']?></td>
			        <td><?php echo $row['l_user']?></td>
			       	<td><?php echo $row['l_date']?></td>
			        <td>
						<!-- <a href="request_approve.php?id=<?php echo $row['r_id']?>" >Approve</a> | <a href="que/request_que.php?idko=<?php echo $row['l_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['l_productid']?>?')">Delete</a>  -->
			         			      
</td>

			          
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
 
  $result = $conn->prepare("SELECT COUNT(l_id) FROM logs");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='stock_report.php?page=".$i."'";
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
</div>

                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>


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