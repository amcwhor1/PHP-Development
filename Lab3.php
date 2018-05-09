<!DOCTYPE html>
 <html>
 <head>
<style>
.error {color: #FF0000;}
</style>
 <title>
Lab 3
 </title>
 </head>
 <body>


<?php
    $name = "";
    $nameError = "";
    function test_input($input)
    {
    $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    if(isset ($_POST['submit']))
    {
if(empty($_POST['name']))
$nameError = "Name is required!";
        else $name = test_input($_POST['name']);
    }
 
?> 





<h1>Birthday Count Down</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><span class="error">* required field. </span></p>

Your name please: <input type="text" name="name" value = "<?php echo $name; ?>">
<span class="error">*<?php echo $nameError?></span><br/><br/>

Select the month of your birthday:
<select name="month">
  <option value="January" >January</option>
  <option value="February" >February</option>
  <option value="March"  >March</option>
  <option value="April" >April</option>
  <option value="May" >May</option>
  <option value="June" >June</option>
  <option value="July" >July</option>
  <option value="August" >August</option>
  <option value="September" >September</option>
  <option value="October" >Octber</option>
  <option value="November" >November</option>
  <option value="December" >December</option>  
</select> <br/><br/>

Specify the date of your birthday:
<input type="text" name="date" value= "<?php echo $date; ?>"> <br/><br/>

Specify the year you were born: 
<input type="text" name="year"value ="<?php echo $year; ?>"><br/><br/>

<input type=submit name="submit" value="Submit">
</form>
<hr/>

<?php
if(isset($_POST["submit"]))
{
	$month = $date = $year = "";

	$month = $_POST["month"];
    $date = $_POST["date"];
    $year = $_POST["year"];
        
    $birthday = strtotime($month . " " . $date . " " . $year);
    echo "Your birthday is: ". date("m/d/Y",$birthday)."."."<br/>";
    
    $age = date("Y") - $year;
    echo "You are ". $age. " years old." . "<br/>";
    
    $nextBirthday = strtotime($month ." ". $date ." ". ($year+$age));
    $daysNextBirthday = ceil(($nextBirthday - time())/60/60/24);
    
    echo "There are ".$daysNextBirthday." days until your upcoming birthday."."<br/><br/>";  
    echo "<hr/>";
 	    
    $str = date("m", $birthday)."/01/".date("Y",$birthday);
    $beginBirthMonth = strtotime($str);
    
    echo "Calendar for ".date("M \of Y", $birthday) . "<br/>";
	echo "<table border = 1>";
	echo "<tr><td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td></tr>";
	$startDay = date("w", $beginBirthMonth);
	echo "<tr>";
    
	for($i=0; $i<$startDay;$i++)
    	echo "<td>&nbsp;</td>";
    do{
    	if((date("d", $beginBirthMonth) == date("d", $birthday))) 
        echo "<td style='background-color:pink'>" .date("d",$beginBirthMonth)."</td>";
        else
    	echo "<td>".date("d",$beginBirthMonth)."</td>";
        if(date("w",$beginBirthMonth) == 6) echo "</tr>"."<tr>";
        $beginBirthMonth = strtotime("+1 day", $beginBirthMonth);
    }while (date("d", $beginBirthMonth) > 1);
      echo "</tr>";
      echo "</table>"; 
}
?>

 </body>
 </html> 
