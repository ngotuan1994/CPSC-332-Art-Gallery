 <?php
session_start();
$user = $_POST['id'];
$pass = $_POST['pass'];
$role = $_POST['role'];

include 'connection.php';

if($role == "Admin")
{
    if(!empty($user)||!empty($pass)){
$sql = "SELECT * FROM admin WHERE ID='$user' AND password='$pass'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);

		if($count == 0)
		{
		header("location:Admin.php");
		}
		else
		{
			$_SESSION['Email'] = $user;
			$_SESSION['Role'] = $role;
			header("location:Admin.php?image=image.php");
		}
    }
 else {
        echo 'Fill up al fields';
    }
}

?>