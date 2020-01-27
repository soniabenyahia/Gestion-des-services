<?php
$title="Ajout de l'utilisateur";

require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="admin"){

?>
<head>

                              <p class="error"><?= $error??""?></p>
<div style="margin-left:40%" class="center">
    <h1>Inscription</h1>
    <form method="post">
                    <!--legend>Inscription</legend-->
        <table>
                    <tr>
                        <td><label for="inputNom" class="control-label">Nom</label></td>
                         <td><input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required value="<?= $data['nom']??""?>">
                         </td>
                    </tr>
                    <tr>
                       <td> <label for="inputPrenom" class="control-label">Prénom</label></td>
                          <td>  <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required aria-required="true" value="<?= $data['prenom']??""?>"></td>
                    </tr>
					<tr>
                       <td> <label for="inputEmail" class="control-label">email</label></td>
                          <td>  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required aria-required="true" value="<?= $data['email']??""?>"></td>
                    </tr>
					<tr>
                       <td> <label for="inputTel" class="control-label">Tel</label></td>
                          <td>  <input type="tel" name="tel" class="form-control" id="inputTel" placeholder="Tel" required aria-required="true" value="<?= $data['tel']??""?>"></td>
                    </tr>
					<tr>
                       <td> <label for="inputAnnee" class="control-label">Annee</label></td>
                          <td>  <input type="number" name="annee" class="form-control" id="inputAnnee" placeholder="Annee" required aria-required="true" value="<?= $data['annee']??""?>"></td>
                    </tr>
					<tr>
                       <td> <label for="inputEtid" class="control-label">etid</label></td>
					   <td><select class="input-field" id="inputType" name="etid" placeholder="etid" required value="<?= $data['etid']??""?>">
                                     <option value="1">MCF</option>
                                     <option value="2">PR</option>
                                     <option value="3">ATER</option>
                                     <option value="4">VAC1</option>
                                </select>
                            </td>
                        
                    </tr>
                    <tr>
                        <td><label for="inputLogin" class="control-label">Login</label></td>
                            <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" required value="<?= $data['login']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value=""></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value=""></td>
                    </tr>
        </table>
                    <div class="form-group">
                           <button type="submit" class="btn btn-primary bg-dark">S'enregistrer</button>
                    </div>
    </form>
    </div>
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>
 <?php }else{ echo"vous avez pas le droit d'acceder à cette page";} ?>