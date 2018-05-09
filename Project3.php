<!DOCTYPE html>
 <html>
 
 <head>
 <title>Project 3</title>
 </head>
 
 <body>
 
 
 <?php
 
 	  $name = $email = "";
      $nameError = $emailError = "";
    
	function validate_input($input)
    {
    	$input = trim($input); 
        $input = htmlspecialchars($input); 
        return $input;
    }
    
    
    if(isset($_POST["submit"]))
{

  if(empty($_POST["name"]))
           $nameError = "Name is required.";
          else 
          { 
           $name = validate_input($_POST["name"]);
        
          }

          if(empty($_POST["email"]))
           $emailError = "Email is required.";
          else
          {
               $email = validate_input($_POST["email"]);
                  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) //if not right
                  {
                   $emailError = "Invalid email format.";
                  }
                 
          
          }

           $Q1 = $_POST["Q1"];
           $Q2 = $_POST["Q2"];
           $Q3 = $_POST["Q3"]; 
           $Q4 = $_POST["Q4"];
}
 



 
 
 
  ?>
 
 
 
 
 
 
 
<h1>Welcome to PHP Survey!!!</h1>
<p>Please answer the following questions:</p>
<hr/>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Name: <input type="text" name="name" value ="<?php echo $name; ?>"> 
<font color=red>*<?php echo $nameError?></font><br><br>
E-mail: <input type="text" name="email" value = "<?php echo $email; ?>"> 
<font color=red>*<?php echo $emailError?></font><br><br>
<hr/>

<p>Questons 1</p>
Your age please:<input type="text" name="Q1" value ="<?php echo $Q1; ?>">
<br/>
<p>Questons 2</p>
How long on average do you use computers every day:<input type="text" name="Q2" value ="<?php echo $Q2; ?>">
<br/>

<p>Questons 3</p>
<p>You are:</p>
<input type="radio" value="A" name="Q3" <?php if($Q3 == "A") echo "checked";?>>A. Male<br/>
<input type="radio" value="B" name="Q3" <?php if($Q3 == "B") echo "checked";?>>B. Female<br/>
<input type="radio" value="C" name="Q3" <?php if($Q3 == "C") echo "checked";?>>C. Do not want to tell<br/>
<br/>

<p>Questons 4</p>
<p>PHP programming is challenging</p>
<input type="radio" value="A" name="Q4" <?php if($Q3 == "A") echo "checked";?>>A. Strongly Disagree<br/>
<input type="radio" value="B" name="Q4" <?php if($Q3 == "B") echo "checked";?>>B. Disagree<br/>
<input type="radio" value="C" name="Q4" <?php if($Q3 == "C") echo "checked";?>>C. Neutral<br/>
<input type="radio" value="D" name="Q4" <?php if($Q3 == "D") echo "checked";?>>D. Agree<br/>
<input type="radio" value="E" name="Q4" <?php if($Q3 == "E") echo "checked";?>>E. Strongly Agree<br/>
<br/>

<p>Questons 5</p>
<p>PHP programming is fun</p>
<input type="radio" value="A" name="Q5" <?php if($Q3 == "A") echo "checked";?>>A. Strongly Disagree<br/>
<input type="radio" value="B" name="Q5" <?php if($Q3 == "B") echo "checked";?>>B. Disagree<br/>
<input type="radio" value="C" name="Q5" <?php if($Q3 == "C") echo "checked";?>>C. Neutral<br/>
<input type="radio" value="D" name="Q5" <?php if($Q3 == "D") echo "checked";?>>D. Agree<br/>
<input type="radio" value="E" name="Q5" <?php if($Q3 == "E") echo "checked";?>>E. Strongly Agree<br/>
<br/>

<input type="submit" value="Submit this survey and see result" name="submit">
<input type="reset">

<hr/>

</form>


<?php
$file = "surveyresults-project3.txt"; 
$studentStr = file_get_contents($file);
$studentList = explode("\n", $studentStr);
//creates a SINGLE-dimension array with the info in the .txt, separated by new lines
foreach($studentList as $index=>$student)//with that single array
{    //the index is being iterated, due to nature of a for each loop
	 $studentArray[$index] = explode("\t", $student);//going to take that single dimension array, into 2 dimension
	//studentInfo is the second dimension of the array
}

$date = date("m/d/Y");
$time = date("h:i:sA");



$Info = "";
$Info .= $_POST["name"];
$Info .= "\t";
$Info .= $_POST["email"];
$Info .= "\t";
$Info .= $_POST["Q1"];
$Info .= "\t";
$Info .= $_POST["Q2"];
$Info .= "\t";
$Info .= $_POST["Q3"];
$Info .= "\t";
$Info .= $_POST["Q4"];
$Info .= "\t";
$Info .= $_POST["Q5"];
$Info .= "\t";
$Info .= $date;//date
$Info .= "\t";
$Info .= $time;
$Info .= "\t";
$Info .= $_SERVER["REMOTE_ADDR"]; //The IP address from which the user is viewing the current page.
$Info .= "\n";

file_put_contents($file, $Info, FILE_APPEND|LOCK_EX); 

//gender progress bar sorting
$nGenderStudents = array(0, 0, 0);
$genderCat = array("A", "B", "C");
$choiceOneArray = array("Male", "Female", "Can not tell");
$count = 0;
foreach($studentArray as $sex)
{	
	foreach($genderCat as $index=> $gender)
    {
    	if($gender == $sex[4])
        {
        	$nGenderStudents[$index] ++;
            $count++;
        }
    }
}

