<!DOCTYPE html>

<html>
<?php

require_once("auth/EtreInvite.php");
?>

    <head>

        <meta charset="utf-8" />

        <title>Gestion des services</title>

                               <link rel="stylesheet" media="screen" type="text/css" href="/projet/style.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"

        crossorigin="anonymous">

 

                               <link rel="stylesheet" media="screen" type="text/css" href="monstyle.css"/>

                               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>

                <body>

                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

              

 <img src="/projet/image/logo.jpg" style="padding-left:0px;height:40px;width:60px;"/>

                               <h1 style="color:white;margin-left:35%;"> Gestion des services </h1>

                </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"

        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"

        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"

        crossorigin="anonymous"></script>

                              

                <?php

$title="Authentification";

 

 

echo "<p class=\"error\">".($error??"")."</p>";

?>

 
<div>
<div class="left" style="margin-left:5%; margin-top:-70px;margin-bottom:6%">
<img src="/projet/image/photo.png" >
</div>

    <div class='center' style="margin-left:60%;margin-bottom:15%;margin-top:10%;">

        <h2>Authentifiez-vous</h2>

 

                    <form method="post">

                        <!--legend>Authentifiez-vous</legend-->

                        <table class="center">

                            <tr>

                            <td><label for="inputNom" class="control-label">Login</label></td>

                            <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login" required value="<?= $data['login']??"" ?>"></td>

                            </tr>

                            <tr>

                            <td><label for="inputMDP" class="control-label" style="margin-top:5px;margin-right:20px;">MDP</label></td>

                            <td><input type="password" name="password" style="margin-top:5px;" size="20" class="form-control" required id="inputMDP" placeholder="Mot de passe" ></td>

                            </tr>
							<tr>

                            <td><label for="inputAnnee" class="control-label" style="margin-top:5px;margin-right:20px;">Annee</label></td>

                            <td><input type="number" name="annee" style="margin-top:5px;" size="20" class="form-control" required id="inputAnnee" placeholder="Annee"value="<?php echo date('Y')?>"></td>

                            </tr>

                        </table>

                        <div class="form-group">

                            <button style="margin-top:5px;margin-left:60px;" type="submit" class="btn btn-primary bg-dark">Connexion</button>


                        </div>

       </form>

    </div>

 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<?php
include("footer.php");
?>

</body>

</html>