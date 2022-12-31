<?php
include ('header.php');

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Installment Management</h4> 
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
                        <th>Balance</th>
                        <th>Monthly</th>
                        <th>Year</th>
                        <th>Total Down</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                <?php
               if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 5;    
    $result = $conn->prepare("SELECT * FROM installment WHERE i_costumerid = '$username' ORDER BY i_id ASC LIMIT $start_from, 5");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
              ?>
              <tr>
                <td><?php echo $row['i_transactionid']?></td>
              <!-- <a href="product_info.php?id=<?php echo $row['p_id']?>"><span class="fa fa-user-o mr-3"></span> -->
              <td><?php echo $row['i_productid']?></td>
              <td><?php echo $row['i_costumerid']?></td>
              <td><?php echo $row['i_order'] ." Pc/s"?> </td>
              <td><?php echo "₱ ". $row['i_value']?></td>
              <td><?php echo "₱ ". $row['i_balance']?></td>
              <td><?php echo "₱ ". $row['i_mp']?></td>
              <td><?php echo $row['i_year' ] ." Yr/s"?></td>
              <td><?php echo "₱ ". $row['i_dpp']?></td>
              <td><?php echo $row['i_date']?></td>
              <td><a href="payment.php?id=<?php echo $row['i_id']?>" >Show</a> | <a href="que/installment_que.php?id=<?php echo $row['i_id']?>" onclick="return  confirm('Do you want to execute <?php echo $row['i_transactionid']?>?')">Delete</a>  </td>

                
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
 
  $result = $conn->prepare("SELECT COUNT(i_id) FROM installment");
  $result->execute(); 
  $row = $result->fetch(); 
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 5); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='installment.php?page=".$i."'";
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

      <!--  <?php
          
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