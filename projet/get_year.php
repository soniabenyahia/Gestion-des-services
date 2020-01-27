<!DOCTYPE html>  
<html>  
 <?php

require_once("auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Copier une année</title>   
      </head>  
      <body> 
<form action="" method="get">
          		  <div class="container">  
                <h3 align="center">Copier une année</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  

<tr><td>Année à copier</td><td><input type="number" name="copyyear" /></td></tr>
<tr><td>Copier</td><td><input type="submit" value="copier"/></td></tr>

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