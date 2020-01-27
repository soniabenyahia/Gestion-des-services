<?php

require_once("auth/EtreInvite.php");


// Check if it is the first visit
if ((empty($_POST['login']) && empty($_POST['password']))) {
    include('login_form.php');
    exit();
}
$_SESSION['annee']=$_POST['annee'];
$error = "";

foreach (['login', 'password'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas etre vide";
    }
}

// do the next step if no errors
if (empty($error)) {
    $data['login'] = $_POST['login'];
    $data['password'] = $_POST['password'];
    if (!$auth->existIdentity($data['login'])) {
        $error =  "Utilisateur inexistant";
    }
}

// do the next step if no errors
if (empty($error)) {
    $role = $auth->authenticate($data['login'], $data['password']);
    if (!$role) {
        $error = "Echec de l'authentification";
    }
}

// if errors then stop

if (!empty($error)) {
    include('login_form.php');
    exit();
}


// Redirect to the original location
// ToDo: Try to have a nicer $_SESSION usage...

if (isset($_SESSION[SKEY])) {
    $uri = $_SESSION[SKEY];
    unset($_SESSION[SKEY]);
    redirect($uri);
    exit();
}
redirect($pathFor['root']);



