<?php


$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "/projet/login.php",
    "logout" => "/projet/logout.php",
    "adduser" => "/projet/adduser.php",
    "root"   => "/projet/",
];

const SKEY = '_Redirect';