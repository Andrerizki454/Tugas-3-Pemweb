<!DOCTYPE html>
<html>
<head>
<title>Login Page Test Script.</title>
<link rel="stylesheet" type="text/css" href="log.css"/>
</head>
<body>
<div class="box">
    <div class="log">
        <form method="post" action="login.php" >
            <label for="username"><b>Username</b></label><br>
                <input type="text" placeholder="Masukkan Username" name="username" />
                <br><br>
            <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Masukkan Password" name="password" />
                <br><br>
    </div>
        <input class="button" type="submit" value="Login" name="submit"/>
        <br><br><br><br>
        <p style="font-size: 125%;">Belum melakukan registrasi? <a href="index.php">Registrasi</a></p>
</form>
</div>
<?PHP
$error = $correct = $empty = "";
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $file = file_get_contents("user.txt");
        if(!strstr($file, "$username||$password"))
        {
            $error = "Sorry! the Username or the Password is invalid.";
        }
        elseif (empty($username && $password))
        {
            $empty = "Please fill in the Username and the Password.";
        }
        else
        {
            $correct = "Welcome $username. You Have Successfully Logging.";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=chat.php">';
        }
}
?>
<div class="check1">
    <?php echo $error,$empty ?>
</div>
<div class="check2">
    <?php echo $correct ?>
</div>
</body>
</html>

