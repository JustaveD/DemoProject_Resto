<?php
session_start();

$_SESSION['login'] = false;
$_SESSION['login_id'] = '';
header("location:../");