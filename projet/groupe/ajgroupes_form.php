<!DOCTYPE html>   
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");

if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Ajouter un groupe</title>  

      </head>  
<body> 
<form action="" method="post">
          		  <div class="container">  
                <h3 align="center">Ajouter un groupe</h3>  
                <br/>  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered"> 
<thead>
<?php
   
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse = $db->prepare("SELECT * FROM gtypes");
  $reponse->execute();
?>
<tr><td>Type</td><td><select  type="number" name="gtid"  class="form-control from-control-sm">
           <?php
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['gtid'];?> " > <?php echo  $var['nom'];?> 
                   </option>
               <?php }?>

        </td></tr>
<tr><td>Module</td><td><select  name="mid"  class="form-control from-control-sm">
            <?php
			 
			 	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql = "SELECT * FROM modules WHERE annee=$_SESSION[annee] ";
             $reponse = $db->prepare($sql);
             $reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['mid'];?>" > <?php echo  $var['intitule'];?> 
                   </option>
               <?php }?>
        </td></tr>
<tr><td>Nom</td><td><input type="text" name="nom" /></td></tr>
<tr><td>Annee</td><td><input type="number" name="annee" /></td></tr>

<tr><td>Ajouter</td><td><input type="submit" value="valider"/></td></tr> 

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