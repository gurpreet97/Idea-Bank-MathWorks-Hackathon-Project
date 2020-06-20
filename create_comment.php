<?php 
	require_once "functions.php";
	db_connect();

	$user = $_SESSION['name'];
	$post_id = $_GET['post_id'];
	$comment_id = bin2hex(random_bytes(40));
	$content = $_POST['content'];

	$sql = 	"INSERT into comment values ('$comment_id','$content','$user','$post_id')";
	if(mysqli_query($conn,$sql)){
		redirect_to("comment.php?post_id=".$post_id);
	}
	else{
		echo "Error: " . $conn->error;
	}	

 ?>
