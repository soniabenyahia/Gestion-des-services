<?php
 

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
  $page_title="Ajouter un type de groupe";
  include("../header1.php");
//Récupération des données

  if ( !isset($_POST['nom']) ||!isset($_POST['nbh'])|| !isset($_POST['coeff']) ) {
    //    print_r(" Une erreur est survenue. ");
     include("ajgtypes_form.php");
  }else{
    $nom = $_POST['nom'];
    $nbh= $_POST['nbh'];
    $coeff= $_POST['coeff'];
	//!(filter_var($email, FILTER_VALIDATE_EMAIL))
// Vérification
    if ( $nom==""|| !is_numeric($nbh) || !is_numeric($coeff) ) {
    include("ajgtypes_form.php");
	echo"erreur";
    }else{
	// connexion a la BD
      require "../db_config.php";
      try {
        	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "INSERT INTO gtypes VALUES (DEFAULT, ?,?,?)";
        $st = $db->prepare($SQL);
        $res = $st->execute(array( $nom, $nbh, $coeff));
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
  include ("../footer.php");
}else{ echo"vous avez pas le droit d'acceder à cette page";} 
  
?>