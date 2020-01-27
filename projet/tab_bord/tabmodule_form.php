<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Supprimer un enseignant</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  

<div class="container">
<div class="titre"><h3><center>chaque ensignant</center><h3></div>
   <form action ="" method="get">
       <table class="table  table-bordered">
           <div class="form-group">
               <tr><td> mid </td><td><input type="number" name="mid" value="<?php echo $mid?>"/></td></tr>
           </div>
           <div class="form-group">
               <tr><td> afficher </td><td><button type='submit'  class="btn btn-primary " values="supprimer"> afficher</button ></td></tr>
           </div>
       </table>
   </form>
</div>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>