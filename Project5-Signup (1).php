<!DOCTYPE html>
<html>
<head>
<title>
Project 5 Sign Up
</title>
</head>

<body style="margin:auto;width:60%;text-align:center;position:relative;top:80px;">

<h1>Welcome to join the ITEC 4450 class!!!</h1>
<h2>Please provide the following information for registration</h2>

<div style="border:blue 5px solid;width:55%;text-align:center;position:relative;left:20%;">

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<table border=0 style="text-align:left">
<tr><td style="text-align:right">Choose your ID:</td><td> <input type="text" name="id"></td></tr>
<tr><td style="text-align:right">Choose your password:</td><td>  <input type="password" name="passwd"></td></tr>
<tr><td style="text-align:right">Retype your password:</td><td>  <input type="password" name="passwd2"></td></tr>
<tr><td style="text-align:right">Your name:</td><td>  <input type="text" name="name"></td></tr>
<tr><td style="text-align:right">Your email:</td><td>  <input type="text" name="email"></td></tr>
<tr><td style="text-align:right">Please upload your picture:</td><td>  <input type="file" name="myfile"></td></tr>
<tr><td style="text-align:right"></td><td><input type="submit" value="Sign up" name="submit"></td></tr>
</table>
</form>
</div>

<span style=color:red>Please fill in the information correctly!</span><br/>

<?php

include "My-DB-Functions.php";

if(isset($_POST["submit"]))
{
	if($_POST['passwd'] != $_POST['passwd2'])
    {
    	echo "Your password is not correct. Please choose another one.<br/>";
		exit();
    }
    
    if(isset($_POST['id']) && !empty($_POST['id']) )
    {
    	$conn = My_Connect_DB();
        $sql = "CREATE TABLE Project5 
        (
        	id int PRIMARY KEY,
            passwd VARCHAR(32),
            name   VARCHAR(32),
            email  VARCHAR(128),
            grade int,
            date VARCHAR(12),
            time VARCHAR(10),
            photo  VARCHAR(128) 
        );";
        
        My_SQL_EXE($conn, $sql);
           
        //verify if the id already exists   
        $sql = "SELECT * FROM Project5 WHERE id=".$_POST['id'].";";
        $result = My_SQL_EXE($conn, $sql);
       
       //check for duplicate ID
       if(mysqli_num_rows($result) > 0)		
        {
        	echo "This ID is being used. Please choose another one<br/>";
            die();
		}
        else
        {
        	$file = uploadfile("myfile");
            $sql = "INSERT INTO Project5 VALUES (".$_POST['id'].", '"
            			.md5($_POST['passwd'])."', '".$_POST['name']."', '".$_POST['email']
                        ."', ".rand(0, 100).", '".date("m/d/Y")."','".date("h:i:sA")."', '" 
                        .$file."');";
                     // echo "SQL ".$sql;
		$result = My_SQL_EXE($conn, $sql);
        
        }
    }
    
   header("location: Project5.php");
}

function uploadfile($myfile)
{
    $dir = "uploads/";
    $file = $dir . basename($_FILES[$myfile]['name']);
    if($_FILES[$myfile]['size']<50000000) //In Bytes, ie 50MB
    {
      $size = getimagesize($_FILES[$myfile]["tmp_name"]);
      if($size != 0)
      {
        $filetype = pathinfo($file,PATHINFO_EXTENSION);
        if(strcasecmp($filetype,"jpg")==0 || strcasecmp($filetype,"png")==0 || strcasecmp($filetype,"gif")==0)
        {
          if(!file_exists($file))
          {
            if(move_uploaded_file($_FILES[$myfile]["tmp_name"],$file))
            {            	
                return $file;
            }
          	else echo "Uploading failed";
          }
          else {echo "File already exists<br/>"; return $file;}
        }
        else echo "Wrong file types<br/>";
      }
      else echo "Not an image file<br/>";
    }
    else echo "file is too big<br/>";
    
    return NULL;
}

?>



</body>
</html>