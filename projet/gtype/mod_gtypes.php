<?php


require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
 $page_title="Modifier un module";
 include("../header1.php");
 if (!isset($_GET["gtid"])) {
	include ("mod_getgtypes.php");
 }else {
	 $gtid = $_GET["gtid"];
     require("../db_config.php");
	 try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ***********vérification existence id
         $SQL = "SELECT * FROM gtypes WHERE gtid=:gtid";
         $st = $db->prepare($SQL);
		 $st->execute(array('gtid'=>"$gtid"));
		 foreach ($st as $row){
		 $nom=$row['nom'];
		 $nbh=$row['nbh'];
		 $coeff=$row['coeff'];
		 }
         if ($st->rowCount() ==0) {
			 echo "<p>Erreur dans le gtid</p>\n";
         } else if (!isset($_POST['nom']) || !isset($_POST['nbh']) || !isset($_POST['coeff'])){
			 include("mod_formgtypes.php");
         } else {
			 $nom=$_POST['nom'];
		     $nbh=$_POST['nbh'];
		     $coeff=$_POST['coeff'];
             if ($nom=="" || !is_numeric($nbh) || !is_numeric($coeff) ) {
				 include("mod_formgtypes.php");
				 echo"erreur";
             }else{
//****************** modification
                 $SQL = "UPDATE gtypes SET nom=?, nbh=?, coeff=? WHERE gtid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($nom, $nbh, $coeff, $gtid));
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
 }include("../footer.php");
 }else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>