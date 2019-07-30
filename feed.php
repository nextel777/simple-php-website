<?php
session_start();

if (!isset($_SESSION['username']) && isset($_SESSION['user'])){
    die ("hacking attempt");
}

include_once 'core/feed.php';



