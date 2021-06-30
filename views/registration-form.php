

<?php
	include '../operations/login_operations.php';

	$username = $fname = $lname = $gender = $birthday = $Religion = $email = $password = $Confirmpwd = "";
	$passwordErr = $usernameErr = $message = "";
	$flag = false;

	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$fname = htmlspecialchars($_POST['fname']);
		$lname = htmlspecialchars($_POST['lname']);
		$gender = htmlspecialchars($_POST['gender']);
		$birthday = htmlspecialchars($_POST['birthday']);
		$Religion = htmlspecialchars($_POST['Religion']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['pwd']);
		$Confirmpwd = htmlspecialchars($_POST['Confirmpwd']);
		$username = htmlspecialchars($_POST['username']);

		if($Confirmpwd !== $password )
		{
			$flag=true;
			$message = "passward didnt match";
		}

		if(empty($fname))
		{
			$fname = "First name cannot be empty!";
			$flag = true;
		}

		if(empty($lname))
		{
			$lname = "Last Name cannot be empty!";
			$flag = true;
		}

		if(empty($gender))
		{
			$gender = "Gender Cant be empty!";
			$flag = true;
		}

		if(empty($birthday))
		{
			$birthday = "Birthday can not be empty!";
			$flag = true;
		}

		if(empty($Religion))
		{
			$Religion = "Religion can not be empty!";
			$flag = true;
		}

		if(empty($email))
		{
			$email = "Email can not be empty!";
			$flag = true;
		}

		if(empty($Confirmpwd))
		{
			$Confirmpwd = "Password can not be empty!";
			$flag = true;
		}

			
		if(empty($username))
		{
			$usernameErr = "User name can not be empty!";
			$flag = true;
		}

		if(empty($password))
		{
			$passwordErr = "Password can not be empty!";
			$flag = true;
		}

		if(!$flag)
		{

			$user = new User();

			$user->setFirstName($fname);
			$user->setLastName($lname);
			$user->setGender($gender);
			$user->setBirthDay($birthday);
			$user->setReligion($Religion);
			$user->setEmail($email);
			$user->setPassword($password);
			$user->setUserName($username);

			//debugPrint($_POST);
			//debugPrint($user);
			
			saveLoginData($user);

			header("Location: log-in-form.php");
		}			
	}
?>




<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete = "off">
    <fieldset>



	<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


      <legend style="background-color:#0066ff;"><h2>Registration Form:</h2></legend>



      <label for="fname">First name:</label>
      <input type="text" id="fname" name="fname" ><br><br>

      <label for="lname">Last name:</label>
      <input type="text" id="lname" name="lname" ><br><br>

      <label for="gender">Gender:</label>

      <input type="radio" id="gender" name="gender" value="Male" >
      <label for="male">Male</label>

      <input type="radio" id="female" name="gender" value="female" >
      <label for="female">Female</label><br><br>

      <label for="birthday">DOB:</label>
      <input type="date" id="birthday" name="birthday" ><br><br>
      
      <label >Religion:</label>

      <select name="Religion" id="Religion">
        <option value="ISLAM">ISLAM</option>
        <option value="saab">CHRISTIANITY</option>
        <option value="mercedes">HINDUISM</option>
        <option value="audi">BUDDHISM</option>
      </select>
      <br><br>

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" ><br><br>
 
        
      <label for="username">username:</label>
      <input type="text" id="username" name="username" required><br><br>

	  <label for="pwd">Password:</label>
	  <input  type="password" id="pwd" name="pwd" required><br><br>
	  
	  <label for="Confirmpwd">Confirm Password:</label>
	  <input  type="password" id="Confirmpwd" name="Confirmpwd" required>

	</fieldset><br>

  <input style="" type="submit" value="Submit"  a href="homepage.php"a> 
</form>



<p>already have an account?<a href="log-in-form.php">Sign in</a></p>
