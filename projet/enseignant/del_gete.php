<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Supprimer un enseignant</title>  

      </head>  
      <body> 
<form action="" method="get">
          		  <div class="container">  
                <h3 align="center">Supprimer un enseignant</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  

<tr><td>Eid</td><td><input type="number" name="eid" /></td></tr>
<tr><td>supprimer</td><td><input type="submit" value="valider"/>

</thead>
</table>
</form>
</body> 
 </html> 
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>