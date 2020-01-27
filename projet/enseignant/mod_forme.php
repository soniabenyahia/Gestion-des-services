<!DOCTYPE html>  
 <html>  
  <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Modifier un enseignant</title>  
         
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


<tr><td>nom</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>"/></td></tr>
<tr><td>prenom</td><td><input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom);?>"/></td></tr>
<tr><td>email</td><td><input type="email" name="email" value= "<?php echo htmlspecialchars($email);?>"/></td></tr>
<tr><td>etid</td><td><select class="input-field" id="inputType" type="number" name="etid" value="<?php echo $etid ?>"/>
                                     <option value="1">1(MCF)</option>
                                     <option value="2">2(PR)</option>
                                     <option value="3">3(ATER)</option>
                                     <option value="4">4(VAC1)</option>
                                </select>

</td></tr>
<tr><td>tel</td><td><input type="number" name="tel" value="<?php echo $tel ?>"/></td></tr>
<tr><td>annee</td><td><input type="number" name="annee" value="<?php echo $annee ?>"/></td></tr>
<tr><td>modifier</td><td><input type="submit" value="valider"/>

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