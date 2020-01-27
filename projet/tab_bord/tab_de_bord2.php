<?php
$page_title= "table de bord groupe";
require_once("../auth/EtreAuthentifie.php"); 
include("../header1.php");
if ($idm->getRole()=="admin"){


?>


      <body>
           <div class="container">
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>groupes</td>
                                   <td>enseignants</td>
                                   <td>nbh</td>
                                   <td>eqtd</td>
                                   
                               </tr>
                          </thead>
						  
						  
<?php



if(!isset($_GET["eid"])){
  include("getgid_tab2.php");
}else{
     $gid= $_GET["gid"];
     require("../db_config.php");
	try {
		    
          	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $sql="SELECT e.nom,e.prenom ,SUM(gt.nbh) as nbh ,(SUM(gt.nbh)*(gt.coeff)) as eqtd ,gt.nbh as nbheffectue  FROM `groupes` g ,`affectations` a,`enseignants` e ,`gtypes` gt,`etypes` et WHERE a.gid = g.gid AND a.eid=e.eid AND gt.gtid=g.gtid   AND e.etid=et.etid  AND g.gid =$gid";
       
          $st = $db->prepare($sql);
          $st->execute(array('eid'=>"$eid"));
       $nbhA=0;
	   $nbhB=0;
           
          foreach ($st as $row  ) {
               echo "<tr>";
                     echo "<td>$row[intitule]</td>";
                     echo "<td>$row[groupe]</td>";
                     echo "<td>$row[nbh]</td>";
                     echo "<td>$row[eqtd]</td>";
                     $nbhA=$nbhA+$row['nbh'];
                     $nbhB=$row['nbhp']-$nbhA;

               echo "</tr>";
           }

          echo "<td>le nbh effectué : $nbhA</td>";
         
          echo "<td>le nbh n'est pas effectué : $nbhB</td>";

     

    $db=null;

} catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
 


?>
</table>

<?php 
include("../footer.php");
}
}else {
echo "vous avez pas le droit d'acceder à cette page";} 
?>