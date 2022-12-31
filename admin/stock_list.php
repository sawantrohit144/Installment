<?php
include ('header.php');


?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Stock Management</h4>
                  
                     </div>
                <div class="card-body">
                  <div class="table-responsive">
            
                <table class="table">
                      <thead class=" text-warning">
                
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
			          <?php
			         if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM product ORDER BY p_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
			        ?>
			        <tr>
			        <td><!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
			          	<?php echo $row['p_code']?></td>
			        <td><?php echo $row['p_name']?></td>
			        <td><?php echo $row['p_category']?></td>
			        <td><?php echo $row['p_description']?></td>
			        <td><?php echo $row['p_quantity']?></td>
			        <td><?php echo $row['p_value']?></td>
			        <td><a href="installment.php?id=<?php echo $row['p_id']?>" >Select</a> </td>

			          
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


        <div class="footer">
    <div id="pagination">
  <?php 
 
  $result = $conn->prepare("SELECT COUNT(p_id) FROM product");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='product_list.php?page=".$i."'";
        if($page==$i)
        {
        echo "id=active";
        }
        echo ">";
        echo "".$i."</a> "; 
  }; 
  ?>
</div>
</div
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