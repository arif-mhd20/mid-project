

<?php
    include '../operations/login_operations.php';
    

    $password = $username = "";
    $passwordErr = $usernameErr = $message = "";
    $flag = false;

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $password = htmlspecialchars($_POST['pwd']);
        $username = htmlspecialchars($_POST['username']);

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
            $loginInfo = getLoginData();
            //debugPrint($loginInfo);

            $size = count($loginInfo);

            for ($x = 0; $x < $size; $x++) {
                if($loginInfo[$x]->getUserName() == $username && $loginInfo[$x]->getPassword() == $password){
                    session_start();
                    if(isset($_SESSION["username"])){
                        unset($_SESSION["username"]);
                    }
                    if(isset($_SESSION["profile"])){
                        unset($_SESSION["profile"]);
                    }

                    $_SESSION["username"] = $username;
                    $_SESSION["profile"] = json_encode($loginInfo[$x]);
                    header("Location: homepage.php");
                    return;
                } 
            } 

            $message = "Log-in failed!";

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

      <legend style="background-color:#00ffff;">Login Form:</legend>

      <label for="username">username:</label>
      <input type="text" id="username" name="username" ><br><br>
      
      <label for="pwd">password:</label>
      <input  type="password" id="pwd" name="pwd" d>

    </fieldset><br>

    <input style="" type="submit" value="Log In">
</form>


<span style = "color:red"><?php echo $message; ?></span>

<p>Dont have an account?<a href="registration-form.php">Register</a></p>