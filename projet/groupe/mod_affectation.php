<?php
$page_title =" Modification de l'affectation à un module ";

require("../auth/EtreAuthentifie.php");
include("../header1.php");
if ($idm->getRole()=="admin"){

if(!isset($_GET["gid"])){
    include("list_gorupes");
}else{
        $gid= htmlspecialchars($_GET["gid"]);
        require("../db_config.php");
        try{

        	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT mid FROM groupes where gid=:gid ";
        $st = $db->prepare($SQL);
        $st->execute(array('gid'=>$gid));
        foreach($st as $row){
             $mid=$row['mid'];
             
        }
        if($st->rowCount()==0){
            echo "<p>Erreur dans gid </p>\n";
        }else if (!isset($_POST['mid'])){
            include("mod_affectation_form_post.php");
            exit();
        }
            if(isset($_POST['mid'])){
                $SQL = "UPDATE groupes SET mid=? WHERE gid=?";
                $st = $db->prepare($SQL);
                $res=$st->execute(array(htmlspecialchars($_POST['mid']),$gid));
                if(!$res){
                    echo "<p><h2>Erreur de modification </h2></p>";
                }else{ 
                    echo "<br>"  ;
                    echo "<br>" ;
                    echo "<br>";
                    echo "<p><h2>La modification a été efectuée</h2></p>";

                }
            
            $db=null;
            }else{
               // echo $_POST['mid'];
            }
        }catch(PDOException $e){
                echo "Erreur SQL :".$e->getMessage();
            }
        }
include("../footer.php");
 }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>
