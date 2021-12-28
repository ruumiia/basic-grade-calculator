<html>
<head>
<style>
<?php include 'design.css'; //css file for design ?>
</style>
</head>
<body>
<form>
<?php 

for ($x = 0; $x <= 1; $x++) { //initializing the variables to contain int values
    $ExerciseScore[0][$x] = 0;
    $ExerciseScore[1][$x] = 0;
    $QuizScore[0][$x] = 0;
    $QuizScore[1][$x] = 0;
    if ($x < 2) {
    $ExerciseSum[$x] = 0;
    $AverageExe[$x] = 0;
    $QuizSum[$x] = 0;
    $AverageQuiz[$x] = 0;
    $MajorExam[$x] = 0;
    $MajorPercent[$x] = 0;
    $ClassStand[$x] = 0;
    $AttendGrade[$x] = 0;
    $ValueBehavior[$x] = 0;
    }
}

$MidGrade = 0;
$FinalGrade = 0;
$CourseGrade = 0;

//assigning values from form input to php variables
$StudentNum = $_POST["StudentNum"];
$SubjectCode = $_POST["SubjCode"];

$ExerciseScore[0][0] = $_POST["ExerciseM1"];
$ExerciseScore[0][1] = $_POST["ExerciseM2"];
$ExerciseScore[0][2] = $_POST["ExerciseM3"];
$ExerciseScore[1][0] = $_POST["ExerciseF1"];
$ExerciseScore[1][1] = $_POST["ExerciseF2"];
$ExerciseScore[1][2] = $_POST["ExerciseF3"];

$QuizScore[0][0] = $_POST["QuizM1"];
$QuizScore[0][1] = $_POST["QuizM2"];
$QuizScore[0][2] = $_POST["QuizM3"];
$QuizScore[1][0] = $_POST["QuizF1"];
$QuizScore[1][1] = $_POST["QuizF2"];
$QuizScore[1][2] = $_POST["QuizF3"];

$MajorExam[0] = $_POST["MajorExam1"] ?? "0";
$MajorExam[1] = $_POST["MajorExam2"] ?? "0";

$AttendGrade[0] = $_POST["AttendGrade1"];
$AttendGrade[1] = $_POST["AttendGrade2"];

$ValueBehavior[0] = $_POST["ValueBehavior1"];
$ValueBehavior[1] = $_POST["ValueBehavior2"];

//for loop to add up exercise and quiz scores

for($x = 0; $x <= 2; $x++) {
$ExerciseSum[0] += $ExerciseScore[0][$x];
$ExerciseSum[1] += $ExerciseScore[1][$x];
$QuizSum[0] += $QuizScore[0][$x];
$QuizSum[1] += $QuizScore[1][$x];
}

//for loop to calculate averages of exercise and quiz scores, % of the major exam score, and class standing, rounded up to 2 decimals

for ($x = 0; $x <= 1; $x++) {
$AverageExe[$x] = (round($ExerciseSum[$x] / 3, 2));
$AverageQuiz[$x] = (round($QuizSum[$x] / 3, 2));
$MajorPercent[$x] = (round(($MajorExam[$x]/100)*50+50, 2));
$ClassStand[$x] = (round(($AttendGrade[$x]*0.10) + ($ValueBehavior[$x]*0.10) + ($AverageExe[$x]*0.80), 2));
}

//calculation of midterm, final, and final course grades

$MidGrade = (round(($ClassStand[0] / 3) + ($AverageQuiz[0]/3) + $MajorPercent[0],2));

$FinalGrade = (round(($ClassStand[1] / 3) + ($AverageQuiz[1]/3) + $MajorPercent[1],2));

$CourseGrade = (round(($MidGrade / 3) + (($FinalGrade*2)/3),2));

//if conditions to place the grades to max of 100 if there's an excess 

if ($MidGrade > 100) {
    $MidGrade = 100;
}
if ($FinalGrade > 100) {
    $FinalGrade = 100;
}
if ($CourseGrade > 100) {
    $CourseGrade = 100;
}
?>

<div class = 'div-border'> <!-- div containing student number and subject code text boxes -->
Student Number: <?php echo "<input type='text' value='$StudentNum' readonly/>"; ?> <br/>
Subject Code: <?php echo "<input type='text' value='$SubjectCode' readonly/>"; ?>
</div>

