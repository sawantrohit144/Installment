
<?php 
$con = mysql_connect("localhost","root","");
if(!$con)
{
	echo "string".mysql_error();
}

$db=mysql_select_db("maur",$con);
if(!$mysql_select_db)
{
	echo "string".mysql_error();
}


      if(isset($_POST["in"]))  
      {  
      	 $type = $_POST['role'];
      	 $username = $_POST['username'];
      	 $password = $_POST['password'];

      	 $sql = "SELECT * FROM user WHERE m_userid = '$username' AND m_password = '$password' AND m_position = '$type'";
      	 $res = mysql_query($sql);

      	 while($row=mysql_fetch_array($res))
{
	if($row=['m_userid']==$username && $row=['m_password']==$password && $row=['m_position']=='admin') 
	{
		header('location:admin/home.php');
	}
	elseif ($row=['m_userid']==$username && $row=['m_password']==$password && $row=['m_position']=='employee') 
	{
		header('location:employee/home.php');
	}
}
	  }  

            ?>