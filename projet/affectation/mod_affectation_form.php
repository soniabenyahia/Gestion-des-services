<!DOCTYPE html>  
 <html> 
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?> 
      <head>  
           <title>Modifier un module</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
      <body>  
<?php
  
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
 
        <tr><td>enseignant</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
				$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$reponse = $db->prepare("SELECT eid,nom,prenom FROM enseignants WHERE annee=$_SESSION[annee]");
			$reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['eid'];?>><?php echo  $var['eid'];?>  <?php echo $var['nom']; ?> <?php echo $var['prenom']; ?>
                   </option>
               <?php }?>
        </td></tr>
        <tr><td>groupe</td><td><select  name="gid"  class="form-control from-control-sm">
            <?php
					$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$reponse = $db->prepare("SELECT gid,nom FROM groupes WHERE annee=$_SESSION[annee]");
				$reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['gid'];?>><?php echo  $var['gid'];?>  <?php echo $var['nom']; ?>
                   </option>
               <?php }?>
        </td></tr>
         <tr><td>nbh</td><td><input type="number" name="nbh" value="<?php echo $nbh1 ?>"/></td></tr>
    </div>
	
	
 </table>
            <div class="form-group">
                <tr><td>Modifier</td><td><button type="submit" class="btn btn-primary" value="valider" >Modifier</button ></td></tr>
            </div>
   

</form>
<?php }else{ echo"vous avz pas le droit d'acceder à cette page"; } ?>