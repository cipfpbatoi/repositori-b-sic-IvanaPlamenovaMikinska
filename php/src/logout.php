<?php
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['recuerda_user'])) {
    setcookie('recuerda_user', '', time() - 3600, "/");
}


header("Location: ./index.php");
