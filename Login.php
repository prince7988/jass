
<?php
$error = false;
if(isset($_POST['login'])){
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = md5($_POST['password']);
    if(file_exists('jasveer.xml')){
        $xml = new SimpleXMLElement('jasveer.xml', 0, true);
        if($password == $xml->password){
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            die;
        }
    }
    $error = true;
}
?>
<form method="post" action="">
        <p>Username <input type="text" name="username" size="20" /></p>
        <p>Password <input type="password" name="password" size="20" /></p>
        <?php
        if($error){
            echo '<p>Invalid username and/or password</p>';
        }
        ?>
        <p><input type="submit" value="Login" name="login" /></p>
    </form>
