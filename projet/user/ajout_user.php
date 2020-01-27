<?php

require_once("../auth/EtreAuthentifie.php");
include ("../header1.php");
if ($idm->getRole()=="admin"){
include("../db_config.php");
if (empty($_POST['login'])) {
    include('ajuser_form.php');
   
}else{ 

$error = "";

foreach (['nom', 'prenom', 'email', 'tel','annee','etid','login', 'mdp', 'mdp2'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'utilisateur existe
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}

if (!empty($error)) {
  include('ajuser_form.php');
  exit();
}


foreach (['login', 'mdp'] as $name) {
  $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $SQL = "INSERT INTO users(login,mdp) VALUES (:login,:mdp)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    $id = $db->lastInsertId();
   // $auth->authenticate($clearData['login'], $data['mdp']);


$sql = "SELECT max(uid) FROM users";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
		 echo"<p>no uid";
   else{

	   foreach($res as $row) {   
		   
        $uid= $row["max(uid)"];
                                    
                     
                               
       }
	   $SQLT="INSERT INTO enseignants VALUES (DEFAULT,?,?,?,? ,?,?,?)";

   $st = $db->prepare($SQLT);
        $res = $st->execute(array($uid,$data['nom'],$data['prenom'],$data['email'],$data['tel'],$data['etid'],$data['annee']));
    //$id = $db->lastInsertId();
  
   }
   
   echo"ajouté avec succès";
 echo "<a href='../index.php'>Revenir</a> à la page de gestion";
  //echo "Utilisateur $clearData[nom] : " . $uid . " ajouté avec succès.";
   //redirect($pathFor['root']);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}
}
echo "<br>";
 include("../footer.php"); 
 }else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>