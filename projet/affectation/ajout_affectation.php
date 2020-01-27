<?php
$page_title ="Ajouter une affectation";

require("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
include("../header1.php");


if (!isset($_POST['eid']) || !isset($_POST['gid']) || !isset($_POST['nbh'])){
   include("ajout_form_affectation.php");
   exit();
}
if(isset($_POST['eid']) ||isset( $_POST['gid']) || isset($_POST['nbh'])){
	$eid=$_POST['eid'];
	$gid=$_POST['gid'];
	$nbh=$_POST['nbh'];
	if ( !is_numer ($nbh) || $nbh=""){
		include("ajout_form_affectation.php");
	}else{
	require "../db_config.php";
           try {
			    	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $SQLT="INSERT INTO affectations VALUES (?,?,?)";
				$st = $db->prepare($SQLT);
                $res = $st->execute(array($eid,$gid,$nbh,));
                if(!$res){
                    echo "<p><h2>Erreur d'ajout </h2></p>";
                }else{ 
                    echo "<p><h2>L'ajout a été efectué</h2></p>";

                }
           $db=null;
            }catch(PDOException $e){
                echo "Erreur SQL :".$e->getMessage();
            }
}
        
include("../footer.php");
}
}else{
	echo "vous avez pas le droit d'aceder à cette page";
} ?>
