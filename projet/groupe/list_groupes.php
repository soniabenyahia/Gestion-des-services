<!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
include ("../header1.php");
?>
      <head>  
           <title>Liste des groupes</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Liste des groupes</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>gid</td>  
                                    <td>module</td>  
                                    <td>nom</td>   
									<td>annee</td>
									<td>groupe type</td>
									<td>modifier goupe</td>
									<td>modifier affectation</td>
									<td>supprimer</td>
									<td>stat</td>
                               </tr>  
                          </thead>  
<?php

require("../db_config.php");
try {
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT g.gid , m.intitule , g.nom , g.annee , gt.nom as type FROM `groupes` g ,`modules` m ,`gtypes` gt
	WHERE m.mid=g.mid AND gt.gtid=g.gtid AND g.annee =$_SESSION[annee]";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
	   echo"<p>La liste est vide";
   else{  
	      foreach($res as $row) {   
		   echo '<tr>'; 
                                    echo"<td>$row[gid]</td>";
                                    echo"<td>$row[intitule]</td>";
                                    echo"<td>$row[nom]</td>";  
									echo"<td>$row[annee]</td>";
									echo"<td>$row[type]</td>";  
                                  echo "<td><a href=\"mod_groupes.php?gid=$row[gid]\"><img style=height:30px src=../image/edito.png></a></td>";
                                  echo "<td><a href=\"mod_affectation.php?gid=$row[gid]\"><img style=height:30px src=../image/edito.png></a></td>";
								  echo "<td><a href=\"sup_groupes.php?gid=$row[gid]\"><img style=height:30px src=../image/delete.png></a></td>";
								   echo "<td><a href=\"../tab_bord/tab_bord_groupe.php?gid=$row[gid]\"><img style=height:30px src=../image/stat.png></a></td>";



        echo"</tr>" ; 
                                
       }
		
       $db=null;
   }
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
?>  
                     </table>  
                </div>  
           </div>  
		   <p><a href='../index.php'>Revenir</a> à la page d'accueil</p>
      </body>  
 </html>  
<?php
		include("../footer.php");
?>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>