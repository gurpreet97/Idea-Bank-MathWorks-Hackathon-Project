
<!-- 
purchase_item.php
file added by Vishal 
-->


<?php 
	require_once "functions.php";
	db_connect();

	$user = $_SESSION['name'];
	$offer_id = $_GET['offer_id'];
// current mwp
	$sqlum = "SELECT MWpoints from user where name = '$user'";
	$queryum = mysqli_query($conn,$sqlum);
	$MWpoints = mysqli_fetch_array($queryum);
	$curr_mw_points = $MWpoints['MWpoints'];

    //cost of offer
    $queryOffer = mysqli_query($conn,"SELECT cost from offers where offer_id = '$offer_id'");
    $cstOffer = mysqli_fetch_array($queryOffer);
    $offerCost = $cstOffer['cost'];

	$query = "SELECT * from purchases where offer_id = '$offer_id' and username = '$user' ";
	$result = mysqli_query($conn,$query);
    if($curr_mw_points>= $offerCost){
        $curr_mw_points = $curr_mw_points-$offerCost;
        $purchase_id  = bin2hex(random_bytes(40));
        echo $user;
        $sql1 = "INSERT into purchases values ( '$purchase_id','$user','$offer_id','$offerCost', CURRENT_TIMESTAMP)";
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

 ?>
