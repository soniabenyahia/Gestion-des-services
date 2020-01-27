<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
 $page_title="Modifier un module";
 include("../header1.php");
 if (!isset($_GET["mid"])) {
	include ("mod_getm.php");
 }else {
	 $mid = $_GET["mid"];
     require("../db_config.php");
	 try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ***********vérification existence id
         $SQL = "SELECT intitule , code , eid , cid , annee FROM modules WHERE mid=:mid";
         $st = $db->prepare($SQL);
		 $st->execute(array('mid'=>"$mid"));
		 foreach ($st as $row){
		 $intitule=$row['intitule'];
		 $code=$row['code'];
		 $eid=$row['eid'];
		 $cid=$row['cid'];
		 $annee=$row['annee'];
		 }
         if ($st->rowCount() ==0) {
			 echo "<p>Erreur dans l'eid</p>\n";
         } else if (!isset($_POST['intitule']) || !isset($_POST['code']) || !isset($_POST['eid']) || !isset($_POST['cid'])|| !isset($_POST['annee'])){
			 include("mod_form_module.php");
         } else {
			 $intitule=$_POST['intitule'];
		     $code=$_POST['code'];
		     $eid=$_POST['eid'];
		     $cid=$_POST['cid'];
		     $annee=$_POST['annee'];

             if ($intitule=="" || $code=="" || !is_numeric($eid) || !is_numeric($cid)||!is_numeric($annee)    ) {
				 include("mod_form_module.php");
				 echo"erreur";
             }else{
//****************** modification
                 $SQL = "UPDATE modules SET intitule=?, code=?, eid=?, cid=? , annee=? WHERE mid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($intitule, $code, $eid, $cid, $annee, $mid));
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
 }else{ echo "vous avez pas le droit d'acceder à cette page"; }

?>