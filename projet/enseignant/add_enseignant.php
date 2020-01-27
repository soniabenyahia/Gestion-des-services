<?php
$page_title ="Ajouter un enseignant";

require("../auth/EtreAuthentifie.php");

if ($idm->getRole()=="admin"){

include("../header1.php");


if (!isset($_POST['eid'])){
   include("add_enseignant_post.php");
   exit();
}
if(isset($_POST['eid'])){
	require "../db_config.php";
           try {
			    	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $SQL = "SELECT uid , nom , prenom , email , tel , etid FROM enseignants WHERE eid=?";
                $st = $db->prepare($SQL);
                $res=$st->execute(array(htmlspecialchars($_POST['eid'])));
				if($st->rowCount()==0)
		                echo"<p>probleme select";
				else{
					foreach($st as $row) {
						$uid= $row["uid"];
						$nom= $row["nom"];
						$prenom= $row["prenom"];
						$email= $row["email"];
						$tel= $row["tel"];
						$etid= $row["etid"];				
                       }
				}
				 echo"<tr>";
			  echo"<td>$uid</a></td>";
			  echo"<td>$nom</a></td>";
			  echo"<td>$prenom</a></td>";
			  echo"<td>$email</a></td>";
			  echo"</tr>";
			
            
            
			    $SQLT="INSERT INTO enseignants VALUES (DEFAULT,?,?,?,? ,?,?,?)";
				$st = $db->prepare($SQLT);
                $res = $st->execute(array($uid,$nom,$prenom,$email,$tel,$etid,$_SESSION["annee"]));
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
}else{
	echo"vous avez pas le droit d'acceder à cette page";
}
	?>
