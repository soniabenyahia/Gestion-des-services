<?php
require_once("auth/EtreAuthentifie.php");
$title = 'Accueil';

include("header1.php");
?>

<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


		 <link rel="stylesheet" media="screen" type="text/css" href="style.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
               <div style="height:20px;"></div>
                  <?php if($idm->getRole()=="user"){?>
				<div class="profile" style="display :flex;border: 3px solid #263238;padding-left:5px;margin-top:10px;margin-left:19%;margin-bottom:3%;width:700px;">
				  <?php } ?>
                  <?php if($idm->getRole()=="admin"){?>
				    <div class="profile" style="display :flex;border: 3px solid #263238;padding-left:5px;margin-top:10px;margin-left:19%;margin-bottom:25%;width:700px;">
				  <?php }?>
						<img style="height:115px;width:100px;margin-top:3px;margin-left:150px;" src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
						<ul class="container details" style="margin-left:30px;margin-right:50px;;">
							<h2 style="border-bottom:1px solid black;padding-bottom:5px;width:px;"><?php echo $idm->getIdentity()?> | <?php echo $idm->getRole() ?> </h2>
							<?php if ($idm->getRole()=="user"){
									
										$db = new PDO("mysql:host=$host;dbname=$dbname;charest=UTF-8", $username, $password);
										$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$sql = "SELECT e.tel , e.email FROM `enseignants`e WHERE e.uid=".$_SESSION['uid'] ;
										$reponse = $db->prepare($sql);
										$reponse->execute();
										foreach($reponse as $row) { 
											$tel=$row["tel"];
											$email=$row["email"];
										}
									?>
							<li><i class="fa fa-phone" style="margin-right:5px;"></i><?php echo $tel ?></li>
							<li><i class="fa fa-envelope" style="margin-right:5px;"></i><?php echo $email ?></li>
							<?php }else{ ?>
							<li><i class="fa fa-phone" style="margin-right:5px;"></i>tel </li>
							<li><i class="fa fa-envelope" style="margin-right:5px;"></i> email </li>
							<?php } ?>
							<li><i class="fa fa-calendar" style="margin-right:5px;"></i><?php echo $_SESSION['annee'] ?></li>
						</ul>
                    </div>
<?php
  include( "db_config.php");   
  $_SESSION['uid']=$idm->getUid();
  if ($idm->getRole()=="user"){
		try{
			$db = new PDO("mysql:host=$host;dbname=$dbname;charest=UTF-8", $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="SELECT e.eid FROM `enseignants`e WHERE e.uid=".$_SESSION['uid'] ;
			$st=$db->query($sql);
			$res=$st->fetch();;
			$_SESSION['eid']=$res['eid'];
			$db=null;
			include ("tab_de_bord1.php");
		}
  catch(PDOException $e){
	print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
	die();
  }
}
?>

</body>

</html>
<?php include ("footer.php"); ?>