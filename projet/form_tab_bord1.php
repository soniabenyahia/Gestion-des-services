<?php
require_once("auth/EtreAuthentifie.php"); 
if ($idm->getRole()=="user"){
?>

<div class="container">
<div class="titre"><h3><center>chaque ensignant</center><h3></div>
   <form action ="" method="get">
       <table class="table  table-bordered">
           <div class="form-group">
               <tr><td> eid </td><td><input type="number" name="eid" value="<?php echo $eid?>"/></td></tr>
           </div>
           <div class="form-group">
               <tr><td> afficher </td><td><button type='submit'  class="btn btn-primary " values="supprimer"> afficher</button ></td></tr>
           </div>
       </table>
   </form>
</div>
<?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>