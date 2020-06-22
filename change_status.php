<?php 
	require_once "functions.php";
	db_connect();
    
	$user = $_SESSION['name'];
	$post_id = $_GET['post_id'];
	$content = $_POST['status'];
    if ($content == 'In progress'){
    $sql = "update post set current_status = '$content' where post_id = '$post_id' ";
  
	if(mysqli_query($conn,$sql)){
		redirect_to("status.php?post_id=".$post_id);
	}
	else{
		echo "Error: " . $conn->error;
    }	}
    else if($content == 'Completed'){
        $sql3 = "select c_name from contributors where post_id = '$post_id'";
        echo "Postdgagfkfn";
       $result = mysqli_query($conn,$sql3);
        if (mysqli_num_rows($result) > 0) {
            while($user1 = $result->fetch_assoc()) {
                $user2 = $user1['c_name'];
                if($user2 == $user)
                {
                    $dl = "select sum(contribution) from contributors where post_id = '$post_id'";
                    $dlk = mysqli_query($conn,$dl);
                    $dllk = $dlk->fetch_assoc();
                    $val = $dllk['sum(contribution)'];
                    $sql4 = "update user set MWpoints=MWpoints+$val where name = '$user2'";
                }
                else{
                $sql4 = "update user set MWpoints=MWpoints+20 where name = '$user2'";}
                if(mysqli_query($conn,$sql4)){echo "shi hai bhai";};
            }}
            $sql = "update post set current_status = '$content' where post_id = '$post_id' ";
            
  
            if(mysqli_query($conn,$sql)){
                redirect_to("status.php?post_id=".$post_id);
            } else {echo "Error: " . $conn->error;} 
    }
    else if($content == 'Cancel'){
        $sql3 = "select c_name from contributors where post_id = '$post_id'";
        echo "Postdgagfkfn";
       $result = mysqli_query($conn,$sql3);
        if (mysqli_num_rows($result) > 0) {
            while($user1 = $result->fetch_assoc()) {
                $user2 = $user1['c_name'];
                $sql4 = "update user set MWpoints=MWpoints+5 where name = '$user2'";
                if(mysqli_query($conn,$sql4)){echo "shi hai bhai";};
            }}
            $sql = "delete from post where post_id = '$post_id' ";
            $sql1 = "delete from contributors where post_id = '$post_id'";
            $sql2 = "delete from comment where post_id = '$post_id'";
  
            if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2)){
                redirect_to("home.php");
            } else {echo "Error: " . $conn->error;}
    }



 ?>