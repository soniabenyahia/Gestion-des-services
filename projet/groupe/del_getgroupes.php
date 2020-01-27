
<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Supprimer un groupe</title>  

      </head>  
      <body> 
<form action="" method="get">
          		  <div class="container">  
                <h3 align="center">Supprimer un groupe</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  

<tr><td>Gid</td><td><input type="number" name="eid" /></td></tr>
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


