<?php 
require 'config.php';

$sql = $pdo->query("SELECT * FROM pais WHERE estado = 'MG' ORDER BY data desc LIMIT 45");
$sql = $sql->fetchAll();

$sql = array_reverse($sql);

//print_r($sql);

$data = array();
$qtd = array();
foreach ($sql as $dados) {
	$data[] = date('"d/m/Y"', strtotime($dados['data']));
	$qtd[] = $dados['casosAcumulados'];
	$mortes[] = $dados['obitosAcumulados'];
}




 ?>

 <!DOCTYPE html>
  <html lang="pt-br">
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta charset="utf-8">
      <title>Coronavírus em Ubá, Minas Gerais, Brasil</title>


      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    	<div class="navbar-fixed">
    	<nav class="white text-black">
    		<div class="container nav-wrapper">
    			<a href="#" class="brand-logo">
    				<img src="images/logo-app.png" class="responsive-img" width="300">
    			</a>
    				
    			 <ul id="nav-mobile" class="right hide-on-med-and-down">
			        <li><a href="index.php">Painel Geral</a></li>
			        
			      </ul>
    		</div>

    	</nav>
    </div>

    <section style="margin-top:30px;">
    	<div class="container">
	    	<div class="row">
		    	<div class="col s12 m12 l6">
		    		<span style="color:#0297ff">COVID19</span><br>
		    		<span style="font-size: 25px;" class="light"><strong>Painel</strong> Coronavírus<br>Ubá MG</span>
		    	</div>

		    	<div class="col s12 m12 l6  right-align">
		    		<br>
		    		<span style="font-size: 25px;" class="light"><strong>Atualizado em:</strong><br> 15:30 16/04/2020</span>
		    	</div>
	    	</div>
    	</div>
    </section>
    
    

    <section>
    	<div class="container">

    		<div class="row">
    			<div class="col s12 center">
    				<h3 class="light">Casos Acumulados</h3>

    				<p>Últimos 45 dias</p>
    			</div>
    		</div>


    		<div class="row">

    			<div class="col s12 m12 l12">
    				<div class="card" style="border-radius: 10px; ">
    					<div class="card-content">
    						
    					
    					<div class="card-title">
    						Estado de Minas Gerais<br>
    					</div>
    					<div class="card-action">
    						<canvas id="myChart" width="400" height="220"></canvas>
    						
    					</div>

    					</div>
    				</div>
    				
    			</div>
    		</div>
			
		</div>
    </section>


    <footer class="">
    	 <div class="footer-copyright">
            <div class="container center">
            © 2020 - Painel de casos de doença pelo coronavírus 2019 (COVID-19) na cidade de Ubá Minas Gerais e no Brasil
            <a class="grey-text text-lighten-4 right" href="#!">!</a>
            </div>
          </div>
    </footer>
    	




	<script type="text/javascript" src="jquery-3.5.0.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="Chart.min.js"></script>

	 <script type="text/javascript">
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'line',

	    // The data for our dataset
	    data: {
	        labels: [<?php echo implode(',', $data); ?>],
	        datasets: [{
	            label: 'Casos Confirmados',
	            backgroundColor: '#5d78ff',
	            borderColor: '#5d78aa',
	            data: [<?php echo implode(',', $qtd); ?>]
	        },{
	            label: 'Obitos Confirmados',
	            backgroundColor: '#fab822',
	            borderColor: '#fab822',
	            data: [<?php echo implode(',', $mortes); ?>]
	        }

	        ]




	    },

	    // Configuration options go here
	    options: {}
	});
	</script>

    </body>
  </html>

 

 


 
 