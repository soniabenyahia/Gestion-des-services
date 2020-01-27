<?php
require_once("auth/EtreAuthentifie.php"); 
$page_title= "table de bord enseignant";
include("header1.php");
if ($idm->getRole()=="admin"){
$currentyear= $_SESSION['annee'];
require("db_config.php");
if (!isset($_GET["copyyear"])) {
	include ("get_year.php");
 }else {
	 $copyyear= $_GET["copyyear"];
	 try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $SQL = "SELECT * FROM enseignants WHERE annee=:annee";
		 $st = $db->prepare($SQL);
		 $st->execute(array('annee'=>"$copyyear"));
		 foreach ($st as $row){
			$_SESSION['uid']= $row["uid"];
			$_SESSION['nom']= $row["nom"];
			$_SESSION['prenom']= $row["prenom"];
			$_SESSION['email']= $row["email"];
			$_SESSION['tel']= $row["tel"];
			$_SESSION['etid']= $row["etid"];
			   
			   $SQLT = "INSERT INTO enseignants VALUES (DEFAULT, ?,?,?,?,?,?,?)";
			   $stt = $db->prepare($SQLT);
               $result = $stt->execute(array($_SESSION['uid'], $_SESSION['nom'], $_SESSION['prenom'],$_SESSION['email'],$_SESSION['tel'],$_SESSION['etid'],$currentyear ));
              
		 }
		  if (!$result){ // ou if ($st->rowCount() ==0)
                  echo "Erreur d’insert";
               }else{
				   echo "copy enseignant effectué";
                  
                   $db = null;
				}
		 
      }catch (PDOException $e){
         echo "Erreur SQL: ".$e->getMessage();
		}
		try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $SQL = "SELECT * FROM modules WHERE annee=:annee";
		 $st = $db->prepare($SQL);
		 $st->execute(array('annee'=>"$copyyear"));
		 foreach ($st as $row){
			$_SESSION['intitule']= $row["intitule"];
			$_SESSION['code']= $row["code"];
			$_SESSION['eid']= $row["eid"];
			$_SESSION['cid']= $row["cid"];
  
			   $SQLT = "INSERT INTO modules VALUES (DEFAULT, ?,?,?,?,?)";
			   $stt = $db->prepare($SQLT);
               $result = $stt->execute(array($_SESSION['intitule'], $_SESSION['code'], $_SESSION['eid'],$_SESSION['cid'],$currentyear ));
              
		 }
		  if (!$result){ // ou if ($st->rowCount() ==0)
                  echo "Erreur d’insert modules";
               }else{
				   echo "copy modules effectué";
                  
                   $db = null;
				}
		 
      }catch (PDOException $e){
         echo "Erreur SQL: ".$e->getMessage();
		}
		
		try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $SQL = "SELECT * FROM groupes WHERE annee=$copyyear";
		 $st = $db->prepare($SQL);
		 $st->execute(array());
		 foreach ($st as $row){
			$_SESSION['mid']= $row["mid"];
			$_SESSION['nom']= $row["nom"];
			$_SESSION['gtid']= $row["gtid"];
  
			   $SQLT = "INSERT INTO groupes VALUES (DEFAULT, ?,?,?,?)";
			   $stt = $db->prepare($SQLT);
               $result = $stt->execute(array($_SESSION['mid'], $_SESSION['nom'], $currentyear,$_SESSION['gtid'] ));
              
		 }
		  if (!$result){ // ou if ($st->rowCount() ==0)
                  echo "Erreur d’insert groupes";
               }else{
				   echo "copy groupes effectué";
                  
                   $db = null;
				}
		 
      }catch (PDOException $e){
         echo "Erreur SQL: ".$e->getMessage();
		}
			try {
         	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $SQL = "SELECT g.mid as gr , m.mid ,  m.code , m.intitule  FROM `groupes` g ,`modules` m  WHERE g.annee=$currentyear AND m.annee=$copyyear AND m.mid=g.mid ";
		 $st = $db->prepare($SQL);
		 $st->execute(array());
		 foreach ($st as $row){
			$_SESSION['mid']= $row["gr"];
			$_SESSION['code']= $row["code"];
			$_SESSION['intitule']= $row["intitule"];

			   $SQLT = "SELECT m.mid as mid2019 , m.code as code2019 , m.intitule as intitule2019 FROM `modules` m WHERE m.annee=:annee";
			   $stt = $db->prepare($SQLT);
              $stt->execute(array('annee'=>"$currentyear")); 
			  foreach ($stt as $row){
				  $_SESSION['mid2019']=$row["mid2019"];
				  $_SESSION['code2019']=$row["code2019"];
				  $_SESSION['intitule2019']=$row["intitule2019"];
				  if (($_SESSION['code']==$_SESSION['mid2019'])&&($_SESSION['intitule']== $_SESSION['intitule2019'])){
					  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					  $SQL = "UPDATE groupes SET mid=?";
					  $st = $db->prepare($SQL);
					  $res = $st->execute(array($_SESSION['mid2019']));
					   if (!$res){ // ou if ($st->rowCount() ==0)
                  echo "Erreur d’insert groupes";
               }else{
				   echo "copy groupes effectué";
                  
                   $db = null;
				}
				  }
			  }
		 }
 
		 
      }catch (PDOException $e){
         echo "Erreur SQL: ".$e->getMessage();
		}
		

 }
include("footer.php");
}else{
	echo"vous avez pas le droit d'acceder à cette page";
}
	?>

