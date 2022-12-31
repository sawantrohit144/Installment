<html lang="en">
  <head>
    <title>Installment Management</title>
    <link rel="icon" href="../images/ye.gif" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>


  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>



</head>

<body>

<div class ="content">
<div class ="container">
  <?php
  $supplier=$_GET['report'];
  ?>
  <h1><?php echo $supplier;  ?>'s  PURCHASE ORDER FORM </h1>
  <div>
    <?php
    $id=$_GET['id'];
    include('que/db.php');
    $resultaz = $conn->prepare("SELECT * FROM payment WHERE py_id= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
      echo 'Payment ID : TR-'.$rowaz['py_id'].'<br>';
      echo 'Transaction ID : '.$rowaz['py_transactionid'].'<br>';
  echo 'Costumer ID : '.$rowaz['py_costumerid'].'<br>';
   echo 'Date Inserted : '.$rowaz['py_date'].'<br>';
    }
    ?>
  </div>
  <table width="90%" class="table table-striped table-bordered table-hover" id="dataTables-example" align="center">
    <thead>
     <tr>
                     <th width="5%">Transaction ID</th>
                        <th width="5%">Product ID</th>
                        <th width="5%">Costumer ID</th>
                        <th width="5%">Penalty</th>
                        <th width="5%">Payment</th>
                          <th width="5%">Date</th>
    </tr>
  </thead>
  <tbody>

   <?php
   $id=$_GET['id'];
   include('que/db.php');
   $result = $conn->prepare("SELECT * FROM payment WHERE py_id= :userid");
   $result->bindParam(':userid', $id);
   $result->execute();
   for($i=0; $row = $result->fetch(); $i++){
    ?>
    <tr class="record">
      <td><?php
        $rrrrrrr=$row['py_id'];
        $resultss = $conn->prepare("SELECT * FROM payment WHERE py_id= :asas");
        $resultss->bindParam(':asas', $rrrrrrr);
        $resultss->execute();
        for($i=0; $rowss = $resultss->fetch(); $i++){
          echo $rowss['py_transactionid'];
        }
        ?></td>
        <td><?php echo $row['py_productid']; ?></td>
        <td>
<?php echo $row['py_costumerid']; ?>

         
        </td>
        <td><?php echo $row['py_penalty']; ?></td>
        <td><?php
          $dfdf=$row['py_payment'];
          echo formatMoney($dfdf, true);
          ?></td>

        <td><?php echo $row['py_date']; ?></td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">
       <?php
       function formatMoney($number, $fractional=false) {
        if ($fractional) {
         $number = sprintf('%.2f', $number);
       }
       while (true) {
         $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
         if ($replaced != $number) {
          $number = $replaced;
        } else {
          break;
        }
      }
      return $number;
    }
    $sdsd=$_GET['id'];
    $resultas = $conn->prepare("SELECT sum(py_payment) FROM payment WHERE py_id= :a");
    $resultas->bindParam(':a', $sdsd);
    $resultas->execute();
    for($i=0; $rowas = $resultas->fetch(); $i++){
      $fgfg=$rowas['sum(py_payment)'];
      echo formatMoney($fgfg, true);
    }
    ?>
  </strong></td>
</tr>

</tbody>
</table>

<div class = "pull-right">
  <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
    Print PO Form
  </button>
</div>   
<a href = "payment_list.php" class="btn btn-primary btn-m " >
  Back    
</a>
</div>
<!-- jQuery -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

<script>
 function myFunction() {
   window.print();
 }
</script>



</body>

</html>