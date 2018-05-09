<!DOCTYPE html>
 <html>
 <head>
 <title>
Project 1
 </title>
 </head>
 <body>
  
  <?php
      
      $name = $email = "";
      $nameError = $emailError = "";
    
	function validate_input($input)
    {
    	$input = trim($input); //this trims white space
        $input = htmlspecialchars($input); 
        return $input;
    }
     
    if(isset ($_GET["submit"])) //checks to see if something has been posted
    {
        if(empty($_GET["name"]))
       	 $nameError = "Name is required.";
        else 
        { 
       	 $name = validate_input($_GET["name"]);
         $major = $_GET["major"];
         $q1 = $_GET["Q1"];
         $q2 = $_GET["Q2"];
         $q3 = $_GET["Q3"]; 
         $q4 = $_GET["Q4"];
        }
        
        if(empty($_GET["email"]))
       	 $emailError = "Email is required.";
        else
        {
        	 $email = validate_input($_GET["email"]);
         	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) //if not right
         	 $emailError = "Invalid email format.";
               $major = $_GET["major"];
         $q1 = $_GET["Q1"];
         $q2 = $_GET["Q2"];
         $q3 = $_GET["Q3"]; 
         $q4 = $_GET["Q4"];
        }
        
       
        
    }
  ?>

  
<h1>Alex McWhorter's Exam</h1>
<p>Please answer the following questions:</p>
<hr/>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">

Name: <input type="text" name="name" value="<?php echo $name; ?>"> 
<span class="error"><font color=red>*<?php echo $nameError?></font></span><br>

E-mail: <input type="text" name="email" value="<?php echo $email; ?>"> 
<span class="error"><font color=red>*<?php echo $emailError?></font></span><br>
<hr/>
Choose your major area of study: <select name="major">
  <option value="Digital Media" <?php if($major == "Digital Media") echo "selected";?>  >Digital Media</option>
  <option value="Software" <?php if($major == "Software") echo "selected";?>  >Software</option>
  <option value="Security" <?php if($major == "Security") echo "selected";?>  >Security</option>
  <option value="Business" <?php if($major == "Business") echo "selected";?>  >Business</option>
  <option value="Other"  <?php if($major == "Other") echo "selected";?> >Other</option>
</select> <br/>
<hr/>

<p>Questons 1 (25points)</p>
<p>What symbol is in front a variable name in PHP?</p>
<input type="radio" value="A" name="Q1"<?php if($q1 == "A") echo "checked";?>   >A. $<br/>
<input type="radio" value="B" name="Q1" <?php if($q1 == "B") echo "checked";?>>B. %<br/>
<input type="radio" value="C" name="Q1" <?php if($q1 == "C") echo "checked";?> >C. #<br/>
<input type="radio" value="D" name="Q1" <?php if($q1 == "D") echo "checked";?> >D. @<br/>
<hr/>

<p>Questons 2 (25points)</p>
<p>How do you close a PHP tag?</p>
<input type="radio" value="A" name="Q2"  <?php if($q2 == "A") echo "checked";?> >A. >><br/>
<input type="radio" value="B" name="Q2"  <?php if($q2 == "B") echo "checked";?> >B. .?<br/>
<input type="radio" value="C" name="Q2"  <?php if($q2 == "C") echo "checked";?> >C. ?><br/>
<input type="radio" value="D" name="Q2" <?php if($q2 == "D") echo "checked";?>  >D. >?<br/>
<hr/>

<p>Questons 3 (25points)</p>
<p>What year was PHP invented?</p>
<input type="radio" value="A" name="Q3"  <?php  if($q3 == "A") echo "checked";?> >A. 2001<br/>
<input type="radio" value="B" name="Q3"  <?php if($q3 == "B") echo "checked";?> >B. 1985<br/>
<input type="radio" value="C" name="Q3"  <?php if($q3 == "C") echo "checked";?> >C. 1994<br/>
<input type="radio" value="D" name="Q3"  <?php if($q3 == "D") echo "checked";?> >D. 1999<br/>
<hr/>

<p>Questons 4 (25points)</p>
<p>Who created PHP?</p>
<input type="radio" value="A" name="Q4" <?php if($q4 == "A") echo "checked";?> >A. Linus Torvalds<br/>
<input type="radio" value="B" name="Q4" <?php if($q4 == "B") echo "checked";?> >B. Bill Gates<br/>
<input type="radio" value="C" name="Q4" <?php if($q4 == "C") echo "checked";?> >C. Steve Jobs<br/>
<input type="radio" value="D" name="Q4" <?php if($q4 == "D") echo "checked";?> >D. Rasmus Lerdorf<br/>
<hr/>

<input type="submit" value="Submit Test" name="submit">
<input type = reset>
</form>
<br/>
<?php
$grade = 0;

if(isset($_GET["submit"]))
{

echo "Your test results: <br/>";
echo "Name: " . $name ."<br/>";
echo "Email: ".$email."<br/>";
echo "Major: " . $major. "<br/>";

  if($_GET["Q1"] == "A")
      $grade += 25;
  if($_GET["Q2"] == "C")
      $grade += 25;
  if($_GET["Q3"] == "B")
      $grade += 25;
  if($_GET["Q4"] == "D")
      $grade += 25;
  echo "Your grade for this test is: ".$grade. "<br/>";
}




?>


<hr/>
 </body>
 </html> 