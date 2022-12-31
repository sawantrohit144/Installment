<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "testing");  
      $output = '';  
      $query = "  
           SELECT * FROM logs  
           WHERE l_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                        <th>Product ID</th>
                        <th>Stock</th>
                        <th>Price</th>
                      <th>Order</th>
                      <th>Total Price</th>
                      <th>Transaction</th>
                        <th>User ID</th>
                        <th>Date</th>

                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                        <td><?php echo $row["l_stock"]?></td>
              <td><?php echo $row["l_price"]?></td>
              <td><?php echo $row["l_order"]?></td>
              <td><?php echo $row["l_totalprice"]?></td>
              <td><?php echo $row["l_transaction"]?></td>
              <td><?php echo $row["l_user"]?></td>
              <td><?php echo $row["l_date"]?></td>
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>