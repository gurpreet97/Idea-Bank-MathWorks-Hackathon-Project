<?php 
	require_once "functions.php";
	db_connect();

	$user = $_SESSION['name'];
	$post_id = $_GET['post_id'];

	$query1 = "SELECT MWpoints from user where name = '$user'";
	$MWpoints1 = mysqli_query($conn,$query1);
	$MWpoints = mysqli_fetch_array($MWpoints1);

	$curr_mw_points = $MWpoints['MWpoints'];


	$query = "SELECT * from contributors where post_id = '$post_id' and c_name = '$user' ";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)==0){
		if($curr_mw_points>=10){
			$value = 10;
			$curr_mw_points = $curr_mw_points-10;
			$sql1 = "INSERT into contributors values ('$post_id','$user','$value')";
			$sql2 = "UPDATE user set MWpoints = '$curr_mw_points' where name = '$user'";
			if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2)){
				redirect_to("home.php");
			}
			else{
				echo "Error: " . $conn->error;
			}
		}
		else{
			echo "You don't have enough MWpoints";
			redirect_to("home.php");
		}
			
	}
	else{
		redirect_to("home.php");
	}

 ?>
