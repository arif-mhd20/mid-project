

<?php
    include '../operations/login_operations.php';
    

    $password = "";
    $passwordErr = $message = "";
    $flag = false;

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $password = htmlspecialchars($_POST['pwd']);


        if(empty($password))
        {
            $passwordErr = "Password can not be empty!";
            $flag = true;
        }
        if(!$flag)
        {
            session_start();

            changePassword($_SESSION["username"], $password);

            header("Location: log-in-form.php");

        }			
    }

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete = "on">

    <fieldset>

      <legend>Change Password Form:</legend>

      
      <label for="pwd">password:</label>
      <input  type="password" id="pwd" name="pwd" d>

    </fieldset><br>

    <input type="submit" value="Change Password">
</form>


<span style = "color:red"><?php echo $message; ?></span>