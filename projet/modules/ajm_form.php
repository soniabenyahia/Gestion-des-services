<!DOCTYPE html>   
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

?>
      <head>  
           <title>Ajouter un module</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
<body> 
<?php
   
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse = $db->prepare("SELECT * FROM enseignants WHERE annee=$_SESSION[annee]");
 
  $reponse->execute();
?>
<form action="" method="post">
          		  <div class="container">  
                <h3 align="center">Ajouter un module</h3>  
                <br/>  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered"> 
<thead>


<tr><td>Intitule</td><td><input type="text" name="intitule" /></td></tr>
<tr><td>Code</td><td><input type="text" name="code" /></td></tr>
 <tr><td>Enseignant</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['eid'];?> " >   <?php echo  $var['nom'];?> <?php echo  $var['prenom'];?>  <?php echo  $var['etid'];?> 
                   </option>
               <?php }?>
        </td></tr>
<tr><td>Categorie</td><td><select  name="cid"  class="form-control from-control-sm">
            <?php
			 $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql = "SELECT *  FROM categories";
             $reponse = $db->prepare($sql);
             $reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['cid'];?> " > <?php echo  $var['nom'];?> 
                   </option>
               <?php }?>
        </td></tr>
<tr><td>Annee</td><td><input type="number" name="annee" /></td></tr>
<tr><td>ajout</td><td><input type="submit" value="valider"/></td></tr> 

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
 <?php
 }else{ echo "vous avez pas le droit d'acceder à cette page"; }
?>