<?php    session_start();    //setcookie("username", '', strtotime( '-5 days' ), '/');    //setcookie("password", '', strtotime( '-5 days' ), '/');	setcookie("PHPSESSID","",time()-3600,"/");	session_destroy();    // JavaScript code to redirect within the same page    echo '<script type="text/javascript">';    //echo 'window.location.href = "https://blackhawksecurity.ci";';    echo 'window.location.href = "/authentication/signin/basic.php";';    echo '</script>';