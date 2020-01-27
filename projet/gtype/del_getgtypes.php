<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
	  <br>
           <title>Supprimer un type de module</title>  
           
      </head>  
      <body> 
<form action="" method="get">
          		  <div class="container">  
                <h3 align="center">Supprimer un type de module</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  

<tr><td>Gtid</td><td><input type="number" name="gtid" /></td></tr>
<tr><td>Supprimer</td><td><input type="submit" value="valider"/>

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