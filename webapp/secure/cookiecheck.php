<?php

function checkKook()
{
    if (isset($_COOKIE["user"])) {
        $kook = $_COOKIE["user"];
        $usr = base64_decode($kook);
        if ($usr == 'admin') {
            return true;
        }
        else{
            return false;
        }
    } else {
        return false;
    }
}