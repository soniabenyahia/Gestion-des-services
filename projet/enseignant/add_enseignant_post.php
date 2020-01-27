<!DOCTYPE html>  
 <html> 
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?> 
<div class="titre"><h3><center>Ajouter un enseignant</center></h3>  </div>
<div class="container">
<br><br>

<?php
   
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse = $db->prepare("SELECT * FROM enseignants");
 
  $reponse->execute();
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
        <tr><td>eid</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
                while($var=$reponse->fetch()){?>
                   <option value="<?php echo  $var['eid'];?> " > <?php echo  $var['eid'];?> <?php echo  $var['uid'];?> <?php echo  $var['nom'];?> <?php echo  $var['prenom'];?> <?php echo  $var['email'];?> <?php echo  $var['tel'];?> <?php echo  $var['etid'];?> 
                   </option>
               <?php }?>
        </td></tr>

    </div>

            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" >Ajouter</button ></td></tr>
            </div>
    </table>
<p> Si vous voulez ajouter un enseignant qui n'est pas inscrit veuilez <a href='../user/ajout_user.php'>CLIQUER ICI !</a></p> 
</form>
</div>

<?php }else{ echo"vous avez pas le droit d'acceder à cette page"; } ?>