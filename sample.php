<!DOCTYPE html>
<html>
<head>
<title>PHP Test</title>
<meta charset="utf-8">
</head>
<body>
<?php 
// Get current working directory
// magicSquare.m exists in this directory
require_once "functions.php";
db_connect();
//echo "Connected successfully";

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
// Set command. Please use -r option and remember to add exit in the last 
$cmd = '"C:\Program Files\MATLAB\R2020a\bin\matlab.exe" -automation -sd ' . $pwd . ' -r "chart(' .$result->num_rows .','.$result2->num_rows.','.$result3->num_rows .',' .$result4->num_rows .','. $result5->num_rows .','. $result6->num_rows .');exit" -wait -logfile log.txt';
// exec
$last_line = exec($cmd, $output, $retval);
//echo $cmd . '<br>';
//echo $last_line . '<br>';
//echo $output;
//echo $retval;
//echo $output;
if ($retval == 0){
  // Read from CSV file which MATLAB has created
  echo '<img src="main.png"/><br>';
  echo '<img src="idea.png"/><br>';
  echo '<img src="problem.png"/><br>';
} else {
  // When command failed
  echo '<p>Failed</p>';
}
?>
</body>
</html>