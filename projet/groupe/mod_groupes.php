<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
 $page_title="Modifier un enseignant";
 include("../header1.php");
 if (!isset($_GET["gid"])) {
	include ("list_groupes.php");
 }else {
	 $gid = $_GET["gid"];
     require("../db_config.php");
	 try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ***********vérification existence id
         $SQL = "SELECT * FROM groupes WHERE gid=:gid";
         $st = $db->prepare($SQL);
		 $st->execute(array('gid'=>"$gid"));
		 foreach ($st as $row){
		 $mid=$row['mid'];
		 $nom=$row['nom'];
		 $annee=$row['annee'];
		 $gtid=$row['gtid'];
		 }
         if ($st->rowCount() ==0) {
			 echo "<p>Erreur dans le gid</p>\n";
         } else if (!isset($_POST['mid']) || !isset($_POST['nom'])  || !isset($_POST['annee']) || !isset($_POST['gtid'])){
			 include("mod_formgroupes.php");
         } else {
			 $mid = $_POST['mid'];
			 $nom = $_POST['nom'];
             $annee= $_POST['annee'];
			 $gtid= $_POST['gtid'];

             if (!is_numeric($mid) || $nom=="" || !is_numeric($annee)||!is_numeric($gtid)    ) {
				 include("mod_formgroupes.php");
				 echo "Erreur";
             }else{
//****************** modification
                 $SQL = "UPDATE groupes SET mid=?,nom=?, annee=? , gtid=? WHERE gid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($mid, $nom, $annee, $gtid, $gid));
 // ou if ($st->rowCount() ==0)                
	             if (!$res){
					 echo "<p>Erreur de modification</p>";
                 }else{
					 echo "<p>La modification a été effectuée</p>";
					 echo "<a href='../home.php'>Revenir</a> à la page d'accueil";
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
 }else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>