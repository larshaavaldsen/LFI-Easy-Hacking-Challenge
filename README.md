# LFI-Easy-Hacking-Challenge
A simple LFI and cookie exploitation challenge


# About
I made this simple web app to help myself understand how LFI works from the back end, and added some silly cookie exploitation in for fun. This web app is set up extremely stupidly, and there are many security flaws in it. But that's kind of the point. To set up simply put the files contained in the "webapp" folder into an environment running PHP and a web server. I would recommend restricting this app to your local network, because I'm sure there are ways to abuse this app more maliciously. 

# Walkthrough (caution spoilers)
<details>
  <summary>Walkthrough</summary>
  
 ### Step one: Reconnaissance
Firstly, let's go to the website. We are greeted with the index.html page with a login form, and a link to the help center. Upon closer inspection of the form, we can    see that the input from the form is sent to the login.php file. Let's remember this and check out the help center.
 
In the help center, we see three links, each to a different page in the help center. If we click the first one, we see that "admin" is the default username. This could be useful for the future so we will remember this. 

If we inspect the url of the login help page, we can see the url is passing the variable named ‘help’ to the page, and the value of that variable is ‘login.txt’. We can interpret this to be the website displaying the contents of a file called ‘login.txt’. Maybe there is some way we could display other files that could help us hack this website?

 
 ### Step two: Leaking the code
 If we swap ‘login.txt’ for ‘login.php’ (the page we determined to be handling the logins earlier), we get some funky output, but if we view the source of the page, we see:

```php
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
```
 
</details>
