
<?php
 

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){


 $page_title="Modifier un mid de groupe";
 include("../header1.php");
 
	 if (!isset($_GET["gid"])) {
	 echo "ereur gid";
	include ("../groupe/list_groupes.php");
 }else {
	 $gid = $_GET["gid"];
 
	 if (!isset($_GET["mid"])) {
	   include ("mod_getgid.php");
	 }else{
		 
		 $mid=$_GET["mid"];
		 
         require("../db_config.php");
	     try {
			 $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                 $SQL = "UPDATE groupes SET mid=? WHERE gid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($mid,$gid));
 // ou if ($st->rowCount() ==0)                
	             if (!$res){
					 echo "<p>Erreur de modification</p>";
                 }else{
					 echo "<p>La modification a été effectuée</p>";
					 echo "<a href='../index.php'>Revenir</a> à la page d'accueil";
					 $db=null;
                 }
			 
		 
 
//***************** affichage du formulaire et modification
            
     
	 
	 } catch (PDOException $e){
		 echo "Erreur SQL: ".$e->getMessage();
 }
 }
 }
include("../footer.php");
 }else{ echo"vous avez pas le droit d'acceder à cette page";} 
?>