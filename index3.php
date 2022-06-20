<!doctype html>
<?php
include_once './racine.php';
?>

///////////
<?php
  $con = mysqli_connect("localhost","root","","school1");
  if($con){
    echo "connected";
  }
?>
///////





<html lang="en">
  <head>
  	<title>Espace Filiere/Etudiant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
      
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title></title>


        
        ////
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['etudiants', 'contribution'],
         <?php
         $sql = "SELECT distinct nom, count(id)  FROM filiere GROUP BY nom ";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['nom']."',".$result['count(id)']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Students and their contribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    ///


 





  </head>
  <body>
    	
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/logo.jpg);"></div>
	  		
	  			</div>
	  		</div>
                    <ul class="list-unstyled components mb-5">
                <li >
                    <a href="index.php"><span class="fa fa-home mr-3"></span> Etudiant</a>
                </li>

                <li >
                    <a href="index1.php"><span class="fa fa-address-card mr-3"></span> Filiere</a>
                </li>

                <li >
                    <a href="index2.php"><span class="fa fa-address-card mr-3"></span> Ville/Etudiant</a>
                </li>
                <li class="active" >
                    <a href="index3.php"><span class="fa fa-address-card mr-3"></span> Filiere/Etudiant</a>
                </li>
                <li >
                    <a href="index4.php"><span class="fa fa-address-card mr-3"></span> Sexe/Etudiant</a>
                </li>
                </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
    <style>
   fieldset  {
      width: 50%;
      margin: auto;
  }
  
  .tab{
      border-collapse: collapse;
      margin: 0 auto; 
  
  }
  .tab th{
      background-color: #DADBDD;
  }
  
  .tab td, th{
      border : 1px solid black;
      padding: 10px 15px;
  }
  
  .tab tr:nth-child(2n){
      background-color: #E4F4F2
  ;
  }
  
  .tab tr:nth-child(2n + 1){
      background-color: #C4D7ED;
  }
  
  body{
      background-color: #E1E6FA    ;
  }
   fieldset{
       background-color: #C4D7ED    ;
   }
  

  .button1{
      border: none;
          display: block;
          text-align: center;
          cursor: pointer;
          text-transform: uppercase;
          outline: none;
          overflow: hidden;
          position: relative;
          color: #eeeeee;
       
          font-size: 15px;
          background-color: #153f00;
          padding: 5px 5px;
          margin-top: 10px;
   }
 
  .modifier {
          color: #FFC107;
          font-weight: bold;
      }
  .supprimer{
          color: #E34724;
          font-weight: bold;
      }



    </style>
    
   
        

    <?php
        include_once './racine.php';
        include_once RACINE . '/service/EtudiantService.php';

        $es = new EtudiantService();
        ?>
        <form method="GET" action="controller/load2.php" >
                <fieldset>

                        Selectionner une filiere : <select name="filiere" >
                            <?php
                            foreach ($es->findFilieres() as $f) {
                                ?>
                                <option value="<?php echo $f; ?>"><?php echo $f; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        Selectionner le niveau: <select name="niveau" >
                            <?php
                            foreach ($es->findNiveaux() as $n) {
                                ?>
                                <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                <?php
                            }
                            ?>
                        </select>



                  <input class="button1" type="submit" value="Envoyer" />

                </fieldset>

        </form>
       <br> <hr><br>
        
         <table border="1" class="tab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ville</th>
                    <th>Sexe</th>
                    <th>Filiere</th>
                    <th>Niveau</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once RACINE . '/service/EtudiantService.php';
                $es = new EtudiantService();
                if(isset($_GET['filiere']))
                foreach ($es->findEtudiantsByFiliere($_GET['filiere']) as $e) {
                    ?>
                    <tr>
                         <td><?php echo $e->getId(); ?></td>
                        <td><?php echo $e->getNom(); ?></td>
                        <td><?php echo $e->getPrenom(); ?></td>
                        <td ><?php echo $e->getVille(); ?></td>*
                        <td><?php echo $e->getSexe(); ?></td>
                        <td style="color: #153f00; font-weight: bold;"><?php echo $e->getFiliere(); ?></td>
                        <td style="color: #153f00; font-weight: bold;"><?php echo $e->getNiveau(); ?></td>
                        <td>       
                            <a href="controller/deleteEtudiant.php?id=
                               <?php echo $e->getId(); ?>"class="supprimer">Supprimer<i class="material-icons">&#xE872;</i></a> </td>
                        <td><a href="controller/updateEtudiant.php?id=<?php echo $e->getId(); ?>"class="modifier">Modifier<i class="material-icons">&#xE254;</i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>




        ////
        <div id="piechart" style="width: 900px; height: 500px; "></div>
        ///

    </body>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>