//challenging progress bar 
$nChallengingStudents = array(0, 0, 0, 0, 0);
$challengeCat = array("A", "B", "C", "D", "E");
$choiceTwoArray = array("Strongly Disagree", "Disagree", "Neutral", "Agree", "Strongly Agree");
$count = 0;
foreach($studentArray as $challenge)
{	
	foreach($challengeCat as $index=> $chall)
    {
    	if($chall == $challenge[5])
        {
        	$nChallengingStudents[$index] ++;
            $count++;
        }
    }
}

//fun progress bar sorting
$nFunStudents = array(0, 0, 0, 0, 0);
$funCat = array("A", "B", "C", "D", "E");
$choiceThreeArray = array("Strongly Disagree", "Disagree", "Neutral", "Agree", "Strongly Agree");
$count = 0;
foreach($studentArray as $fun)
{	
	foreach($funCat as $index=> $f)
    {
    	if($f == $fun[6])
        {
        	$nFunStudents[$index] ++;
            $count++;
        }
    }
}


if(isset($_POST["submit"]))
{
	
	//*********FIRST TABLE PROGRESS TABLE*********
 	echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;width:300px;'><td colspan=2>Percentage of participant gender(total participants: $count )</td></tr>";
	echo "<tr><td>Category</td><td>Percentage</td></tr>";
    foreach($genderCat as $index=>$category)
    {
    	echo "<tr>";//this is a row
        	echo "<td>" . $choiceOneArray[$index] . "</td>";
            echo "<td> <progress value= '".$nGenderStudents[$index]."' max='".count($studentArray)."'></progress>" . round(($nGenderStudents[$index]/$count) * 100, 2) . "% </td>";
        echo "</tr>";
    }
echo "</table>";
//echo "<br/>";
echo "<hr/>";

//*********SECOND TABLE (challenging) PROGRESS TABLE*********
 	echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;width:300px;'><td colspan=2>Percentage of participants believing PHP programming is challenging:</td></tr>";
	echo "<tr><td>Category</td><td align:right;>Percentage</td></tr>";
    foreach($challengeCat as $index=>$category)
    {
    	echo "<tr>";//this is a row
        	echo "<td>" . $choiceTwoArray[$index] . "</td>";
            echo "<td> <progress value= '".$nChallengingStudents[$index]."' max='".count($studentArray)."'></progress>" . round(($nChallengingStudents[$index]/$count) * 100, 2) . "% </td>";
        echo "</tr>";
    }
echo "</table>";

echo "<hr/>";
 

//*********THIRD TABLE (FUN) PROGRESS TABLE*********
 	echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;width:300px;'><td colspan=2>Percentage of participants believing PHP programming is fun:</td></tr>";
	echo "<tr><td>Category</td><td align:right;>Percentage</td></tr>";
    foreach($funCat as $index=>$category)
    {
    	echo "<tr>";//this is a row
        	echo "<td>" . $choiceThreeArray[$index] . "</td>";
            echo "<td> <progress value= '".$nFunStudents[$index]."' max='".count($studentArray)."'></progress>" . round(($nFunStudents[$index]/$count) * 100, 2) . "% </td>";
        echo "</tr>";
    }
echo "</table>";

echo "<hr/>";


	//fun and challenging

	echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;text-align:center;'><td colspan=10>People who strongly agree PHP programming is fun and challenging</td></tr>";
	echo "<tr><td>name</td><td>email</td><td>age</td><td>hours</td><td colspan=3>answers</td><td>date</td><td>time</td><td>IP</td></tr>";
	$answer = "E";
    foreach($studentArray as $value)
    {
    	//if statement goes right here to check for value[] == 'A' && value[] == 'A'
        if(($answer == $value[5]) && ($answer == $value[6]))
        {
          foreach($value as $info)
          {
              echo "<td>" . $info . "</td>";
          }
          echo "</tr>";
        }
    }
    echo "</table>";

echo "<hr/>";
	//people 30+ and spend 4+ hours on PC
    
	echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;text-align:center;'><td colspan=10>People who are 30+ yrs old and spend 4+ hours per day on compute</td></tr>";
	echo "<tr><td>name</td><td>email</td><td>age</td><td>hours</td><td colspan=3>answers</td><td>date</td><td>time</td><td>IP</td></tr>";
	
    foreach($studentArray as $value)
    {
    	//if statement goes right here to check for value[] == 'A' && value[] == 'A'
        if((30 <= $value[2]) && (4 <= $value[3]))
        {
          foreach($value as $info)
          {
              echo "<td>" . $info . "</td>";
          }
          echo "</tr>";
        }
    }
    echo "</table>";

echo "<hr/>";

	//people who took the survey after 09/22/2017 11:59:59 PM
    echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;text-align:center;'><td colspan=10>People who took the survey after 09/22/2017 11:59:59pm:</td></tr>";
	echo "<tr><td>name</td><td>email</td><td>age</td><td>hours</td><td colspan=3>answers</td><td>date</td><td>time</td><td>IP</td></tr>";
	
    $d1 = strtotime("September 23 2017");
    foreach($studentArray as $value)
    {
    	//if statement goes right here to check for value[] == 'A' && value[] == 'A'
        if($d1 < strtotime($value[7]))
        {
          foreach($value as $info)
          {
              echo "<td>" . $info . "</td>";
          }
          echo "</tr>";
        }
    }
    echo "</table>";
    
    echo "<hr/>";
    
    //all people who took survey
    echo "<table border=1>";
    echo "<tr style='background-color:green;color:white;text-align:center;'><td colspan=10>Display all the survey results</td></tr>";
	echo "<tr><td>name</td><td>email</td><td>age</td><td>hours</td><td colspan=3>answers</td><td>date</td><td>time</td><td>IP</td></tr>";
	$answer = "E";
    foreach($studentArray as $value)
    {
          foreach($value as $info)
          {
              echo "<td>" . $info . "</td>";
          }
          echo "</tr>";
        
    }
    echo "</table>";

}

?>




 </body>
 </html> 