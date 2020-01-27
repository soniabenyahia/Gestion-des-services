<?php
  $page_title="Ajouter un groupe";
  require_once("../auth/EtreAuthentifie.php");
  include("../header1.php");
  if ($idm->getRole()=="admin"){

//Récupération des données

  if (!isset($_POST['mid']) || !isset($_POST['nom'])
	  || !isset($_POST['annee']) ||!isset($_POST['gtid'])) {
    //    print_r(" Une erreur est survenue. ");
     include("ajgroupes_form.php");
  }else{
	$mid= $_POST['mid'];
    $nom = $_POST['nom'];
    $annee= $_POST['annee'];
	$gtid= $_POST['gtid'];
//!(filter_var($email, FILTER_VALIDATE_EMAIL))
// Vérification
    
	
	
	
	if (!is_numeric($annee) || $nom=="" ){ 
	
    include("ajgroupes_form.php");
	echo"erreur annee ";
	
    }else{
	// connexion a la BD
      require "../db_config.php";
      try {
        	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "INSERT INTO groupes VALUES (DEFAULT, ?,?,?,?)";
        $st = $db->prepare($SQL);
        $res = $st->execute(array($mid, $nom, $annee, $gtid));
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
  }else{ echo"vous avez pas le droit d'acceder à cette page";}
  
?>