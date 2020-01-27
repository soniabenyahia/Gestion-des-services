<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
 $page_title="Modifier un module";
 include("../header1.php");
 if (!isset($_GET["eid"]) )
	echo "no eid";
 if(!isset($_GET["gid"])) {
	 echo "no gid";
 }else if(!isset($_GET["nbh"])) {
	 echo "no nbh";
 }else {
	 $eid1 = $_GET["eid"];
	 $gid1 = $_GET["gid"];
	 $nbh1 = $_GET["nbh"];
	 
 require("../db_config.php");
	 // try {
         // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//***********vérification existence id
         // $SQL = "SELECT e.eid , e.nom , e.prenom ,g.gid , g.nom as groupe , a.nbh FROM `enseignants` e ,`groupes`g,`affectations` a WHERE eid=:eid AND gid:=gid";
         // $st = $db->prepare($SQL);
		 // $st->execute(array('eid'=>"$eid1" , 'gid'=>"$gid1"));
		 // foreach ($st as $row){
		 // $eid=$row['eid'];
		 // $nom=$row['nom'];
		 // $prenom=$row['prenom'];
		 // $gid=$row['gid'];
		 // $groupe=$row['groupe'];
		 // $nbh=$row['nbh'];
		 // }
         // if ($st->rowCount() ==0) {
			 // echo "<p>Erreur dans l'eid ou le gid</p>\n";
         // } else
			 if (!isset($_POST['eid']) || !isset($_POST['gid']) || !isset($_POST['nbh'])){
			 include("mod_affectation_form.php");
         } else {
			 $eid=$_POST['eid'];
		     $gid=$_POST['gid'];
		     $nbh=$_POST['nbh'];

             if ($eid=="" || $gid=="" ||!is_numeric($nbh)) {
				 include("mod_affectation_form.php");
				 echo"erreur";
             }else{
//****************** modification
try {
          $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $SQL = "UPDATE affectations SET eid=?, gid=?, nbh=? WHERE eid=? AND gid=?";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($eid, $gid, $nbh, $eid1, $gid1));
 // ou if ($st->rowCount() ==0)                
	             if (!$res){
					 echo "<p>Erreur de modification</p>";
                 }else{
					 echo "<p>La modification a été effectuée</p>";
					 echo "<a href='../index.php'>Revenir</a> à la page d'accueil";
                 }
			 
		 
//***************** affichage du formulaire et modification
            $db=null;
     }
	 
	 catch (PDOException $e){
		 echo "Erreur SQL: ".$e->getMessage();
     }
 }
		 }
	 
 }
 include("../footer.php");
 }else{ 
 echo "vous avez pas le droit d'acceder à cette page";
 }
?>