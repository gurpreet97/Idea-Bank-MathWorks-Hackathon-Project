<!-- 
redeem.php
file added by Vishal 
-->


<?php require_once "functions.php"; ?>
<?php include "header.php" ?>
<?php
check_auth();
db_connect();
$user = $_SESSION['name'];

$sql = "SELECT * FROM offers";
$result = mysqli_query($conn, $sql);

?>

<!-- main -->
<main class="container" style="width: 80%">

    <!-- ./main -->

    <h1 style="height: 50px;">
        <b> <span style="float: left;">Offers</span></b>
        <span style="color:dodgerblue; float: right; font-size: 20px;"> Available MWpoints: <?php

                                                                                            $sqlMWP = "SELECT * FROM user WHERE name = '$user' ";

                                                                                            $resultMWP = mysqli_query($conn, $sqlMWP);

                                                                                            $rowMWP = mysqli_fetch_array($resultMWP);
                                                                                            $MWpoints = $rowMWP['MWpoints'];
                                                                                            echo $MWpoints;

                                                                                            ?>
        </span>
    </h1>

    <!-- <div class="rowView"> -->
    <div class="row">
        <?php

        while ($post = $result->fetch_assoc()) {
            $offer_id = $post['offer_id'];
            $offer_name = $post['offer_title'];
            $offer_desc = $post['description'];
            $offer_cost = $post['cost'];
        ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="height: 250px;">
                    <div class="caption">
                        <h2><?php echo $offer_name; ?></h2>
                        <p><?php echo $offer_desc; ?></p>
                        <p style="position: absolute; bottom: 0; width: 100%;">
                            <?php
                            if ($offer_cost <= $MWpoints) {
                            ?>
                            <a href="<?php echo "purchase_item.php?offer_id=" . $offer_id; ?>">
                                <button type="button" class="btn btn-success btn-lg" > 
                                <?php 
                                echo "Cost: " . $offer_cost . " | Buy Now"
                                ?>
                            
                            </button>
                            </a>
                            <?php

                            } else {
                            ?>
                                <button type="button" class="btn btn-danger btn-lg">

                                <?php 
                                echo "Cost: " . $offer_cost . " | Insufficient Balance!!!"
                                ?>
                                </button>
                            <?php
                            }
                            ?>

                        </p>
                    </div>
                </div>
            </div>
        
        <?php } ?>
    </div>

</main>

<?php include "footer.php"; ?>