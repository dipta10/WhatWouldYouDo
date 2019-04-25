<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
$errorMsg = '';

unsetLoginSession();
header("Location: index.php");
