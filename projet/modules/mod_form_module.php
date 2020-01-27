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
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reponse = $db->prepare("SELECT eid,nom,prenom FROM enseignants WHERE annee=$_SESSION[annee]");
  $reponse->execute();
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
	    <tr><td>intitule</td><td><input type="text" name="intitule" value="<?php echo htmlspecialchars($intitule);?>"/></td></tr>
        <tr><td>code</td><td><input type="text" name="code" value="<?php echo htmlspecialchars($code);?>"/></td></tr>
        <tr><td>enseignant</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['eid'];?>><?php echo  $var['eid'];?>  <?php echo $var['nom']; ?> <?php echo $var['prenom']; ?>
                   </option>
               <?php }?>
        </td></tr>
		<tr><td>categorie</td><td><select class="input-field" id="inputType" type="number" name="cid" value="<?php echo $cid ?>"/>
                                     <option value="1">Licence 1 Informatique</option>
                                     <option value="2">Licence 2 Informatique</option>
                                     <option value="3">Licence 3 Informatique</option>
                                </select>

         </td></tr>
         <tr><td>annee</td><td><input type="number" name="annee" value="<?php echo $annee ?>"/></td></tr>
    </div>
	
	
 </table>
            <div class="form-group">
                <tr><td>Modifier</td><td><button type="submit" class="btn btn-primary" value="valider" >Modifier</button ></td></tr>
            </div>
   

</form>
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>