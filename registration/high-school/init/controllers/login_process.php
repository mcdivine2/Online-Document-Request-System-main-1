<?php
		require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$status = "Active";
	//	$role = "Administrator";
		
		$get_highschool = $conn->login_student_highschool($username, $password, $status);
		if($get_highschool['count'] > 0){
			session_start();
			$_SESSION['student_id'] = $get_highschool['student_id'];

			echo 1;
		}else{
			echo 0;
		}
	}
?>

