

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

      <legend>Login Form:</legend>

      <label for="username">username:</label>
      <input type="text" id="username" name="username" ><br><br>
      
      <label for="pwd">password:</label>
      <input  type="password" id="pwd" name="pwd" d>

    </fieldset><br>

    <input style="" type="submit" value="Log In">
</form>


<span style = "color:red"><?php echo $message; ?></span>