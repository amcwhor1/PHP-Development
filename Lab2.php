<!DOCTYPE html>
<html>
  <head>
      <title>
      	Lab 2
      </title>
      
      <style>
      h1{
      	text-align: center;
      }
     
      
     form{
     	text-align: center;
        background-color: pink;
 
     }
        .required {color: red;}
        </style>
  </head>
  
<body>
 <h1>Student Fruit Survey</h1>
 <hr/>
 <?php
      
      $name = $address = $email = $numFruit = $favFruit = $brochure = "";
      $nameError = $addressError = $emailError = $numError = $favError = $brochureError="";
    
	function validate_input($input)
    {
    	$input = trim($input); //this trims white space
        $input = htmlspecialchars($input); 
        return $input;
    }
     
    if(isset ($_POST["submit"])) //checks to see if something has been posted
    {
        if(empty($_POST["name"]))
       	 $nameError = "Name is required.";
        else //if good, just keep on going
       	 $name = validate_input($_POST["name"]);
        
        if(empty($_POST["email"]))
       	 $emailError = "Email is required.";
        else
        {
        	 $email = validate_input($_POST["email"]);
         	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) //if not right
         	 $emailError = "Email is not in correct format.";
        }
       
       $address = validate_input($_POST["address"]);
        
        $numFruit= $_POST["numFruit"];
        
        $favFruit= $_POST["favFruit"];
        
        $brochure= $_POST["brochure"];
    }
  ?>

<form method="post" action= 
    "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
   	    
        Name: <input type="text" name="name" value="<?php echo $name; ?>" > 
        <span class="required">* <?php echo $nameError?></span> <br/><br/>
       
        Address: <input type="text" name="address" value="<?php echo $address; ?>" > 
        <?php echo $addressError?> <br/><br/>
       
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="required">*<?php echo $emailError?></span> <br/><br/>
        
        How many pieces of fruit do you eat per day? 
        <input type="radio" name="numFruit" value="0" 
        <?php if($numFruit == "0") echo "checked";?>> 0
        
        <input type="radio" name="numFruit" value="1"
        <?php if($numFruit == "1") echo "checked";?>> 1
        
        <input type="radio" name="numFruit" value="2"
        <?php if($numFruit == "2") echo "checked";?>> 2
        
        <input type="radio" name="numFruit" value="more"
        <?php if($numFruit == "more") echo "checked";?>> more
        
                
      
        <br/>
        <br/>
          Your favorite fruit is:
          <select name="favFruit">
          <option value="ap" <?php if($favFruit == "ap") echo "selected";?>>Apple</option>
          <option value="ba" <?php if($favFruit == "ba") echo "selected";?>>Banana</option>
          <option value="pl" <?php if($favFruit == "pl") echo "selected";?>>Plum</option>
          <option value="po" <?php if($favFruit == "po") echo "selected";?>>Pomengranate</option>
          <option value="st" <?php if($favFruit == "st") echo "selected";?>>Strawberry</option>
          <option value="wa" <?php if($favFruit == "wa") echo "selected";?>>Watermelon</option>
          <option value="ot" <?php if($favFruit == "ot") echo "selected";?>>Other</option>
          </select>
        <br/>
         <br/>
         
         Would you like a brochure?
         <input type="checkbox" name="brochure" value="yes" 
         <?php if($brochure == "yes") echo "checked";?>> 
         <br/>
         
          <input type="submit" value="submit" name="submit">
          
    </form>
    <hr/>
    <?php
    
    if(isset ($_POST["submit"])) 
    {    
        echo "Your name is ".$name."<br/>";
        echo "Your address is ".$address."<br/>";
        echo "Your email is ".$email."<br/>";
        
        if($numFruit == "more")
        	echo "You eat a lot of fruit!";
        else
        	echo "You eat ".$numFruit. " pieces of fruit each day"."<br/>";
            
        if($favFruit == "ap")
        	echo "My favorite fruit is apple"."<br/>";
        else if($favFruit == "ba")
        	echo "My favorite fruit is banana"."<br/>";
       else if($favFruit == "pl")
        	echo "My favorite fruit is plum"."<br/>";
        else if($favFruit == "st")
        	echo "My favorite fruit is strawberry"."<br/>";
        else if($favFruit == "wa")
        	echo "My favorite fruit is watermelon"."<br/>";
        else
        	echo "My favorite fruit is other"."<br/>";
            
        if($brochure == "yes") echo "You would like a brochure";
      else
        echo "You do not want a brochure";
    }
    
    
    
    ?>
     
        
        
</body>

</html>
