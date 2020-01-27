
 <!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
include ("../header1.php");
?>
      <head>  
           <title>Liste des enseignants</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      
             
           <div class="container">  
                <h3 align="center">Liste des enseignants</h3>  
                <br />  
                <div class="table-responsive">  

					 <table style="width:1100px;height:400px;" id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>eid</td>   
                                    <td>login</td> 
									<td>nom</td>  
                                    <td>prenom</td>  
                                    <td>email</td>  
                                    <td>tel</td>  
									<td>type</td>
									<td>annee</td>
									<td>modifier</td> 
									<td>supprimer</td> 
                               </tr>  
                          </thead>
						
<?php

require("../db_config.php");
try {
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT e.eid, e.uid , u.login,e.nom,e.prenom,e.email,e.tel,et.nom as type,e.annee FROM `enseignants` e ,`users`u,`etypes` et WHERE u.uid=e.uid AND et.etid=e.etid AND e.annee=$_SESSION[annee]";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
	   echo"<p>La liste est vide";
   else{

	   foreach($res as $row) {   
		   echo '<tr>';
                                    echo"<td>$row[eid]</td>";
                                    echo"<td>$row[login]</td>";
									echo"<td>$row[nom]</td>";
                                    echo"<td>$row[prenom]</td>";
									echo"<td>$row[email]</td>";
                                    echo"<td>$row[tel]</td>";
									echo"<td>$row[type]</td>";
                                    echo"<td>$row[annee]</td>";
                                    echo "<td><a href=\"mod_e.php?eid=$row[eid]\"><img style=height:30px src=../image/edito.png></a></td>";
                                    echo "<td><a href=\"sup_e.php?eid=$row[eid]\"><img style=height:30px src=../image/delete.png></a></td>";
                               
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
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>