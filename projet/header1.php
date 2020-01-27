<!DOCTYPE html>
<html>
<?php

require_once("auth/EtreAuthentifie.php");

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gestion des services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>

    <nav style="background: #263238;" class="navbar navbar-expand-sm navbar-dark ">
        <img href="#" src="/projet/image/logo.jpg" style="padding-left:0px;height:40px;width:60px;"/>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
		
            <ul class="navbar-nav ml-auto">
                
				<?php
		if ($idm->getRole()=="admin"){ ?>
  <li class="nav-item">
	<div class="dropdown" style="margin-left:10px;margin-right:10px;">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Autres services
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/tab_bord/tab_de_bord3.php?annee=<?php echo $_SESSION['annee'] ?>"> services non complets</a> 
	<a class="dropdown-item" href="/projet/copy_year.php?annee=<?php echo $_SESSION['annee'] ?>"> copier annee</a> 
</div>              

<li class="nav-item">
	<div class="dropdown">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Enseignants
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/enseignant/list_enseignant.php"><img style="height:20px"src="/projet/image/list.png"> Liste des enseignants</a> 
	<a class="dropdown-item" href="/projet/enseignant/add_enseignant.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un enseignant</a>
</div>              
		<li class="nav-item">
				<div class="dropdown">
 <button style="margin-left:10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Groupes
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/groupe/list_groupes.php"><img style="height:20px"src="/projet/image/list.png"> Liste des groupes</a> 
	<a class="dropdown-item" href="/projet/groupe/ajout_groupes.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un groupe</a>

  </div>    	   
			   <li class="nav-item">
				<div class="dropdown">
 <button style="margin-left:10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Types
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/gtype/list_gtypes.php"><img style="height:20px"src="/projet/image/list.png"> Liste des types</a> 
	<a class="dropdown-item" href="/projet/gtype/ajout_gtypes.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un type</a>

  </div>
  <li class="nav-item">
				<div class="dropdown">
 <button style="margin-left:10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Users
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/user/list_user.php"><img style="height:20px"src="/projet/image/list.png"> Liste des users</a> 
	<a class="dropdown-item" href="/projet/user/ajout_user.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un user</a>
	<a class="dropdown-item" href="/projet/user/ajout_admin.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un admin</a>
  </div>
<li class="nav-item">
				<div class="dropdown">
 <button style="margin-left:10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Affectation
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/affectation/list_affectation.php"><img style="height:20px"src="/projet/image/list.png"> Affectation</a> 
	<a class="dropdown-item" href="/projet/affectation/ajout_affectation.php"><img style="height:18px"src="/projet/image/add.png"> Ajout affectation</a>
  </div>

<li class="nav-item">
<div class="dropdown">
 <button style="margin-right:5px;margin-left:10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Modules
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/projet/modules/list_modules.php"><img style="height:20px"src="/projet/image/list.png"> Liste des modules</a>
	<a class="dropdown-item" href="/projet/modules/ajout_m.php"><img style="height:18px"src="/projet/image/add.png"> Ajouter un module<a/>

  </div>
          
		<?php } ?>
		<?php
     
   $_SESSION['uid']=$idm->getUid();

?>
		 
  
                </li>
				<a href="/projet/user/mod_mdp.php?uid=<?php echo $_SESSION['uid'] ?>"style="margin-left:60px;" class="btn btn-secondary " role="button" aria-haspopup="true" aria-expanded="false">
    mot de passe
  </a>
				<li class="nav-item">
                    <a href="/projet/logout.php" class="nav-link"><img style="height:20px"src="/projet/image/logoutw.png"> Logout</a>
                </li>
            </ul>
        </div>
		 </div> 

    </nav>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>