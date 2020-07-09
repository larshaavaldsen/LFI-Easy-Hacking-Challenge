<?php
$help = htmlspecialchars($_GET["help"]);
echo file_get_contents( $help );
