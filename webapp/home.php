<?php
include 'secure/cookiecheck.php';
if (checkKook()){
    print('Congratulations, you have compromised this site, hopefully it was a bit of a challenge, but I presume it was pretty easy. Good work!');
}
else{
    $bruh = "(ง'̀-'́)ง";
    print('<h1> You do not have access to this page! BEGONE!! ');
    print($bruh);
}