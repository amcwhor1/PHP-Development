<?php

$nstars = 5;

echo "<div style = 'width: 100%; margin: auto; background-color: blue; line-height: 12px;'>";
echo "<div style = 'position: relative; left: 45%; color: red;'>";
for($line = 0; $line < $nstars; $line++)
{
	for($j = 0; $j < $nstars - $line; $j++)
       	echo "&nbsp;";
    

	for($k = 0; $k < $line + 1; $k++)
       	echo "*";
    
    echo "<br/>";
}
echo "</div>";
echo "</div>";

echo "<div style = 'width: 100%; margin: auto; background-color: blue; line-height: 12px;'>";
echo "<div style = 'position: relative; left: 43.5%; color: red;'>";
$nstars = 10;
for($line = 0; $line < $nstars; $line++)
{
	for($j = 0; $j < $nstars - $line; $j++)
       	echo "&nbsp;";
    

	for($k = 0; $k < $line + 1; $k++)
       	echo "*";
    
    echo "<br/>";
}
echo "</div>";
echo "</div>";

echo "<div style = 'width: 100%; margin: auto; background-color: blue; line-height: 12px;'>";
echo "<div style = 'position: relative; left: 42%; color: red;'>";
$nstars = 15;
for($line = 0; $line < $nstars; $line++)
{
	for($j = 0; $j < $nstars - $line; $j++)
       	echo "&nbsp;";
    

	for($k = 0; $k < $line + 1; $k++)
       	echo "*";
    
    echo "<br/>";
}
echo "</div>";
echo "</div>";


echo "<div style = 'width: 100%; margin: auto; background-color: blue; line-height: 12px;'>";
echo "<div style = 'position: relative; left: 45.5%; color: red;'>";
$nstars = 5;
for($line = 0; $line < $nstars; $line++)
{
	for($k = 0; $k < $nstars; $k++)
    {
    	echo "*";
    }
    echo "<br/>";
}
echo "</div>";
echo "</div>";

?>

<hr/>


<?php
$number = 94.3817;
    
    printf("Let <i>a</i>=94.3817. Displaying <i>a</i> using integer is: %d <br/>",$number); 
    printf("Let <i>a</i>=94.3817. Displaying <i>a</i> using float is: %f <br/>",$number); 
    printf("Let <i>a</i>=94.3817. Displaying <i>a</i> using float of 2 decimals is: %.2f <br/>",$number); 
    printf("Let <i>a</i>=94.3817. Displaying <i>a</i> using string is: 94.3817 <br/>",$number); 
    

?>



