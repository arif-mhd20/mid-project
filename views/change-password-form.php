

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

      <legend>Change Password Form:</legend>

      
      <label for="pwd">password:</label>
      <input  type="password" id="pwd" name="pwd" d>

    </fieldset><br>

    <input type="submit" value="Change Password">
</form>


<span style = "color:red"><?php echo $message; ?></span>