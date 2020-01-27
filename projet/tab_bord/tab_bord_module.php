<?php
$page_title= "chaque groupe";
require("../auth/EtreAuthentifie.php");
include( "../db_config.php");
include("../header1.php");
if ($idm->getRole()=="admin"){
?>
<br/><br/> 
           <div class="container">
                <h1 align="center">Chaque module</h1>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>groupe</td>
                                   <td>nom</td>
                                   <td>prenom</td>
                                   <td>nbh effectue</td>
                                   <td>nbh groupe</td>
								   <td>eqtd groupe</td>

                               </tr>
                          </thead>

<?php
if(!isset($_GET["mid"])){
      include("tabmodule_form.php");
   }else{
       $mid= $_GET["mid"]; 
       try {
       	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = " SELECT g.nom as groupe, e.nom,e.prenom ,a.nbh as nbheff,SUM(gt.nbh) as nbhg , ((SUM(gt.nbh))*(gt.coeff)) as eqtd FROM `groupes` g ,`modules` m ,`enseignants`e ,`affectations` a,`gtypes` gt  WHERE m.mid=g.mid AND e.eid=a.eid AND g.gid=a.gid AND gt.gtid=g.gtid  AND g.mid=$mid GROUP BY groupe";
       $st = $db->query($sql);
       $nbhm=0;
       $sum=0;
       $nbht=0;
       foreach ($st as $row  ) {
		   echo "<tr>";
           echo "<td>$row[groupe]</a></td>";
           echo "<td>$row[nom]</a></td>";
           echo "<td>$row[prenom]</a></td>";
           echo "<td>$row[nbheff]</a></td>";
           echo "<td>$row[nbhg]</a></td>";
		   echo "<td>$row[eqtd]</a></td>";
           $sum=$sum + $row['nbheff'];
           $nbhm=$nbhm+$row['nbhg'] ;
     echo "</tr>";
    }
      $nbht= $nbhm- $sum;

    echo "<td>le nombre d'heure effectue : $sum</td>";        
    echo "<td>le nombre d'heures des groupes : $nbhm</td>";
    echo "<td>le nombre total  d'heures manquantes : $nbht</td>";        

    $db=null;
    }
catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
   }
   ?>
   </table>
   <?php 
include ("../footer.php");
}else{ echo "vous avez pas le droit d'acceder à cette page"; }

?>
