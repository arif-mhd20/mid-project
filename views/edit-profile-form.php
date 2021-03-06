<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: log-in-form.php");
	}
?>

<?php
    include 'menu-layout.php'
?>

<?php
include '../operations/login_operations.php';




$username = $fname = $lname = $gender = $birthday = $Religion = $email = $password = $Confirmpwd = "";
$passwordErr = $usernameErr = $message = "";
$flag = false;

$profile;

session_start();

if(isset($_SESSION["profile"])){
    $profile = new User();
    
    $profile->turnObjectPropertiesToObjProperties(json_decode($_SESSION["profile"]));
    //debugPrint($profile);

}

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $gender = $profile->gender;
    $birthday = htmlspecialchars($_POST['birthday']);
    $Religion = $profile->religion;
    $email = htmlspecialchars($_POST['email']);
    $password = $profile->password;
    $Confirmpwd = $profile->password;
    $username = $profile->userName;

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
        
        updateProfile($user);

        header("Location: log-in-form.php");
    }			
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
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

  <legend><h2>Registration Form:</h2></legend>

  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname" value="<?php echo $profile->firstName ?>" ><br><br>

  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname" value="<?php echo $profile->lastName ?>" ><br><br>

  <label for="birthday">DOB:</label>
  <input type="date" id="birthday" name="birthday" value="<?php echo $profile->birthday ?>"><br><br>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $profile->email ?>"> <br><br>

</fieldset><br>

<input type="submit" value="Submit"  > 
</form>



<p><a href="homepage.php">Go Back</a></p>
