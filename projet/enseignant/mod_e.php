<?php
 $page_title="Modifier un enseignant";
 include("../header1.php");
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

 if (!isset($_GET["eid"])) {
	include ("mod_gete.php");
 }else {
	 $eid = $_GET["eid"];
     require("../db_config.php");
	 try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ***********vérification existence id
         $SQL = "SELECT * FROM enseignants WHERE eid=:eid";
         $st = $db->prepare($SQL);
		 $st->execute(array('eid'=>"$eid"));
		 foreach ($st as $row){
		
		 $nom=$row['nom'];
		 $prenom=$row['prenom'];
		 $email=$row['email'];
		 $tel=$row['tel'];
		 $etid=$row['etid'];
		 $annee=$row['annee'];
		 }
         if ($st->rowCount() ==0) {
			 echo "<p>Erreur dans l'eid</p>\n";
         } else if ( !isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email'])
			 || !isset($_POST['tel']) || !isset($_POST['etid']) || !isset($_POST['annee'])){
			 include("mod_forme.php");
         } else {
			 
			 $nom = $_POST['nom'];
             $prenom= $_POST['prenom'];
             $email= $_POST['email'];
			 $tel = $_POST['tel'];
             $etid= $_POST['etid'];
             $annee= $_POST['annee'];

             if ( $nom=="" || $prenom=="" || !(filter_var($email, FILTER_VALIDATE_EMAIL))
			 || !is_numeric($tel) || !is_numeric($etid)||!is_numeric($annee) ) {
				 include("mod_forme.php");
             }else{
//****************** modification
                 $SQL = "UPDATE enseignants SET nom=?, prenom=?,email=? ,tel=? , etid=? , annee=? WHERE eid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array( $nom, $prenom, $email, $tel, $etid, $annee, $eid));
 // ou if ($st->rowCount() ==0)                
	             if (!$res){
					 echo "<p>Erreur de modification</p>";
                 }else{
					 echo "<p>La modification a été effectuée</p>";
					 echo "<a href='../index.'>Revenir</a> à la page d'accueil";
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