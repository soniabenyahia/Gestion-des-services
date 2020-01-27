<?php
require_once("auth/EtreAuthentifie.php"); 
$page_title= "table de bord enseignant";
//include("../header1.php");
if ($idm->getRole()=="user"){


?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


      <body>
           <div class="container">
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>intitule</td>
                                   <td>groupes</td>
                                   <td>nbh</td>
                                   <td>eqtd</td>
                                   
                               </tr>
                          </thead>		  
<?php
     $eid= $_SESSION['eid'];
	 $annee= $_SESSION['annee'];
     require("db_config.php");
	 try {
          	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $sql="SELECT m.intitule ,g.nom as groupe,SUM(a.nbh)as nbh,((gt.coeff)*SUM(a.nbh)) as eqtd ,et.nbh as nbhp FROM `affectations` a INNER JOIN `enseignants` e ON   e.eid =a.eid  INNER JOIN `groupes` g ON  g.gid=a.gid  INNER JOIN `etypes` et ON et.etid = e.etid  INNER JOIN `gtypes` gt ON  gt.gtid=g.gtid INNER JOIN `modules` m  ON  g.mid=m.mid  INNER JOIN `users` u ON  u.uid=e.uid  WHERE e.eid=:eid  AND e.annee=:annee GROUP BY m.intitule ,g.nom";
       $st = $db->prepare($sql);
		$st->execute(array('eid'=>"$eid",'annee'=>"$annee"));
       $nbhA=0;
	   $nbhB=0;
        foreach ($st as $row  ) {
               echo "<tr>";
                     echo "<td>$row[intitule]</td>";
                     echo "<td>$row[groupe]</td>";
                     echo "<td>$row[nbh]</td>";
                     echo "<td>$row[eqtd]</td>";
                     $nbhA=$nbhA+$row['nbh'];
                     $nbhB=$row['nbhp']-$nbhA;

               echo "</tr>";
           }

          echo "<td>le nbh effectué : $nbhA</td>";
         
          echo "<td>le nbh n'est pas effectué : $nbhB</td>";

     

    $db=null;

} catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
 


?>
</table>
<div style="width:500px;height:500px;" class="container">
    <canvas id="myChart2"></canvas>
  </div>


<div style="width:500px;height:500px;" class="container">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

   

    let massPopChart = new Chart(myChart, {
      type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['le nbh effectué', 'le nbh n est pas effectué'],
        datasets:[{
          label:'Horaire du travail',
          data:[
            <?php echo "$nbhA" ?>,
			<?php echo "$nbhB" ?> 
          ],
          
          backgroundColor:[
		  'rgba(54, 162, 235, 0.6)',
            'rgba(0, 255, 127, 0.6)'
           
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Horaire du travail',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>


<?php 


}else{ echo"vous avez pas le droit d'acceder à cette page";} 
?>
