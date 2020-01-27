<!DOCTYPE html>  
 <html> 
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?> 
      <head>  
           <title>Modifier un type de groupe</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
      <body>  
 <form action="" method="post"> 
           <br /><br />  
           <div class="container">  
                <h3 align="center">Informations</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  
<tr><td>Nom</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>"/></td></tr>
<tr><td>Nombre d'heures</td><td><input type="number" name="nbh" value="<?php echo $nbh ?>"/></td></tr>
<tr><td>Coeff</td><td><input type="number" name="coeff" value="<?php echo $coeff ?>"/></td></tr>
<tr><td>modifie</td><td><input type="submit" value="valider"/>
</thead>

</form>
</table>
</body>
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>