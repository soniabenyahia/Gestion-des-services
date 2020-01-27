<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Modifier un groupe</title>   
      </head>  
      <body> 
<form action="" method="get">
          		  <div class="container">  
                <h3 align="center">Modifier un groupe</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  

<tr><td>groupe</td><td><select  name="gid"  class="form-control from-control-sm">
            <?php
				$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$reponse = $db->prepare("SELECT * FROM groupes WHERE annee=$_SESSION[annee]");
			$reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['gid'];?>><?php echo  $var['eid'];?> 
                   </option>
               <?php }?>
        </td></tr>
<tr><td>modifier</td><td><input type="submit" value="valider"/>

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