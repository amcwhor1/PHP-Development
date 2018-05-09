<!DOCTYPE html>
 <html>
 
 <head>
 <title>Lab 5 </title>
 </head>
 
 <body>

<?php

//file with all the data
$file = "Students-Grades-Info.txt"; 

$studentStr = file_get_contents($file);

$studentList = explode("\n", $studentStr);
//creates a SINGLE-dimension array with the info in the .txt, separated by new lines


foreach($studentList as $index=>$student)//with that single array
{    //the index is being iterated, due to nature of a for each loop
	 $StudentsAr[$index] = explode("\t", $student);//going to take that single dimension array, into 2 dimension
	//studentInfo is the second dimension of the array
}

//post takes in the "name" of whatever you call it
$sort = $_POST["sort"];

?>



<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

<table style="background-color:pink;margin:auto;" border=0>

<thead align="center"><tr><td colspan="2">Sorting information in different ways</td></tr></thead>
<tr><td colspan=2><hr/></td><td>

<tr><td align=right><input type=radio name="sort" value="nameAsc" ></td><td>Sort by name in ascending order </td></tr>
<tr><td align=right><input type=radio name="sort" value="emailDesc"></td><td>Sort by email in descending order </td></tr>
<tr><td align=right><input type=radio name="sort" value="majorAsc" ></td><td>Sort by major in ascending order </td></tr>
<tr><td align=right><input type=radio name="sort" value="gradeDesc" ></td><td>Sort by grade in descending order </td></tr>

<tr><td colspan=2 align="center"><input name="submit" alt="Login" type="submit" value="submit"> </td></tr>

</table>
</form>

<?php



function createTable($array)
{
echo "Totally 193 students listed below";
echo "<table border =1>"; //how thick you want the border of the able to be
//<tr> = table    <td> = element in row
echo "<tr><td>Name</td><td>Email</td><td>Major</td><td>Grade</td><td>IP</td></tr>";

	foreach($array as $value) //for each element in the single dimension array
    {
    //its outside because you dont want to create a new row for each element in 2d array
       	echo "<tr>";//outside of nested for each
        
        // each value of that person
    	foreach($value as $info)
        {
        	echo "<td>" . $info . "</td>"; // create cell for each value of that person
        }
        echo "</tr>";
    }
    echo "</table>";
}


function swapColumns($m, $n)
{
    //global means it is getting it from THIS file rather than being declared inside
	global $StudentsAr;
    
	foreach($StudentsAr as $i => $person )
    {
    	$count++;
		$temp = $person[$m];
    	$StudentsAr[$i][$m] = $person[$n];
    	$StudentsAr[$i][$n] = $temp;
    }
}

echo "<br/>";


if(isset($_POST['submit']))
{

	if($sort == "nameAsc")
    {
    	sort($StudentsAr);
        createTable($StudentsAr);
        
    }
    else if($sort == "emailDesc")
    {
    	swapColumns(0, 1);
        rsort($StudentsAr);
        swapColumns(0, 1);
    	createTable($StudentsAr);
    }
    else if($sort == "majorAsc")
    {
    	swapColumns(0, 2);
        sort($StudentsAr);
        swapColumns(0, 2);
        createTable($StudentsAr);
    }
    else
    {
    	swapColumns(0, 3);
        rsort($StudentsAr);
        swapColumns(0, 3);
    	createTable($StudentsAr);
    }
  

}



?>



 </body>
 </html>
