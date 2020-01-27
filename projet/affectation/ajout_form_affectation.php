<!DOCTYPE html>  
 <html> 
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?> 
<div class="titre"><h3><center>Ajouter une affecatation</center></h3>  </div>
<div class="container">
<br><br>

<?php
   
  		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse = $db->prepare("SELECT * FROM enseignants WHERE annee=$_SESSION[annee]");
 
  $reponse->execute();
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
        <tr><td>eid</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['eid'];?> " > <?php echo  $var['eid'];?>  <?php echo  $var['nom'];?> <?php echo  $var['prenom'];?>  <?php echo  $var['etid'];?> 
                   </option>
               <?php }?>
        </td></tr>
		<tr><td>gid</td><td><select  name="gid"  class="form-control from-control-sm">
            <?php
			 	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql = "SELECT g.gid , m.intitule , g.nom , g.annee , gt.nom as type FROM `groupes` g ,`modules` m ,`gtypes` gt
	         WHERE m.mid=g.mid AND gt.gtid=g.gtid AND g.annee =$_SESSION[annee] ";
             $reponse = $db->prepare($sql);
             $reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['gid'];?> " > <?php echo  $var['intitule'];?> <?php echo  $var['nom'];?> <?php echo  $var['type'];?>
                   </option>
               <?php }?>
        </td></tr>
		       </td></tr>
         <tr><td>nbh</td><td><input type="number" name="nbh"/></td></tr>

    </div>

            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" >Ajouter</button ></td></tr>
            </div>
    </table>

</form>
</div>
<?php }else{ echo "vous avez pas le droit d'acceder à cette page"; } ?>