<div class = 'div-row'> <!-- div with flexbox display to support 2 column display -->

<div class = 'div-column'> <!-- first div for first column -->

Midterm Details <br/> <!--text boxes for midterm attendance grade and values and behavior -->
Attendance Grade: &emsp;<?php echo "<input type='text' class = 'input-width' value='$AttendGrade[0]'/>"; ?> <br/>
Values and Behavior: <?php echo "<input type='text' class = 'input-width' value='$ValueBehavior[0]'/>"; ?> <br/>

Exercises <br/> <!--text boxes for midterm exercise scores and average result-->
X1: &emsp;&emsp; X2: &emsp;&emsp; X3:  &emsp;&ensp; Average: <br/>
<?php $x = $ExerciseScore[0][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $ExerciseScore[0][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?>  &emsp;
<?php $x = $ExerciseScore[0][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?>  &emsp;
<?php echo "<input type='text' class = 'input-width2 input-readonly' value='$AverageExe[0]' readonly/>"; ?> 

<br/> <br/>

Quizzes <br/> <!--text boxes for midterm quiz scores and average result-->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<?php $x = $QuizScore[0][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $QuizScore[0][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php $x = $QuizScore[0][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php echo "<input type='text' class = 'input-width2 input-readonly' value='$AverageQuiz[0]' readonly/>"; ?>  <br/> <br/>

<!--text box for midterm class standing-->
Class Standing: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$ClassStand[0]' readonly/>"; ?> <br/> <br/>

<!--text boxes for midterm major exam score and the % score of the major exam-->
Major Exam: <?php echo "<input type='text' class = 'input-width2' value='$MajorExam[0]' readonly/>"; ?> 
% of Major Exam: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$MajorPercent[0]' readonly/>"; ?> <br/> <br/>

<!--text box for midterm grade-->
Midterm Grade: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$MidGrade' readonly/>"; ?>

</div>
<div class = 'div-column'> <!-- second div for second column -->

Final Details <br/> <!--text boxes for final attendance grade and values and behavior -->
Attendance Grade: &emsp;<?php echo "<input type='text' class = 'input-width' value='$AttendGrade[1]'/>"; ?> <br/>
Values and Behavior: <?php echo "<input type='text' class = 'input-width' value='$ValueBehavior[1]'/>"; ?> <br/>

Exercises <br/> <!--text boxes for final exercise scores and average result-->
X1: &emsp;&emsp; X2: &emsp;&emsp; X3:  &emsp;&ensp; Average: <br/>
<?php $x = $ExerciseScore[1][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $ExerciseScore[1][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?>  &emsp;
<?php $x = $ExerciseScore[1][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?>  &emsp;
<?php echo "<input type='text' class = 'input-width2 input-readonly' value='$AverageExe[1]' readonly/>"; ?> 

<br/> <br/>

Quizzes <br/> <!--text boxes for final quiz scores and average result-->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<?php $x = $QuizScore[1][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $QuizScore[1][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php $x = $QuizScore[1][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php echo "<input type='text' class = 'input-width2 input-readonly' value='$AverageQuiz[1]' readonly/>"; ?> <br/> <br/>

<!--text box for final class standing-->
Class Standing: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$ClassStand[1]' readonly/>"; ?> <br/> <br/>

<!--text boxes for final major exam score and the % score of the major exam-->
Major Exam: <?php echo "<input type='text' class = 'input-width2' value='$MajorExam[1]' readonly/>"; ?> 
% of Major Exam: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$MajorPercent[1]' readonly/>"; ?> <br/> <br/>

<!--text box for final grade-->
Final Grade: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$FinalGrade' readonly/>"; ?>

</div>
</div>  
<div class = 'div-border div-center'> <!--div to contain final course grade and back button -->
Final Course Grade: <?php echo "<input type='text' class = 'input-width2 input-readonly' value='$CourseGrade' readonly/>"; ?> <br/> <br/>
<input name="cmd_back" type="button" id="cmd_back" value="Back" onclick="location='GT1-1Vergara-AaronCharles.php'" />

</div>
</form>
</body>
</html>