<html>
 <head>
 <title>
Project 2
 </title>
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
    
    
    if(isset($_GET["submit"]))
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
<input type="radio" value="A" name="Q1"<?php if($q1 == "A") echo "checked";?>>A. $<br/>
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



<div style="text-align:left;background-color:pink;width:50%;margin:auto;">

<form action="http://admcwhorter92.altervista.org/actionProject2.php" method="post">

<div style="text-align:right;margin-right: 20%;">
Admistrator ID: <input type="text" name="id"> <font color=red>*</font><br>
Password: <input type="password" name="pw"> <font color=red>*</font><br>
</div>
<hr/>
<div style="text-align:left;margin-left: 20%;">
<input type="radio" name="sort" value="all">Show all grades<br/>
<input type="radio" name="sort" value="desc">Show all grades sorted descendly <br/>
<input type="radio" name="sort" value="p100">Show all grades that are 100<br/>
<input type="radio" name="sort" value="dm0">Show all grades that are 0 and are of Digital Media Major <br/>
</div>
<hr/>
<div style="text-align:center;">
<input type="submit" value="See grades" name="grades"><input type="reset">
</div>
</form>
</div>
 


<?php

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

$Info = "";
$Info .= $_GET["name"];
$Info .= "\t";
$Info .= $_GET["email"];
$Info .= "\t";
$Info .= $_GET["major"];
$Info .= "\t";
$Info .= $grade;
$Info .= "\t";
$Info .= $_SERVER["REMOTE_ADDR"]; //The IP address from which the user is viewing the current page.
$Info .= "\n";

$file = "Students-Grades-Info.txt";
file_put_contents($file, $Info, FILE_APPEND|LOCK_EX); 


?>



<hr/>
 </body>
 </html> 