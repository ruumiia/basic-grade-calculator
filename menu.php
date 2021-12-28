<html>
<head></head>

<style>
<?php include 'design.css'; //css file for design ?>
</style>

<body>

<form method="post" action ="calculations.php"> 
<!-- form uses post method, with submit button going to the other php file -->

<div class = 'div-border'> <!-- div containing student number and subject code text boxes -->
Student Number: <input type="number" name="StudentNum" /> <br/>
Subject Code: <input type="text" name="SubjCode" />
</div>

<div class = 'div-row'> <!-- div with flexbox display to support 2 column display -->

<div class = 'div-column'> <!-- first div for first column -->

Midterm Details <br/> <!--input text boxes for midterm attendance grade and values and behavior -->
Attendance Grade: &emsp;<input type="number" name="AttendGrade1" class = 'input-width' > <br/>
Values and Behavior: <input type="number" name="ValueBehavior1" class = 'input-width' /> <br/>

Exercises <br/> <!--input text boxes for midterm exercise scores and average -->
X1: &emsp;&emsp; X2: &emsp;&emsp; X3:  &emsp;&ensp; Average: <br/>
<input type="number" name="ExerciseM1" class = 'input-width2' > &emsp; 
<input type="number" name="ExerciseM2" class = 'input-width2' > &emsp;
<input type="number" name="ExerciseM3" class = 'input-width2' > &emsp;
<input type="number" name="AverageExe1" class = 'input-width2 input-readonly' readonly>

<br/> <br/>

Quizzes <br/> <!--input text boxes for midterm quiz scores and average -->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<input type="number" name="QuizM1" class = 'input-width2' > &emsp; 
<input type="number" name="QuizM2" class = 'input-width2' > &emsp;
<input type="number" name="QuizM3" class = 'input-width2' > &emsp;
<input type="number" name="AverageQuiz1" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text box for midterm class standing-->
Class Standing: <input type="number" name="ClassStand1" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text boxes for midterm major exam score and the % score of the major exam-->
Major Exam: <input type="number" name="MajorExam1" class = 'input-width2'>
% of Major Exam: <input type="number" name="MajorPercent1" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text box for midterm grade-->
Midterm Grade: <input type="number" name="TermGrade1" class = 'input-width2 input-readonly' readonly>

</div>
<div class = 'div-column'> <!-- second div for second column -->

Final Details <br/> <!--input text boxes for final attendance grade and values and behavior -->
Attendance Grade: &emsp;<input type="number" name="AttendGrade2" class = 'input-width' > <br/>
Values and Behavior: <input type="number" name="ValueBehavior2" class = 'input-width' /> <br/>

Exercises <br/> <!--input text boxes for final exercise scores and average -->
X1: &emsp;&emsp; X2: &emsp;&emsp; X3:  &emsp;&ensp; Average: <br/>
<input type="number" name="ExerciseF1" class = 'input-width2' > &emsp; 
<input type="number" name="ExerciseF2" class = 'input-width2' > &emsp;
<input type="number" name="ExerciseF3" class = 'input-width2' > &emsp;
<input type="number" name="AverageExe2" class = 'input-width2 input-readonly' readonly>

<br/> <br/>

Quizzes <br/> <!--input text boxes for final quiz scores and average -->
Q1: &emsp;&emsp; Q2: &emsp;&emsp; Q3:  &emsp;&ensp; Average: <br/>
<input type="number" name="QuizF1" class = 'input-width2' > &emsp; 
<input type="number" name="QuizF2" class = 'input-width2' > &emsp;
<input type="number" name="QuizF3" class = 'input-width2' > &emsp;
<input type="number" name="AverageQuiz2" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text box for final class standing-->
Class Standing: <input type="number" name="ClassStand2" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text boxes for final major exam score and the % score of the major exam-->
Major Exam: <input type="number" name="MajorExam2" class = 'input-width2'>
% of Major Exam: <input type="number" name="MajorPercent2" class = 'input-width2 input-readonly' readonly> <br/> <br/>

<!--text box for final grade-->
Final Grade: <input type="number" name="TermGrade2" class = 'input-width2 input-readonly' readonly>

</div>
</div>  
<div class = 'div-border div-center'> <!--div to contain final course grade and submit button -->
Final Course Grade: <input type="number" name="FinalCourse" class = 'input-width2 input-readonly' /> <br/> <br/>
<input type="submit" value="Compute" />

</div>

</form>



</body>
    
</html>