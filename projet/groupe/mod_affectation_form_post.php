<!DOCTYPE html>  
<html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
<div class="titre"><h3><center>Modification de l'affectation à un module</center></h3>  </div>
<div class="container">
<br><br>

<?php
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse->execute();
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
        <tr><td>mid</td><td><select  name="mid"  class="form-control from-control-sm">
            <?php
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['mid'];?>><?php echo  $var['mid'];?>  <?php echo $var['intitule']; ?>
                   </option>
               <?php }?>
        </td></tr>

    </div>

            <div class="form-group">
                <tr><td>Modifier</td><td><button type="submit" class="btn btn-primary" value="valider" >Modifier</button ></td></tr>
            </div>
    </table>

</form>
</div>
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>