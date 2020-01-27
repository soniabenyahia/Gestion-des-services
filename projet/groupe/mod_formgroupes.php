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
 <form action="" method="post"> 
           <br /><br />  
           <div class="container">  
                <h3 align="center">Informations</h3>  
                <br />  
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered">  
<thead>  
       <tr><td>module</td><td><select  name="mid"  class="form-control from-control-sm">
            <?php
				$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$reponse = $db->prepare("SELECT * FROM modules WHERE annee=$_SESSION[annee]");
			$reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['mid'];?>><?php echo  $var['intitule'];?> <?php echo  $var['code'];?> 
                   </option>
               <?php }?>
        </td></tr>
<tr><td>nom</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>"/></td></tr>
<tr><td>annee</td><td><input type="number" name="annee" value="<?php echo $annee ?>"/></td></tr>

       <tr><td>gtypes</td><td><select  name="gtid"  class="form-control from-control-sm">
            <?php
				$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$reponse = $db->prepare("SELECT * FROM gtypes ");
			$reponse->execute();
                while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['gtid'];?>><?php echo  $var['nom'];?> 
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