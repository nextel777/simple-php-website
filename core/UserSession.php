<?php

session_start();

if(!isset($_SESSION["user"]) && !isset($_SESSION["username"]))
{
    die ("hacking attempt");

}