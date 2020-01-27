

 <!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
include ("../header1.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Liste des affectations</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      
             
           <div class="container">  
                <h3 align="center">Liste des affectations</h3>  
                <br />  
                <div class="table-responsive">  

					 <table style="width:1100px;height:400px;" id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>enseignant</td>   
                                    <td>groupe</td> 
									<td>nbh</td>  
									<td>modifier</td> 
									<td>supprimer</td> 
                               </tr>  
                          </thead>
						
<?php

require("../db_config.php");
try {
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT e.eid, e.nom ,e.prenom,g.gid , g.nom as groupe , a.nbh FROM `groupes` g,`affectations` a,`enseignants` e  WHERE g.gid=a.gid AND e.eid=a.eid AND e.annee =$_SESSION[annee] AND 
	g.annee =$_SESSION[annee]";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
	   echo"<p>La liste est vide";
   else{

	   foreach($res as $row) {   
		   echo '<tr>';
                                    echo"<td> $row[nom] $row[prenom] : $row[eid]</td>";
                                    echo"<td> $row[groupe] : $row[gid]</td>";
                                    echo"<td>$row[nbh]</td>";
                                    echo "<td><a href=\"mod_affectation.php?eid=$row[eid]&gid=$row[gid]&nbh=$row[nbh]\"><img style=height:30px src=../image/edito.png></a></td>";
                                    echo "<td><a href=\"sup_affectation.php?eid=$row[eid]&gid=$row[gid]&nbh=$row[nbh]\"><img style=height:30px src=../image/delete.png></a></td>";
                               
                             echo'</tr>';  
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
		   <p><a href='../index.php'>Revenir</a> à la page de gestion</p>
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
<?php }else{
	echo "vous avez pas le droit d'aceder à cette page";
} ?>