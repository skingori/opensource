<?php
session_start();

if (!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header("Location: index.php");
} else if (isset($_SESSION['logname'])!="" && isset($_SESSION['rank'])!="")  {
    header("Location: sessions.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userSession']);
    header("Location: index.php");
}
