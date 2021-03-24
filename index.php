<!DOCTYPE html>
<html>
<head>
<title>Registration Test Page</title>
<link rel="stylesheet" type="text/css" href="reg.css"/>
</head>
<body>
<div class="box">
    <div class="reg">
        <form method="post" action="index.php" >
            <label for="username"><b>Username</b></label><br>
                <input type="text" placeholder="Masukkan Username" name="username" /><br><br>
            <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Masukkan Password" name="password" /><br><br>
            <label for="nama"><b>Name</b></label><br>
                <input type="text" placeholder="Masukkan Nama" name="nama" /><br><br>
            <label for="email"><b>Email</b></label><br>
                <input type="email" placeholder="Masukkan Email" name="email" /><br><br>
            <label for="kotaasal"><b>Kota Asal</b></label><br>
                <input type="text" placeholder="Masukkan Kota Asal" name="kotaasal" />
    </div>
        <br>
        <input class="button" type="submit" value="Register" name="submit" />
        <br><br><br>
        <p style="font-size: 125%;">Sudah melakukan registrasi? <a href="login.php">Login</a></p>
    </form>
</div>
<?PHP
$false = $correct = $empty = "";
if (isset($_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$kotaasal = $_POST['kotaasal'];
$file = file_get_contents("user.txt");
$string = "$username||$password||$nama||$email||$kotaasal";
    if(!strstr($file, "$string"))
    {
        $user = "user.txt";
        $fh = fopen($user, 'a') or die("can't open file");
        $stringData = "$username||$password||$nama||$email||$kotaasal\n";
        fwrite($fh, $stringData);
        $correct = "Registration Completed, now you can login.";
        fclose($fh);
    }
    elseif (empty($username && $password))
    {
        $empty = "Please fill in the Username and the Password.";
    }
    else
    {
        $false = "Sorry! Username and Password already taken";
    }
}
?>
<div class="check1">
    <?php echo $empty,$false ?>
</div>
<div class="check2">
    <?php echo $correct ?>
</div>
</body>
</html>