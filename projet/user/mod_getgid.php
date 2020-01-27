 <!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

?>
      <head>  
	 
           <title>Liste des modules</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Choisir un nouveau module</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>mid</td>  
                                    <td>intitule</td>  
                                    <td>code</td>  
                                    <td>eid</td>  
                                    <td>cid</td>  
									<td>annee</td>
									<td>choisir</td>

                               </tr> 
                          </thead>  
                          <?php

require("../db_config.php");
try {
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT mid , intitule , code , eid , cid , annee FROM modules";
    $res=$db->query($sql) ;
    if($res->rowCount()==0)
	   echo"<p>La liste est vide";
   else{

	   foreach($res as $row) {   
		   echo '<tr>'; 
                                    echo"<td>$row[mid]</td>";
                                    echo"<td>$row[intitule]</td>";
                                    echo"<td>$row[code]</td>";
                                    echo"<td>$row[eid]</td>";
                                    echo"<td>$row[cid]</td>";
                                    echo"<td>$row[annee]</td>";									
                                  echo "<td><a href=\"mod_mid.php?mid=$row[mid]\"><img style=height:30px src=edito.png></a></td>";


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
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
  <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>