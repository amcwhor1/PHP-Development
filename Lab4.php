<!DOCTYPE html>
 <html>
 <head>
<style>
.error {color: #FF0000;}
</style>
 <title>
Lab 4
 </title>
 </head>
 <body>
 
<?php
$query = $search = "";
    $searchError = "";
    function test_input($input)
    {
    $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    if(isset ($_POST['Submit']))
    {
    if(empty($_POST['name']))
        $nameError = "Missing";
        else $name = test_input($_POST['name']);
        
        $query = test_input($_POST['query']);
    }
    
    $CitiInfo = array
    (    array("New York", "NY", 8008278,103246,12345),
         array("Los Angeles", "CA", 3694820,100000,12346),
         array("Chicago", "IL", 2896016,93591,12347),
         array("Houston", "TX", 1953631,98174,12348),
         array("Philadelphia", "PA", 1517550,91083,12349),
         array("Phoenix", "AZ", 1321045,83412,29874),
         array("San Diego", "CA", 1223400,99247,29875),
         array("Dallas", "TX", 1188580,90111,29876),
         array("San Antonio", "TX", 1144646,89925,29877),
         array("Detroit", "MI",951270,80188,29878)
    );

?>

<div style="width:60%;margin:auto;">
<h1>City Info Query System</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP-SELF']); ?>">
<p><span class="error">* required field.</span></p>

Query by: 
<select name="query">
  <option value="city" <?php if ($query == "city") echo "selected";?> >City</option>
  <option value="state" <?php if ($query == "state") echo "selected";?> >State</option>
  <option value="income" <?php if ($query == "income") echo "selected";?> >Income</option>
</select> <br/><br/>

Type the State, City Name or Income that you want to search: <input type="text" name="search"
value = "<?php echo $search; ?>">
<span class="error">*<?php echo $searchError;?></span><br/><br/>

<input type=Submit name="Submit" value = "Submit">
</form>

<hr/>

<?php

if(isset($_POST['Submit']))
{
	if($_POST["search"] != "")
    {

      if ($_POST["query"] == "city") $index = 0;
      if ($_POST["query"] == "state") $index = 1;
      if ($_POST["query"] == "income") $index = 3;

$count = 0;
echo "<hr/>";
echo 
"<table border = 1>
        <tr>
        <td>City</td>
        <td>State</td> 
        <td>Population</td>
        <td>Income</td>
        <td>Zipcode</td>
        </tr>";

foreach($CitiInfo as $city)
{
if($city[$index] == $_POST["search"])
    {
    	$count++;
        echo "<tr>";
        foreach($city as $value)
          echo "<td>" . $value . "</td>";
          echo "</tr>";
    }
}
echo "</table><br/>";

echo "We found " . $count . " result(s) matching your search.";
}
}

?>

 </div>
 </body>
 </html>
