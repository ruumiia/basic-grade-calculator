<html>
<head>
<style>
<?php include 'design.css'; //css file for design ?>
</style>
<script>

    //js functions for Midterm/Final Grade and Final Course Grade
    function MidFinalGrade (a, b, c) {
        
        let d = 0;
        
        d = ((a / 3) + (b/3) + c).toFixed(2);

            if (d > 100) {
            d = 100;
            }
        

        return d;
    }   

    function OverallCourseGrade (a, b) {  

        let c = 0;
        c = ((a / 3) + ((b*2)/3)).toFixed(2);

        if (c > 100) {
        c = 100;    
        }

        return c;  
    }

</script>

</head>
<body>
<form>
<?php 

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

?>

<script type="text/javascript">
    
    var ExerciseScores = <?php echo json_encode($ExerciseScore, JSON_NUMERIC_CHECK); ?>;
    var QuizScores = <?php echo json_encode($QuizScore, JSON_NUMERIC_CHECK); ?>;    

    //sum[0][0] & [0][1] = Midterm Exercise and Quiz Scores | sum[1][0] & [1][1] = Finals Exercise and Quiz Scores 
    let sum = [[0, 0], [0, 0]]; 
    //average[0][0] & [0][1] = Midterm Exercise and Quiz Averages | average[1][0] & [1][1] = Finals Exercise and Quiz Averages
    let average = [[0, 0], [0, 0]]; 
    let MajorPercent = [0, 0];
    let ClassStand = [0, 0];
    
    //for loop for getting midterm and finals score sums and average
    for (let x = 0; x < 2; x++) {
        for (let y = 0; y <= 2; y++){
            sum[0][x] += ExerciseScores[x][y];
            sum[1][x] += QuizScores[x][y];
        }
        average[0][x] = (sum[0][x] / 3).toFixed(2);
        average[1][x] = (sum[1][x] / 3).toFixed(2);
    }
    
    var MajorExams = <?php echo json_encode($MajorExam, JSON_NUMERIC_CHECK); ?>;
    
    //for loop for getting major exam percentage
    for (let x = 0; x < 2; x++) {
    MajorPercent[x] = (MajorExams[x]/100)*50+50;
    }
    
    var AttendGrades = <?php echo json_encode($AttendGrade, JSON_NUMERIC_CHECK); ?>;
    var ValuesGrade = <?php echo json_encode($ValueBehavior, JSON_NUMERIC_CHECK); ?>;
    
    //for loop for getting class standing score
    for (let x = 0; x < 2; x++) {
        ClassStand[x] = ((AttendGrades[x]*0.10) + (ValuesGrade[x]*0.10) + (average[0][x]*0.80)).toFixed(2);
    }

    //function call
    let MidGrade = MidFinalGrade(ClassStand[0], average[1][0], MajorPercent[0]);
    let FinalGrade = MidFinalGrade(ClassStand[1], average[1][1], MajorPercent[1]);
    let CourseFinal = OverallCourseGrade(MidGrade, FinalGrade);

</script>

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
<input type='text' class = 'input-width2 input-readonly' id = "AveExercise1" readonly/>
<script> document.getElementById("AveExercise1").value = average[0][0]; </script>

<br/> <br/>

Quizzes <br/> <!--text boxes for midterm quiz scores and average result-->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<?php $x = $QuizScore[0][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $QuizScore[0][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php $x = $QuizScore[0][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<input type='text' class = 'input-width2 input-readonly' id = "AveQuiz1" readonly/>  <br/> <br/>
<script> document.getElementById("AveQuiz1").value = average[1][0]; </script>

<!--text box for midterm class standing-->
Class Standing: <input type='text' class = 'input-width2 input-readonly' id = "ClassStand1" readonly/> <br/> <br/>
<script> document.getElementById("ClassStand1").value = ClassStand[0]; </script>

<!--text boxes for midterm major exam score and the % score of the major exam-->
Major Exam: <?php echo "<input type='text' class = 'input-width2' value='$MajorExam[0]' readonly/>"; ?> 
% of Major Exam: <input type='text' class = 'input-width2 input-readonly' id = "MajorPercent1" readonly/> <br/> <br/>
<script> document.getElementById("MajorPercent1").value = MajorPercent[0]; </script>

<!--text box for midterm grade-->
Midterm Grade: <input type='text' class = 'input-width2 input-readonly' id = "MidGrade" readonly/>
<script> document.getElementById("MidGrade").value = MidGrade; </script>

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
<input type='text' class = 'input-width2 input-readonly' id = "AveExercise2" readonly/>
<script> document.getElementById("AveExercise2").value = average[0][1]; </script>

<br/> <br/>

Quizzes <br/> <!--text boxes for final quiz scores and average result-->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<?php $x = $QuizScore[1][0]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp; 
<?php $x = $QuizScore[1][1]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<?php $x = $QuizScore[1][2]; echo "<input type='text' class = 'input-width2' value='$x' readonly/>"; ?> &emsp;
<input type='text' class = 'input-width2 input-readonly' id = "AveQuiz2" readonly/> <br/> <br/>
<script> document.getElementById("AveQuiz2").value = average[1][1]; </script>

<!--text box for final class standing-->
Class Standing: <input type='text' class = 'input-width2 input-readonly' id = "ClassStand2" readonly/> <br/> <br/>
<script> document.getElementById("ClassStand2").value = ClassStand[1]; </script>

<!--text boxes for final major exam score and the % score of the major exam-->
Major Exam: <?php echo "<input type='text' class = 'input-width2' value='$MajorExam[1]' readonly/>"; ?> 
% of Major Exam: <input type='text' class = 'input-width2 input-readonly' id = "MajorPercent2" readonly/> <br/> <br/>
<script> document.getElementById("MajorPercent2").value = MajorPercent[1]; </script>

<!--text box for final grade-->
Final Grade: <input type='text' class = 'input-width2 input-readonly' id = "FinalGrade" readonly/>
<script> document.getElementById("FinalGrade").value = FinalGrade; </script>

</div>
</div>  
<div class = 'div-border div-center'> <!--div to contain final course grade and back button -->
Final Course Grade: <input type='text' class = 'input-width2 input-readonly' id = "FinalCourse" readonly/> <br/> <br/>
<script> document.getElementById("FinalCourse").value = CourseFinal; </script>

<input name="cmd_back" type="button" id="cmd_back" value="Back" onclick="location='menu.php'" />

</div>
</form>
</body>
</html>