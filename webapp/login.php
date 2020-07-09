<?php
include 'secure/passcheck.php';
$uname = htmlspecialchars($_GET["uname"]);
$passwd = htmlspecialchars($_GET["passwd"]);
if($uname == 'admin' & passcheck($passwd)) {
    $cookie_name = 'user';
    $cookie_value = base64_encode($uname);
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    print('Logged in. <a href="home.php">Click Here</a>');
}
// I've just base64 encoded the username for the cookie, no one will see this anyways so it shouldn't matter ¯\_(ツ)_/¯
else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
