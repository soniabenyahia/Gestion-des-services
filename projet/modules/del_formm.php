<!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Supprimer un module</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
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

</form>
</body>
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
  <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>