<?php
	require_once 'db.php';
 
 // ADD PRODUCT
	if(ISSET($_POST['saveproduct'])){
		
			$code = $_POST['code'];
			$name = $_POST['name'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			//$status = $_POST['status'];
			//$value = $_POST['value'];
			//$quantity = $_POST['quantity'];
			//$color = $_POST['color'];
			//$supname = $_POST['supname'];
			//$newvalue = $_POST['newvalue'];
			//$mprice = $_POST['mprice'];

			$sql ="SELECT * FROM `product` WHERE p_code = '$code'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Product ID was Existing!');
					  window.location.href='../stock_add.php';
					  </script>";
			}
			else
			{
			$sql = "INSERT INTO `product` (`p_code`,`p_name`,`p_category`,`p_description`) VALUES ('$code','$name','$category','$description')";
			$conn->exec($sql);
			$conn = null;
			header('location:../stock.php');
	}
	}

// EDIT PRODUCT
if(ISSET($_POST['editproduct'])){
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

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `product` SET `p_code` = '$code', `p_name` = '$name', `p_category` = '$category', `p_description` = '$description', `p_status` = '$status', `p_value` = '$value', `p_color` = '$color', `p_quantity` = '$quantity', `p_supname` = '$supname' WHERE `p_id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
		header('location:../stock.php');
	}

// DELETE PRODUCT
	if(ISSET($_GET['id'])){
	
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `product` WHERE `p_id`='$id'");
		$sql->execute();
		header('location:../stock.php');
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
			$pvalue = $_POST['pvalue'];
			$mprice = $_POST['mprice'];
			$newvalue = $_POST['newvalue'];
			$quantity = $_POST['quantity'];
			$color = $_POST['color'];
			$supname = $_POST['supname'];
			$stockin = $_POST['stockin'];
			$ptotal = $_POST['ptotal'];
			$transaction = "Stock In";
			$ttprice = $quantity * $value;
			$c1 = $quantity + $stockin;
			$c2 = $newvalue + $ptotal;
			
			$ulol = 0;
			

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql = "UPDATE `product` SET `p_quantity` = '$c1' , `p_value` = '$value', `p_mprice` = '$mprice' , `p_newvalue` = '$c2'  WHERE p_id = '$id'";
			 $sql1 = "INSERT INTO `logs` (`l_productid`,`l_stock`,`l_price`,`l_order`,`l_totalprice`,`l_transaction`,`l_user`) VALUES ('$code','$quantity','$ulol','$stockin','$ttprice','$transaction','$supname')";
			$conn->exec($sql);
			$conn->exec($sql1);
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
			$pvalue = $_POST['pvalue'];
			$mprice = $_POST['mprice'];
			$newvalue = $_POST['newvalue'];
			$quantity = $_POST['quantity'];
			$color = $_POST['color'];
			$supname = $_POST['supname'];
			$stockin = $_POST['stockout'];
			$ptotal = $_POST['ptotal'];
			$transaction = "Stock Out";
			$ttprice = $quantity * $value;
			$c1 = $quantity - $stockin;
			$c2 = $newvalue + $ptotal;
			$ulol = 0;

					if($quantity < $stockin)
			{
				echo "<script>alert('Enter another Quantity!');
					  window.location.href='../stock_manage.php';
					  </script>";
			}
			else
			{
			 $sql = "UPDATE `product` SET `p_quantity` = '$c1' WHERE p_id = '$id'";
			 $sql1 = "INSERT INTO `logs` (`l_productid`,`l_stock`,`l_price`,`l_order`,`l_totalprice`,`l_transaction`,`l_user`) VALUES ('$code','$quantity','$ulol','$stockin','$ttprice','$transaction','$supname')";

			$conn->exec($sql);
			$conn->exec($sql1);

		$conn = null;
		header('location:../stock_manage.php');
	}
	}


?>

