<!DOCTYPE html>  
 <html>  
  <?php
require_once("../auth/EtreAuthentifie.php");
include ("../header1.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Liste des modules</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Liste des modules</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>mid</td>  
                                    <td>intitule</td>  
                                    <td>code</td>  
                                    <td>enseignant</td>  
                                    <td>categorie</td>  
									<td>annee</td>
									<td>modifier</td>
									<td>supprimer</td>
									<td>stat</td>

                               </tr> 
                          </thead>  
                          <?php

require("../db_config.php");
try {
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT m.mid , m.intitule , m.code , e.nom , e.prenom , c.nom as categorie , m.annee FROM `modules` m ,`enseignants` e ,`categories` c WHERE e.eid=m.eid AND c.cid=m.cid AND m.annee =$_SESSION[annee]";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
	   echo"<p>La liste est vide";
   else{

	   foreach($res as $row) {   
		 echo '<tr>'; 
                                    
									echo"<td>$row[mid]</td>";
									echo"<td>$row[intitule]</td>";
									echo"<td>$row[code]</td>";
                                    echo"<td>$row[nom] $row[prenom]</td>";
                                    echo"<td>$row[categorie]</td>";									
									echo"<td>$row[annee]</td>";  
                                  echo "<td><a href=\"mod_m.php?mid=$row[mid]\"><img style=height:30px src=../image/edito.png></a></td>";
								  echo "<td><a href=\"sup_m.php?mid=$row[mid]\"><img style=height:30px src=../image/delete.png></a></td>";
								  echo "<td><a href=\"../tab_bord/tab_bord_module.php?mid=$row[mid]\"><img style=height:30px src=../image/stat.png></a></td>";
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
<?php
		include("../footer.php");
?>
 </html>  
 <script>  


 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
  <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>