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
  	<title>Espace Filiere</title>
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

                <li class="active">
                    <a href="index1.php"><span class="fa fa-address-card mr-3"></span> Filiere</a>
                </li>

                <li >
                    <a href="index2.php"><span class="fa fa-address-card mr-3"></span> Ville/Etudiant</a>
                </li>
                <li  >
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

 legend{
     font-size: 20px;
     font-weight: bold;
     color: #183152;
    
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
.button2{
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
    
    <body>
        <form method="GET" action="controller/addFiliere.php">

            <fieldset>
                <legend>Ajouter une nouvelle filiere</legend>

                <table border="0">

                    <tr>
                        <td>Nom Filiere : </td>
                        <td><input type="text" name="nom" value="" /></td>
                    </tr>
                   
                    <tr>
                        <td>Niveau </td>
                        <td>
                            1ere annee<input type="radio" name="niveau" value="1ere annee" />
                            2eme annee<input type="radio" name="niveau" value="2eme annee" />
                            3eme annee<input type="radio" name="niveau" value="3eme annee" />
                        </td>
                    </tr>
                    <tr>
                        <td><input class="button1" type="submit" value="Envoyer" /></td>
                        <td><input class="button2" type="reset" value="Effacer" /></td>
                        
                    </tr>


                </table>
               


            </fieldset>

            <br><hr><br>
        </form>
        <table border="1" class="tab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Filiere</th>
                    <th>Niveau</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once RACINE . '/service/FiliereService.php';
                $es = new FiliereService();
                foreach ($es->findAll() as $e) {
                    ?>
                    <tr>
                        <td><?php echo $e->getId(); ?></td>
                        <td><?php echo $e->getNom(); ?></td>
                        <td><?php echo $e->getNiveau(); ?></td>
                        <td>      
                            <a href="controller/deleteFiliere.php?id=
                                    <?php echo $e->getId(); ?>" class="supprimer">Supprimer<i class="material-icons">&#xE872;</i></a> </td>
                        <td><a href="updateFiliere.php" class="modifier">Modifier<i class="material-icons">&#xE254;</i></a></td>
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