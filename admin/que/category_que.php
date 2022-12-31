
<?php
// ADD CATEGORY
require_once 'db.php';
 
	if(ISSET($_POST['savecategory'])){
		
			$catid = $_POST['catid'];
			$catname = $_POST['catname'];
			$description = $_POST['description'];
			$sql ="SELECT * FROM `category` WHERE c_code = '$catid'";
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
			$sql = "INSERT INTO `category` (`c_code`, `c_name`, `c_description`) VALUES ('$catid', '$catname', '$description')";
			$conn->exec($sql);
		
			$conn = null;
			header('location:../category.php');
	
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
		$sql = $conn->prepare("DELETE from `category` WHERE `c_id`='$id'");
		$sql->execute();
	header('location:../category.php');
	}
?>