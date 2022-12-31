<?php
	require_once 'db.php';
 	
// ADD Requesr
if(ISSET($_POST['savereq'])){
		
			$transacid = $_POST['transacid'];
			$productid = $_POST['productid'];
			$costumerid = $_POST['costumerid'];
			$quantity = $_POST['quantity'];		
			$order = $_POST['order'];
			$price = $_POST['price'];
			$totalprice = $_POST['total'];
			$tax = $_POST['tax'];
			$mp = $_POST['mp'];
			$dp = $_POST['dp'];
			$yr = $_POST['yr'];
		//	$status = $_POST['status'];
			$newqty = $quantity - $order;

			if($quantity <= 0){
				echo "<script>alert('Oppppss Something Wrong in Your Order!');
					  window.location.href='../request.php';
					  </script>";
			}else{

			$sql ="SELECT * FROM `request` WHERE r_transactionid = '$transacid'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Request ID was Existing!');
					  window.location.href='../request.php';
					  </script>";
			}
			else
			{
			$sql = "UPDATE `product` SET p_quantity = ($quantity - $order) WHERE p_code = '$productid'";
			 $sql1 = "INSERT INTO `request` (`r_transactionid`,`r_productid`,`r_costumerid`,`r_quantity`,`r_price`,`r_total`,`r_tax`,`r_montly`,`r_downpayment`,`r_year`,`r_status`) VALUES ('$transacid','$productid','$costumerid','$order','$price','$totalprice','$tax', '$mp', '$dp', '$yr', '$status')";
			
			 $conn->exec($sql);
			 $conn->exec($sql1);		
			$conn = null;
			header('location:../request.php');
	}}
	}

// EDIT PRODUCT
if(ISSET($_POST['approvereq'])){
		
			$transacid = $_POST['transacid'];
			$productid = $_POST['productid'];
			$costumerid = $_POST['costumerid'];
			$order = $_POST['order'];
			$price = $_POST['price'];
			$totalprice = $_POST['total'];
			$tax = $_POST['tax'];
			$mp = $_POST['mp'];
			$dp = $_POST['dp'];
			$yr = $_POST['yr'];
			$dpp = $_POST['dpp'];
			$balance = $totalprice - $dpp;

			if($yr == 1){
				$yr = 12;
			}elseif ($yr == 2) {
				$yr = 24;
			}elseif ($yr = 3) {
				$yr = 32;
			}else{
					echo "<script>alert('Oppppss!');
					  window.location.href='../request.php';
					  </script>";
			}

			$mp = $balance / $yr;

		if($yr == 12){
				$yr = 1;
			}elseif ($yr == 24) {
				$yr = 2;
			}elseif ($yr = 32) {
				$yr = 3;
			}

			if ($dp > $dpp){
					echo "<script>alert('The Downpayemnrt is lower than we expect baby!');
					  window.location.href='../request.php';
					  </script>";
			}else if($totalprice < $dpp){
					echo "<script>alert('Oppppss!');
					  window.location.href='../request.php';
					  </script>";
			}else{
			$sql ="SELECT * FROM `installment` WHERE i_transactionid = '$transacid'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Product ID was Existing!');
					  window.location.href='../request.php';
					  </script>";
			}
			else
			{

			$sql = "INSERT INTO `installment` (`i_transactionid`,`i_productid`,`i_costumerid`,`i_order`,`i_value`,`i_totalprice`,`i_tax`,`i_mp`,`i_dp`,`i_dpp`,`i_balance`,`i_year`) VALUES ('$transacid','$productid','$costumerid','$order','$price','$totalprice','$tax', '$mp', '$dp','$dpp', '$balance', '$yr')";
			
			$sql1 = "DELETE from `request` WHERE `r_transactionid`='$transacid'";
			$conn->exec($sql);
			$conn->exec($sql1);
			$conn = null;
			header('location:../installment.php');
	}}}


// DELETE PRODUCT
	if(ISSET($_GET['id'])){
	
		//	

		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `request` WHERE `r_id`='$id'");	
		
		$sql->execute();
		header('location:../request.php');
	}


		if(ISSET($_GET['idko'])){
	
		//	

		$id = $_GET['idko'];
		$sql = $conn->prepare("DELETE from `logs` WHERE `l_id`='$id'");	
		
		$sql->execute();
		header('location:../stock_report.php');
	}

// ADD PRODUCT STOCK
	if(ISSET($_POST['inproduct'])){
		try{
			$id = $_POST['id'];
			$code = $_POST['code'];
			$name = $_POST['name'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$status = $_POST['status'];
			$value = $_POST['value'];
			$quantity = $_POST['quantity'];
			$color = $_POST['color'];
			$supname = $_POST['supname'];
			$stockin = $_POST['stockin'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql = "UPDATE `product` SET p_quantity = ($quantity + $stockin) WHERE p_id = '$id'";
			
			$conn->exec($sql);
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
		header('location:../stock_manage.php');
	}

// MINUS PRODUCT STOCK
	if(ISSET($_POST['outproduct'])){
			$id = $_POST['id'];
			$code = $_POST['code'];
			$name = $_POST['name'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$status = $_POST['status'];
			$value = $_POST['value'];
			$quantity = $_POST['quantity'];
			$color = $_POST['color'];
			$supname = $_POST['supname'];
			$stockin = $_POST['stockin'];
			if($quantity < $stockin)
			{
				echo "<script>alert('Enter another Quantity!');
					  window.location.href='../stock_manage.php';
					  </script>";
			}
			else
			{
			 $sql = "UPDATE `product` SET p_quantity = ($quantity - $stockin) WHERE p_id = '$id'";
			
			$conn->exec($sql);

		$conn = null;
		header('location:../stock_manage.php');
	}
	}
?>
