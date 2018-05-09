<!DOCTYPE html>
 <html>
 <head>
 <title>
Lab 6
 </title>
 </head>
 <body>
 
 <?php
 
 $name = $_POST["name"];
 $email = $_POST["email"];
 $education = $_POST["education"];
 $position = $_POST["position"];
 
 ?>
 
 
 
 <h1>Application for GGC jobs</h1>
<p>Please fill in the information</p>

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
<table border=1>
<tr><td align=right>Name:</td><td><input type="text" name="name" value=""></td></tr>
<tr><td align=right>Email:</td><td><input type="email" name="email"  value=""></td></tr>
<tr><td align=right>Highest Education Degree:</td><td>
<select name="education">
  <option value="Doctor" >Doctor</option>
  <option value="Master" >Master</option>
  <option value="College"  >College</option>
  <option value="High School" >High School</option>  
</select> <br/><br/>

</td></tr>

<tr><td align=right>Position Applied:</td><td>
<select name="position">
  <option value="IT Help Desk Technician" >IT Help Desk Technician</option>
  <option value="Fron Desk Receptionist" >Fron Desk Receptionist</option>
  <option value="Janitor"  >Janitor</option>
  <option value="PHP Web Programmer" >PHP Web Programmer</option>  
</select> <br/><br/>

</td></tr>

<tr><td align=right>CV:</td><td><input type="file" name="mypdf"></td></tr>
<tr><td align=right>Photo:</td><td><input type="file" name="myimage"></td></tr>

<tr><td><input type="submit" name="submit" value="Submit"></td><td><input type="reset" name="reset"></td></tr>
</table>
</form>
<br/>
<hr/>


<?php








function UploadFile($fname, $fileAllowed, $allowSize)
{


	$uploadOK = 1;
    $dir = "uploads/";
    
    $file = $dir . basename($_FILES[$fname]["name"]);
    //echo "file name:" . $file;
    $fileType = pathinfo($file, PATHINFO_EXTENSION);
    
    $fileSize = $_FILES[$fname]["size"];
    
    if($fileSize > $allowSize)
    {
    	//echo "File is too large<br/>";
        $uploadOK = 0;
    }
    
    //echo "Type: ". $fileType;
    if(stristr($fileAllowed, $fileType)==false)
    {
    	//echo "File format is not allowed<br/>";
        $uploadOK = 0;
    }    
    /*
    if(file_exists($file))
    {
    	//echo "File already exists<br/>";
        $uploadOK = 0;
    }
    */
    if($uploadOK == 1)
    {
    	if(!move_uploaded_file($_FILES[$fname]["tmp_name"],$file))
        	$uploadOK = 0;
    }
/*    
    if($uploadOK==1)
    	echo "file loaded successfully<br/>";
	else
    	echo "file failed uploading<br/>";
*/    
    if($uploadOK==1)
    	return $file;
	else 
    	return false;
}



if(isset($_POST["submit"]))
{
echo "<br/>";
echo "Thank you for your application. Here is the information we received from you. Please verify!";
echo "<br/>";

echo "<table border =1>";
echo "<tr><td align=right>Name:</td><td>" . $name ."</td></tr>";
echo "<tr><td align=right>Email:</td><td>" . $email . "</td></tr>";
echo "<tr><td align=right>Highest Education Degree:</td><td>". $education . "</td></tr>";
echo "<tr><td align=right>Position Applied:</td><td>". $position . "</td></tr>";
	
    $imageName = "myimage";
	$imageSize = 5000000;
    $imageAllowed = "JPG:PNG:GIF:BMP:JPEG";
    
    $pdfName = "mypdf";
	$pdfSize = 1000000;
    $pdfAllowed = "PDF:PS"; 
    
    $pdf = UploadFile($pdfName, $pdfAllowed, $pdfSize);
    if($pdf != false)
		echo "<tr><td align=right>CV:</td><td>Click <a href='".$pdf."'>here</a> to see the PDF file.</td></tr><br/>";  
      else
      {
		echo "<tr><td align=right>CV:</td><td>Incorrect format! Unable to upload file</td></tr><br/>";
      }
    
	$image = UploadFile($imageName, $imageAllowed, $imageSize);
    if($image != false)
		echo "<tr><td align=right>Photo:</td><td><img src='".$image."' width=200 height=200></td></tr>";
       else
      {
		echo "<tr><td align=right>Photo:</td><td>Incorrect format! Unable to upload image</td></tr><br/>";
      }
	  
	  
}
?>

 </body>
 </html>