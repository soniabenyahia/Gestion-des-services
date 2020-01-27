<?php

$page_title= "chaque groupe";

require_once("../auth/EtreAuthentifie.php");

include( "../db_config.php");

include("../header1.php");

if($idm->getRole()=="admin"){

 

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<br/><br/>


<h3><center>Enseignants</center></h3>

 
<br>
<div style="display:flex" >

<div style="width :50%; "class="table-responsive" >

              <table id="employee_data" class="table table-striped table-bordered" >

                   <thead>

                        <tr >

                                                                                             

                                   <td>enseignants</td>

                                   <td>heures affectées</td>

                                   <td>heures restantes</td>

 

                        </tr>

                   </thead>

 

<?php

try {         

                               $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = " SELECT e.nom,e.prenom ,SUM(a.nbh) as nbheffectue,(et.nbh)-SUM(a.nbh) as nbhrestants FROM `enseignants`e ,`affectations` a,

     `etypes` et  WHERE  e.eid=a.eid AND et.etid=e.etid AND e.annee=$_SESSION[annee]  GROUP BY e.nom ";

     $st = $db->query($sql);

     $nbhme=0;

     $sume=0;

     $nbhtotale=0;

      foreach ($st as $row  ) {

          echo "<tr>";

          echo "<td>$row[nom]  $row[prenom]</a></td>";

          echo "<td>$row[nbheffectue]</a></td>";

          echo "<td>$row[nbhrestants]  </a></td>";

          $sume=$sume + $row['nbheffectue'];

          $nbhmae=$nbhme+$row['nbhrestants'] ;

       echo "</tr>";

      }

      echo "<td><h4>le totale de nombre d'heures effectuées : $sume</h4></td>";       

      echo "<td><h4>le nombre total  d'heures manquantes :  $nbhme</h4></td>";       

 

    $db=null;

    }

 

catch(PDOException $e) {

   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;

   die();

}

?>

</table>

</div>

   <div id="chart1" ></div>

 

</div>

 <br/><br/><h3><center>Modules</center></h3>

    <div style ="display : flex" >

         <br />

        

<div>

                                                 <table id="employee_data" class="table table-striped table-bordered" style="width:50%">

                   <thead>

                        <tr >

                                   <td>module</td>

                                  <td>heures affectées</td>

                                   <td>heures restantes</td>

                        </tr>

                   </thead>

<?php

try {         

                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = " SELECT m.intitule ,g.nom as groupe,e.nom,e.prenom ,SUM(a.nbh) as nbheffectue,(SUM(gt.nbh)-SUM(a.nbh)) as nbhrestants FROM `groupes` g ,`modules` m ,`enseignants`e ,`affectations` a,

    `gtypes` gt  WHERE m.mid=g.mid AND e.eid=a.eid AND g.gid=a.gid AND gt.gtid=g.gtid  GROUP BY m.intitule";

    $st = $db->query($sql);

    $nbhm=0;

    $sum=0;

    $nbhtotal=0;

     foreach ($st as $row  ) {

         echo "<tr>";

         echo "<td>$row[intitule]</a></td>";

         echo "<td>$row[nbheffectue]</a></td>";

         echo "<td>$row[nbhrestants]  </a></td>";

         $sum=$sum + $row['nbheffectue'];

         $nbhm=$nbhm+$row['nbhrestants'] ;

 

      echo "</tr>";

     }

     echo "<td><h4>le totale de nombre d'heure effectué : $sum</h4></td>";       

     echo "<td><h4>le nombre total  d'heure manquante :  $nbhm</h4></td>";       

 

     echo "<br>";

     echo "</div>";

 

    $db=null;

    }

 

catch(PDOException $e) {

   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;

   die();

}

 

 

 

?>

</table>

  </div>

   <div id="chart2" ></div>

</div>
 



<?php

 

}else{

   

     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";

   }

?>

<?php

include ("../footer.php");

 

?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

 

      google.charts.setOnLoadCallback(drawSarahChart);

 

      google.charts.setOnLoadCallback(drawAnthonyChart);

 

      function drawSarahChart() {

 

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Topping');

        data.addColumn('number', 'Slices');

        data.addRows([

          ['nbh effectués', <?php echo "$sume" ?>],

          ['nbh non effectués',<?php echo "$nbhme" ?>]

        ]);

 

        var options = {title:'horaire du travail',

                       width:400,

                       height:300};

 

        var chart = new google.visualization.PieChart(document.getElementById('chart1'));

        chart.draw(data, options);

      }

 

      function drawAnthonyChart() {

 

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Topping');

        data.addColumn('number', 'Slices');

        data.addRows([

          ['nbh effectués', <?php echo "$sum" ?>],

          ['nbh non effectués', <?php echo "$nbhm" ?>],

         

        ]);

 

        var options = {title:'horaire du travail',

                       width:400,

                       height:300};

 

        var chart = new google.visualization.PieChart(document.getElementById('chart2'));

        chart.draw(data, options);

      }

    </script>
