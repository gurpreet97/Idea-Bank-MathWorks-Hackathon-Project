<?php require_once "functions.php"; ?>
<?php include "header.php" ?>

<?php
check_auth();
db_connect();

$user = $_SESSION['name'];

$sqlu = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'idea' and name = '$user'";
$sqlu2 = "SELECT * FROM post where current_status = 'In progress' and type = 'idea'  and name = '$user'";
$sqlu3 = "SELECT * FROM post where current_status = 'Completed' and type = 'idea' and name = '$user'";
$sqlu4 = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'problem' and name = '$user'";
$sqlu5 = "SELECT * FROM post where current_status = 'In progress' and type = 'problem' and name = '$user'";
$sqlu6 = "SELECT * FROM post where current_status = 'Completed' and type = 'problem' and name = '$user'";
$resultu = $conn->query($sqlu);
$resultu2 = $conn->query($sqlu2);
$resultu3 = $conn->query($sqlu3);
$resultu4 = $conn->query($sqlu4);
$resultu5 = $conn->query($sqlu5);
$resultu6 = $conn->query($sqlu6);

// echo $resultu->num_rows ,$resultu2->num_rows ,$resultu3->num_rows ,$resultu4->num_rows ,$resultu5->num_rows ,$resultu6->num_rows ;

$sql = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'idea'";
$sql2 = "SELECT * FROM post where current_status = 'In progress' and type = 'idea'";
$sql3 = "SELECT * FROM post where current_status = 'Completed' and type = 'idea'";
$sql4 = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'problem'";
$sql5 = "SELECT * FROM post where current_status = 'In progress' and type = 'problem'";
$sql6 = "SELECT * FROM post where current_status = 'Completed' and type = 'problem'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$result6 = $conn->query($sql6);
$pwd = getcwd();

$cmd = '"C:\Program Files\MATLAB\R2020a\bin\matlab.exe" -automation -sd ' . $pwd . ' -r "chart('. $resultu->num_rows .','. $resultu2->num_rows .','. $resultu3->num_rows .','. $resultu4->num_rows .','. $resultu5->num_rows .',' . $resultu6->num_rows .','. $result->num_rows . ',' . $result2->num_rows . ',' . $result3->num_rows . ',' . $result4->num_rows . ',' . $result5->num_rows . ',' . $result6->num_rows . ');exit" -wait -logfile log.txt';
// exec

$last_line = exec($cmd, $output, $retval);

if ($retval == 0){
  // Read from CSV file which MATLAB has created
//   echo '<img src="main.png"/><br>';
//   echo '<img src="idea.png"/><br>';
//   echo '<img src="problem.png"/><br>';
} else {
  // When command failed
  echo '<p>Failed</p>';
}
?>

<!-- main -->
<main class="container" style="width: 100%">

    <!-- ./main -->
    
    <div class="row">

    <h1 style="height: 50px;" class="text-center"><b>Overall Statistics</b> </h1>
        <div class="col-sm-6 col-md-6 text-center">
            <img src="main.png" alt="pie chart" height="400px" /><br>
            Ideas VS Problems
        </div>
        <div class="col-sm-6 col-md-6 text-center">
            <img src="idea.png" alt="pie chart" height="400px" /><br>
            Status of Ideas
        </div>
        <h1 style="height: 50px;" class="text-center"><b>User Statistics</b> </h1><br>

        <div class="col-sm-6 col-md-6 text-center">
            <img src="mainUser.png" alt="pie chart" height="400px" /><br>
            Ideas VS Problems
        </div>
        <div class="col-sm-6 col-md-6 text-center">
            <img src="ideaUser.png" alt="pie chart" height="400px" /><br>
            Status of Ideas
        </div>
    </div>
</main>
<?php include "footer.php" ?>