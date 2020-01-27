<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
  $page_title="Ajouter un module";
  include("../header1.php");
//Récupération des données

  if (!isset($_POST['intitule']) || !isset($_POST['code']) ||!isset($_POST['eid'])
	  || !isset($_POST['cid']) || !isset($_POST['annee']) ) {
    //    print_r(" Une erreur est survenue. ");
     include("ajm_form.php");
  }else{
	$intitule= $_POST['intitule'];
    $code = $_POST['code'];
    $eid= $_POST['eid'];
    $cid= $_POST['cid'];
    $annee= $_POST['annee'];
//!(filter_var($email, FILTER_VALIDATE_EMAIL))
// Vérification
    if ($intitule=="" || $code=="" || !is_numeric($annee)  ) {
    include("ajm_form.php");
	echo"erreur";
    }else{
	// connexion a la BD
      require "../db_config.php";
      try {
        	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "INSERT INTO modules VALUES (DEFAULT, ?,?,?,?,?)";
        $st = $db->prepare($SQL);
        $res = $st->execute(array($intitule, $code, $eid, $cid, $annee));
        if (!$res) // ou if ($st->rowCount() ==0)
          echo "Erreur d’ajout";
        else echo "L'ajout a été effectué";
          echo "<a href='../index.php'>Revenir</a> à la page de gestion";
          $db = null;
      }catch (PDOException $e){
         echo "Erreur SQL: ".$e->getMessage();
     }
    }
	
  }
    include("../footer.php");
}else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>