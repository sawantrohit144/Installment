<?php
// ADD CATEGORY
require_once 'db.php';
 
	if(ISSET($_POST['saveuser'])){
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
			$sql ="SELECT * FROM `user` WHERE u_idnumber = '$username'";
			$stmt = $conn->query($sql);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				echo "<script>alert('The Category ID was Existing!');
					  window.location.href='../category_add.php';
					  </script>";
			}
			else
			{
			$sql = "INSERT INTO `user` (`u_idnumber`, `u_password`, `u_position`) VALUES ('$username', '$password', '$usertype')";
			$conn->exec($sql);
		
			$conn = null;
			header('location:../user.php');
	
	}
}

// EDIT CATEGORY
if(ISSET($_POST['editcategory'])){
		try{
			$id = $_POST['id'];

			$catid = $_POST['catid'];
			$catname = $_POST['catname'];
			$description = $_POST['description'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `category` SET `c_code` = '$catid', `c_name` = '$catname', `c_description` = '$description'  WHERE `c_id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
	header('location:../category.php');
	}

// DELETE CATEGORY
	if(ISSET($_GET['id'])){
	
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `user` WHERE `u_id`='$id'");
		$sql->execute();
	header('location:../user.php');
	}
?>