<?php 

require 'config.php';




$sql = $pdo->query("SELECT * FROM uba ORDER BY data desc LIMIT 30");

$sql = $sql->fetchAll();



$sql = array_reverse($sql);



//print_r($sql);





foreach ($sql as $dados) {

  $dataUba[] = date('"d/m/Y"', strtotime($dados['data']));

  $qtdUba[] = $dados['casosAcumulados'];

  $mortesUba[] = $dados['obitosAcumulados'];

}









$sql = $pdo->query("SELECT * FROM pais WHERE estado = 'MG' ORDER BY data desc LIMIT 30");

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

      <link rel="stylesheet" type="text/css" href="css/style.css">



      <!--Let browser know website is optimized for mobile-->

      <meta charset="utf-8">

      <title>Coronavírus em Ubá, Minas Gerais, Brasil</title>



        <link rel="icon" href="images/favicon.png">

        

      

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link rel="manifest" href="manifest.json">

      <!-- Global site tag (gtag.js) - Google Analytics -->

      <script async src="https://www.googletagmanager.com/gtag/js?id=G-N1T1WCP0BN"></script>

      

      <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());



        gtag('config', 'G-N1T1WCP0BN');

      </script>

    </head>



    <body>

     

      <div class="top">

        

      </div>

    	<div class="navbar-fixed">

    	<nav class="white text-black">



    		<div class="container nav-wrapper">

    			<a href="index.php" class="brand-logo">

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

		    	<div class="col s6">

		    		<span style="color:#0297ff">COVID19</span><br>

		    		<span style="font-size: 25px;" class="light"><strong>Painel</strong> Coronavírus<br>Ubá MG</span>

		    	</div>



		    	<div class="col s6  right-align">

		    		<br>

		    		<span style="font-size: 25px;" class="light"><strong>Atualizado em:</strong><br> 08:58 21/04/2020</span>

		    	</div>

	    	</div>

    	</div>

    </section>





    <section>

      <div class="container">

        <div class="row">

          <div class="col s12 m12 l4">



            <div class="col s12 m4 l12">

              <div class="card"  style="border-radius: 10px; ">

              

              <div class="card-content">

                <div class="card-title"><button class="btn-floating btn-large" style="margin-right: 8px; background: #5d78ff; font-weight: bold; font-size: 1.5rem;"><?php echo end($qtdUba); ?></button> <span class="light" style="font-size:1.2rem" >Casos Confirmados</span></div>

               

              </div>

            </div>

            </div>



            

             <div class="col s12 m4 l12">

            <div class="card "  style="border-radius: 10px; ">

              

              <div class="card-content ">

                <div class="card-title"><button class="btn-floating red btn-large" style="margin-right: 8px; font-weight: bold; font-size: 1.5rem;"><?php echo end($mortesUba); ?></button> <span class="light" style="font-size:1.2rem" >Óbitos Confirmados</span></div>

               

              </div>

            </div>

          </div>





           <div class="col s12 m4 l12">



             <div class="card "  style="border-radius: 10px; ">

              

              <div class="card-content ">

                <div class="card-title"><button class="btn-floating orange btn-large" style="margin-right: 8px; font-weight: bold; font-size: 1.5rem;">

                  



                  0%



                </button> <span class="light" style="font-size:1.2rem" >Letalidade</span></div>

               

              </div>

            </div>

          </div>





          </div>





          <div class="col s12 m12 l8">

            

            <div class="card"  style="border-radius: 10px; ">

              <div class="card-content">

                

               

                  <canvas id="uba" width="400" height="200"></canvas>

                

              </div>

            </div>



          </div>





        </div>

      </div>

    </section>

    

    



    <section>

    	<div class="container">



    		<div class="row">

    			<div class="col s12 center">

    				<h3 class="light">Minas Gerais</h3>



    				<p>Últimos 30 dias</p>

    			</div>

    		</div>

    		

    		

    		<div class="row">

    		    
            <!-- BOX 1 -->
    		    <div class="col s12 m4 l4">

              <div class="card"  style="border-radius: 10px; ">

                    <div class="card-content">

                      <div class="card-title">
                        <button class="btn-floating btn-large" style="margin-right: 8px; background: #5d78ff; font-weight: bold; font-size: 1.3rem;">
                        <?php echo $totalCasosEstado = end($qtd); ?>
                      </button> 
                      <span class="light" style="font-size:1.2rem" >Casos Confirmados</span>
                      </div>

                    </div>

              </div>

            </div>
            <!-- FIM  BOX 1 -->


            
            <!-- BOX 2 -->

            <div class="col s12 m4 l4">

              <div class="card"  style="border-radius: 10px; ">

                <div class="card-content ">

                  <div class="card-title">
                    <button class="btn-floating red btn-large" style="margin-right: 8px; font-weight: bold; font-size: 1.3rem;">
                      <?php echo $mortesEstado = end($mortes); ?>
                    </button> 
                    <span class="light" style="font-size:1.2rem" >Óbitos Confirmados</span>
                  </div>

                </div>

              </div>

            </div>
            <!-- FIM BOX 2 -->





           <!-- BOX 3 -->

           <div class="col s12 m4 l4">

             <div class="card "  style="border-radius: 10px; ">

              <div class="card-content ">

                <div class="card-title"><button class="btn-floating orange btn-large" style="margin-right: 8px; font-weight: bold; font-size: 1.3rem;">

                  <?php 
                  
                  $letalidade = ($mortesEstado * 100) / $totalCasosEstado;

                  echo number_format($letalidade, 1, ',', '.')."%";
                  
                  ?>

                </button> <span class="light" style="font-size:1.2rem" >Letalidade</span>
                </div>

              </div>

            </div>

          </div>
           <!-- fim BOX 3 -->

        <!-- GRAFICO ESTADO -->
    		<div class="row">



    			<div class="col s12 m12 l12">

    				<div class="card" style="border-radius: 10px; ">

    					<div class="card-content">
                <div class="card-title">Casos Acumulados<br></div>
    					  <div class="card-action"><canvas id="minas" width="400" height="220"></canvas></div>
    					</div>

    				</div>

    			</div>

        </div>
         <!-- FIM GRAFICO ESTADO -->

			

        </div>
        
    	</div>

    </section>





    <footer class="back-footer">

    	

            <div class="container center white-text">

              <div class="" style="padding: 30px 0;">

                <div class="col s12">Painel de casos de doença pelo coronavírus 2019 (COVID-19) na cidade de Ubá, Minas Gerais e no Brasil.<br/>
                <small>Vesão 1.1</small>
              </div>

              </div>

           

            

            </div>

          

    </footer>

    	









  <script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
  

  

      <!--JavaScript at end of body for optimized loading-->

      <script type="text/javascript" src="js/materialize.min.js"></script>

      <script type="text/javascript" src="js/Chart.min.js"></script>









      <script type="text/javascript">

    var ctx = document.getElementById('uba').getContext('2d');

    var chart = new Chart(ctx, {

      // The type of chart we want to create

      type: 'line',



      // The data for our dataset

      data: {

          labels: [<?php echo implode(',', $dataUba); ?>],

          datasets: [{

              label: '<?php echo end($qtdUba); ?> Casos Confirmados em Ubá',

              backgroundColor: '#5d78ff',

              borderColor: '#5d78aa',

              data: [<?php echo implode(',', $qtdUba); ?>]

          },{

              label: '<?php echo end($mortesUba); ?> Óbitos Confirmados em Ubá',

              backgroundColor: '#fab822',

              borderColor: '#fab822',

              data: [<?php echo implode(',', $mortesUba); ?>]

          }]
      },
      // Configuration options go here
      options: {
        responsive:true,
        tooltips:{
          
          mode: 'index',
          intersect: false
        }
        }
  });

  </script>







	 <script type="text/javascript">

		var ctx = document.getElementById('minas').getContext('2d');

		var chart = new Chart(ctx, {

	    // The type of chart we want to create

	    type: 'line',



	    // The data for our dataset

	    data: {

	        labels: [<?php echo implode(',', $data); ?>],

	        datasets: [{

	            label: '<?php echo end($qtd); ?> Casos Confirmados',

	            backgroundColor: '#5d78ff',

	            borderColor: '#5d78aa',

	            data: [<?php echo implode(',', $qtd); ?>],
              fill:false

	        },{

	            label: '<?php echo end($mortes); ?> Óbitos Confirmados',

	            backgroundColor: '#fab822',

	            borderColor: '#fab822',

	            data: [<?php echo implode(',', $mortes); ?>],
              fill:false

	        }



	        ]









	    },



	    // Configuration options go here

	    options: {
        responsive:true,
        tooltips:{
          
          mode: 'index',
          intersect: false
        }
      }

	});


  

	</script>
 <script src="/js/main.js"></script>


    </body>

  </html>



 



 





 

 