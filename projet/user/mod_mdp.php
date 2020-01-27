<?php
include("../header1.php");
require_once("../auth/EtreAuthentifie.php");


 $page_title="Modifier mdp";
 //include("header.php");
 
 if (!isset($_GET["uid"])) {
	include("../index.php");
 }else {
	 $uid = $_GET["uid"];
     require("../db_config.php");
	 try {
         $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $SQL = "SELECT mdp FROM users WHERE uid=:uid";
         $st = $db->prepare($SQL);
		 $st->execute(array('uid'=>"$uid"));
		 foreach ($st as $row){
		      $mdp1=$row['mdp'];
			  
		 }
		 if ($st->rowCount() ==0) {
		     echo "<p>Erreur recuperation mdp db</p>\n";
		 } else {
			 if (!isset($_POST["mdp1to"]) || !isset($_POST["mdp21"]) || !isset($_POST["mdp22"])) {
	              include("mod_mdp_formpost.php");
             }else {
				 $mdp1to= $_POST['mdp1to'];
				 $mdp21= $_POST['mdp21'];
			     $mdp22= $_POST['mdp22'];
			     if ($mdp1to=="" || $mdp21=="" || $mdp22=="") {
				      include("mod_mdp_formpost.php");
					  echo"aucun champs ne doit pas etre vide";
				 }else{
					 if (!(password_verify ($mdp1to , $mdp1))) {
						 echo "le mdp actuel est faux veuillez le saisissez de nouveau";
						 include ("mod_mdp_formpost.php");
					 }else if ($mdp21 != $mdp22){
						 echo "erreur nouveau mdp ";
						 include ("mod_mdp_formpost.php");
					 }else{
						 $SQL = "UPDATE users SET mdp=? WHERE uid=? ";
                         $st = $db->prepare($SQL);
                         $res = $st->execute(array(password_hash($mdp22, PASSWORD_DEFAULT),$uid));
						 if (!$res){
							  echo "<p>Erreur de modification</p>";
						 }else{
							 echo "<p>La modification a été effectuée</p>";
					         echo "<a href='../index.php'>Revenir</a> à la page d'accueil";
	                     }
				     }
			   }
		     }
		 }
	 
		 $db=null;
	 
	 } catch (PDOException $e){
	 echo "Erreur SQL: ".$e->getMessage();
	 }
 }

?>