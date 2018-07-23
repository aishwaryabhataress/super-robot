<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $companyErr = "";
$name = $company = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["company"])) {
    $companyErr = "Company is required";
  } else {
    $company = test_input($_POST["comapny"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$company)) {
      $companyErr = "Only letters and white space allowed"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <table>
    <tr>
      <td> Name:</td>
      <td> <input type="text" name="name" value="<?php echo $name;?>"></td>
      <td><span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
      <td>Company:</td> 
      <td><input type="text" name="company" value="<?php echo $company;?>"></td>
      <td><span class="error">* <?php echo $companyErr;?></span></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
?>

</body>
</html>
