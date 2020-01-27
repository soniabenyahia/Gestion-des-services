<?php
$page_title= "chaque groupe";
require_once("../auth/EtreAuthentifie.php");
include( "../db_config.php");
include("../header1.php");
if ($idm->getRole()=="admin"){
?>
<br/><br/>
           <div class="container">
                <h1 align="center">Chaque groupe</h1>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>nom</td>
                                   <td>prenom</td>
                                   <td>nbh</td>
                                   <td>eqtd</td>
                                  
                               </tr>
                          </thead>
						  

<?php
if(!isset($_GET["gid"])){
      include("tabgroupe_form.php");
   }else{
       $gid= htmlspecialchars($_GET["gid"]); 
  
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = " SELECT e.nom,e.prenom ,SUM(gt.nbh) as nbh ,((SUM(gt.nbh))*(gt.coeff)) as eqtd , a.nbh as nbheffectue  
   FROM `groupes` g ,`affectations` a,`enseignants` e ,`gtypes` gt,`etypes` et
   WHERE a.gid = g.gid AND a.eid=e.eid AND gt.gtid=g.gtid   AND e.etid=et.etid  AND g.gid =$gid";
   $st = $db->query($sql);
   $nbhm=0;
   $sum=0;
    foreach ($st as $row  ) {
     echo "<tr>";
        echo "<td>$row[nom]</a></td>";
        echo "<td>$row[prenom]</a></td>";
        echo "<td>$row[nbheffectue]</a></td>";
        echo "<td>$row[eqtd]</a></td>";
        $sum=$sum + $row['nbh'];
        $nbhm=$sum-$row['nbheffectue'];
            
     echo "</tr>";
    }
    echo "<td>le nombre d'heures effectue : $sum</td>";        
    echo "<td>le nombre d'heures manquantes : $nbhm</td>";

    $db=null;
    }
catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
   }
   echo"</table>";
    ?>
 <p><a href='../index.php'>Revenir</a> a la page d'accueil</p>
  <?php
include ("../footer.php");
}else{ echo "vous avez pas le droit d'acceder à cette page"; }

?>

