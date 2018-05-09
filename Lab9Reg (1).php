<html>
<body>
<h1>Please provide the following information to register:</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
	<tr><td align=right>Type your ID:</td><td><input type="text" name="id" value=""><font color=red>(Only digits allowed)</font></td></tr>
    <tr><td align=right>Choose your password:</td><td><input type="password" name="passwd"></td></tr>
    <tr><td align=right>Retype your password:</td><td><input type="password" name="passwd2"></td></tr>
    <tr><td align=right>Your name:</td><td><input type="text" name="name" value=""></td></tr>
    <tr><td align=right>Your Email:</td><td><input type="text" name="email" value=""></td></tr>
    <tr><td align=right>Your picture:</td><td><input type="file" name="myfile"></td></tr>
    <tr><td align=right><input type="submit" name="submit" value="Sign up"></td>
    	<td><input type="reset" name="reset" value="Reset"></td></tr>
</table>
</form>
<?php
include "My-DB-Functions.php";
if(isset($_POST['submit']))
{
	if($_POST['passwd'] != $_POST['passwd2'])
    {
    	echo "password does not match<br/>";
		exit();
    }
    if(isset($_POST['id']) && !empty($_POST['id']) )
    {
    	$conn = My_Connect_DB();
        $sql = "CREATE TABLE Lab9 
        (
        	id int PRIMARY KEY,
            passwd VARCHAR(32),
            name   VARCHAR(32),
            salary float(2),
            bonus  float(2),
            photo  VARCHAR(128),
            email  VARCHAR(128)
        );";
        My_SQL_EXE($conn, $sql);
           
        //verify if the id already exists   
        $sql = "SELECT * FROM Employee WHERE id=".$_POST['id'].";";
        $result = My_SQL_EXE($conn, $sql);
        if(mysqli_num_rows($result) > 0)		//duplicate id
        {
        	echo "ID already exists, please choose another one<br/>";
        	//My_Show_Table($result);
            //exit();
            die();
		}
        else
        {
        	$file = uploadfile("myfile");
            //$sql = "INSERT INTO Employee VALUES (".
            //	$_POST['id'].",".md5($_POST['passwd']).",".$_POST['name'].",".
            //    rand(50000, 100000).","."0".",'".$file."','".$_POST['email']."'"
            //.");";
            $sql = "INSERT INTO Employee VALUES (".$_POST['id'].", '"
            			.md5($_POST['passwd'])."', '".$_POST['name']
                        ."', ".rand(50000, 100000).", 0, '"
                        .$file."','".$_POST['email']."');";
            
            //Run_SQL_Show_Table($conn, $sql, 'Employee');
            My_SQL_EXE($conn, $sql);
            Show_Employee($conn,$_POST['id']);
            echo "<hr/>";
            echo "Click <a href='Lab9.php'>here</a> to log in<br/>";
        }
    }
}

function Show_Employee($conn, $id)
{
	$sql = "SElECT * FROM Employee WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
    	echo "Your information for ". $id ." is as follows.<br/>";
        echo "ID: ".$row[0]."<br/>";
        echo "Name: ". $row[2]."<br/>";
        echo "Email: ".$row[6]."<br/>";
        echo "<img src='".$row[5]."' height=200px width=200px >";
    }
    else
    {
    	echo "No such ID: " .$id."<br/>";
    }    
}

//$myfile is the name of the file in the <form> .... </form>
//For example: <input type="file" name="myfile">
//return the file name in the server side after it is successfully uploaded
//otherwise return NULL
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