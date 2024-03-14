<?php

use App\Models\Dashboard;

session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'routes/web.php';
require_once 'models/Dashboard.php';

$dashboard["page"] = $_SERVER['REQUEST_URI'];
$dashboard["dateTime"] = date("Y/m/d H:i:s");
$dashboard["address"] = $_SERVER['SERVER_ADDR'];
$dashboard["userId"] = $_SESSION['user_id'];
$dashboard["username"] = $_SESSION['user_name'];


$journal = new Dashboard;
$journal->insert($dashboard);
