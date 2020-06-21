<?php require_once "functions.php"; ?>
<?php include "header.php" ?>

<?php 
db_connect();

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

$cmd = '"C:\Program Files\MATLAB\R2020a\bin\matlab.exe" -automation -sd ' . $pwd . ' -r "chart(' .$result->num_rows .','.$result2->num_rows.','.$result3->num_rows .',' .$result4->num_rows .','. $result5->num_rows .','. $result6->num_rows .');exit" -wait -logfile log.txt';
// exec

// $last_line = exec($cmd, $output, $retval);

// if ($retval == 0){
//   // Read from CSV file which MATLAB has created
//   // echo '<img src="main.png"/><br>';
//   // echo '<img src="idea.png"/><br>';
//   // echo '<img src="problem.png"/><br>';
// } else {
//   // When command failed
//   echo '<p>Failed</p>';
// }
?>

<!-- main -->
<main class="container" style = "width: 100%">
    <style>

        h2 {
            position: relative;
            left: 575px;
        }
        .rowView {
            
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
<!-- ./main -->
<h1 style = "height: 50px; padding-left: 680px;"><b> Statistics</b> </h1>
<div class="rowView">

    
    <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="main.png" alt="pie chart" width="500" height="400" class = "centerI" /><br>
        Legend title 1
    </div>
    <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="idea.png" alt="pie chart" width="500" height="400" class = "centerI"/><br>
        Legend title 2
    </div>
    <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="problem.png" alt="pie chart" width="500" height="400" class = "centerI"/><br>
        Legend title 3
    </div>
</div>
</main>
<?php include "footer.php" ?>



