<?php

require_once("../auth/EtreAuthentifie.php");
include("../header1.php");
if ($idm->getRole()=="admin"){

  $page_title="Ajouter un admin";

if (empty($_POST['login'])) {
    include('ajadmin_form.php');
    exit();
}

$error = "";

foreach (['login', 'mdp', 'mdp2', 'role'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}
require "../db_config.php";
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Vérification si l'utilisateur existe
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
	echo"Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
   echo"mdp ne correspondent pas";
}

if (!empty($error)) {
    include('ajadmin_form_form.php');
    exit();
}


foreach (['login', 'mdp' , 'role'] as $name) {
    $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $SQL = "INSERT INTO users(login,mdp,role) VALUES (:login,:mdp, :role)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    $id = $db->lastInsertId();
   // $auth->authenticate($clearData['login'], $data['mdp'],$data['role']);

if (!$res) // ou if ($st->rowCount() ==0)
          echo "Erreur d’ajout";
        else echo "L'ajout a été effectué";
          echo "<a href='../index.php'>Revenir</a> à la page de gestion";
          $db = null;
} catch (PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}

include("../footer.php");
 }else{ echo"vous avez pas le droit d'acceder à cette page";} 
?>