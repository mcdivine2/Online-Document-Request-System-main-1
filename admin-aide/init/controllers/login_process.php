<?php
		require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$status = "Active";
	//	$role = "Administrator";
		
		$get_admin_aide = $conn->login_admin_aide($username, $password, $status);
		if($get_admin_aide['count'] > 0){
			session_start();
			$_SESSION['admin_aide_id'] = $get_admin_aide['admin_aide_id'];

			echo 1;
		}else{
			echo 0;
		}
	}
?>

