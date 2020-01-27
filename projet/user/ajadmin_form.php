<!DOCTYPE html>   
 <html>  
 <?php

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){
?>
      <head>  
           <title>Ajouter un admin</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
      </head>  
<body> 
<form action="" method="post">
          		  <div class="container">  
                <h3 align="center">Ajouter un admin</h3>  
                
                <div class="table-responsive">  
                     <table  class="table table-striped table-bordered"> 
<thead>
                    <tr>
                        <td><label for="inputLogin" class="control-label">Login</label></td>
                         <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" required value="<?= $data['login']??""?>">
                         </td>
                    </tr>
					<tr>
                        <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value=""></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value=""></td>
                    </tr>
					<tr>
                       <td> <label for="inputRole" class="control-label">Role</label></td>
					   <td><select class="input-field" id="inputRole" name="role" placeholder="role" required value="<?= $data['role']??""?>">
                                     
                                     <option value="admin">Admin</option>
                                </select>
                            </td>
                        
                    </tr>
					<tr>
					<td>
					<div class="form-group">
                            <button type="submit" class="btn btn-primary">S'enregistrer</button>
                    </div>
					</td>
					</tr>

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