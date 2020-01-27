<?php
include ("../header1.php");
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

  $page_title = "Suppression";
  
  if (!isset($_GET["eid"])) {
    include ("del_gete.php");
  }else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
    include("del_forme.php");
  }else if (isset($_POST["annuler"])){
    echo "Operation annulee";
  }else{
	  $eid = $_GET['eid'];
	   require "../db_config.php";
    try {
      	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $SQL = "DELETE FROM enseignants WHERE eid=?";
      $st = $db->prepare($SQL);
      $st->execute([$eid]);
      if ($st->rowCount() ==0){ // ou if ($st->rowCount() ==0)
        echo "<p>Erreur de suppression<p>\n";
      }else{ 
	    echo "<p>La suppression a été effectuée</p>";
      }
	  
      $db=null;
    }catch (PDOException $e){
      echo "Erreur SQL: ".$e->getMessage();
    }
  }
  echo "<a href='../index.php'>Revenir</a> à la page d'accueil";
  include("../footer.php");
  }else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>
