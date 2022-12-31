<?php
	require_once 'db.php';
 
 // ADD PRODUCT
	if(ISSET($_POST['savecostumer'])){
		
			$idnum = $_POST['idnum'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$mi = $_POST['mi'];
			$age = $_POST['age'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$postal = $_POST['postal'];
			$job = $_POST['job'];
			$salary = $_POST['salary'];
			$status = $_POST['status'];

			$sql ="SELECT * FROM `costumer` WHERE z_idnum = '$idnum'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Product ID was Existing!');
					  window.location.href='../costumer_add.php';
					  </script>";
			}
			else
			{
			$sql = "INSERT INTO `costumer` (`z_idnum`,`z_lastname`,`z_firstname`,`z_mi`,`z_age`,`z_contact`,`z_address`,`z_email`,`z_postal`, `z_job`, `z_salary`, `z_status`) VALUES ('$idnum','$lastname','$firstname','$mi','$age','$contact','$address', '$email', '$postal', '$job', '$salary', '$status')";
			$conn->exec($sql);
			$conn = null;
			header('location:../costumer.php');
	}
	}

// EDIT PRODUCT
if(ISSET($_POST['editcostumer'])){
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
			$postal = $_POST['postal'];
			$job = $_POST['job'];
			$salary = $_POST['salary'];
			$status = $_POST['status'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `costumer` SET `z_idnum` = '$idnum', `z_lastname` = '$lastname', `z_firstname` = '$firstname', `z_mi` = '$mi', `z_age` = '$age', `z_contact` = '$contact', `z_address` = '$address', `z_email` = '$email', `z_postal` = '$postal', `z_job` = '$job', `z_salary` = '$salary', `z_status` = '$status' WHERE `z_id` = '$id'";
			
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
		header('location:../costumer.php');
	}

// DELETE PRODUCT
	if(ISSET($_GET['id'])){
	
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `costumer` WHERE `z_id`='$id'");
		$sql->execute();
		header('location:../costumer.php');
	}

	?>