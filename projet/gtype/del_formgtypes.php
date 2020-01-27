<html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Supprimer un type de groupe</title>  

      </head>  
      <body>  
 <form action="" method="post"> 
           <br /><br />  
           <div class="container">  
                <h3 align="center">Êtes vous sûr?</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  


<input type="submit" name="supprimer" value="Supprimer">
<input type="submit" name="annuler" value="Annuler">
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