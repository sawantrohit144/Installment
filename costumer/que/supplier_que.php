<?php
	require_once 'db.php';
 
 // ADD PRODUCT
	if(ISSET($_POST['savesupplier'])){
		
			$idnum = $_POST['idnum'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$mi = $_POST['mi'];
			$age = $_POST['age'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$company = $_POST['company'];

			$sql ="SELECT * FROM `supplier` WHERE s_idnum = '$idnum'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Product ID was Existing!');
					  window.location.href='../supplier_add.php';
					  </script>";
			}
			else
			{
			$sql = "INSERT INTO `supplier` (`s_idnum`,`s_lastname`,`s_firstname`,`s_mi`,`s_age`,`s_contact`,`s_address`,`s_email`,`s_company`) VALUES ('$idnum','$lastname','$firstname','$mi','$age','$contact','$address', '$email', '$company')";
			$conn->exec($sql);
			$conn = null;
			header('location:../supplier.php');
	}
	}

// EDIT PRODUCT
if(ISSET($_POST['editsupplier'])){
		try{
			$id = $_POST['id'];
			$idnum = $_POST['idnum'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$mi = $_POST['mi'];
			$age = $_POST['age'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$company = $_POST['company'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `supplier` SET `s_idnum` = '$idnum', `s_lastname` = '$lastname', `s_firstname` = '$firstname', `s_mi` = '$mi', `s_age` = '$age', `s_contact` = '$contact', `s_address` = '$address', `s_email` = '$email', `s_company` = '$company' WHERE `s_id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
		header('location:../supplier.php');
	}

// DELETE PRODUCT
	if(ISSET($_GET['id'])){
		
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `supplier` WHERE `s_id`='$id'");
		$sql->execute();
		header('location:../supplier.php');
	}

	?>