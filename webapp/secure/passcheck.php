<?php
function passcheck($pass) {
    if($pass == 'good job you found the password') {
        return true;
    }
    else{
        return false;
    }
}