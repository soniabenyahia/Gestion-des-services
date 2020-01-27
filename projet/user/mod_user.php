<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

 $page_title="Modifier un user";
 include("../header1.php");
 if (!isset($_GET["uid"])) {
	include ("mod_getuser.php");
 }else {
	 $uid = $_GET["uid"];
     require("../db_config.php");
	 try {
         $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ***********vérification existence id
         $SQL = "SELECT mdp FROM users WHERE uid=:uid";
         $st = $db->prepare($SQL);
		 $st->execute(array('uid'=>"$uid"));
		 foreach ($st as $row){
		 $mdp=$row['mdp'];
		 
		 }
         if ($st->rowCount() ==0) {
			 echo "<p>Erreur dans l'uid</p>\n";
         } else if (!isset($_POST['mdp'])){
			 include("mod_formuser.php");
         } else {
			 $mdp = $_POST['mdp'];
			 if ($mdp=="" ) {
				 include("mod_formuser.php");
             }else{
//****************** modification
                 $SQL = "UPDATE users SET mdp=? WHERE uid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array(password_hash($mdp, PASSWORD_DEFAULT),$uid));
 // ou if ($st->rowCount() ==0)                
	             if (!$res){
					 echo "<p>Erreur de modification</p>";
                 }else{
					 echo "<p>La modification a été effectuée</p>";
					 echo "<a href='../index.php'>Revenir</a> à la page d'accueil";
                 }
			 }
		 }
//***************** affichage du formulaire et modification
            $db=null;
     }
	 
	 catch (PDOException $e){
		 echo "Erreur SQL: ".$e->getMessage();
     }
 }
 include("../footer.php");
  }else{ echo"vous avez pas le droit d'acceder à cette page";} 
?>