<?php

session_start();

if( isset ( $_POST['create-char'] ) )

{


$_SESSION['heritage'] = $_POST['heritage'];

$_SESSION['specialty'] = $_POST['specialty'];

$_SESSION['lifestate'] = $_POST['lifestate'];

$_SESSION['race'] = $_POST['race'];

$_SESSION['firstClass'] = $_POST['first-class'];

$_SESSION['secondClass'] = $_POST['second-class'];

$_SESSION['ally'] = $_POST['ally'];

$_SESSION['spirit'] = $_POST['spirit'];


$content_ = "";

$content_ .= "<!DOCTYPE html>";

$content_ .= "<html>";

$content_ .= "<head>";

$content_ .= "<meta charset='utf-8'>";

$content_ .= "<title>";

$content_ .= "Demi Gods";

$content_ .= "</title>";

$content_ .= "

<!-- Custom CSS code -->

<link rel='stylesheet' type='text/css' href='css/game.css' />

 <!-- JavaScript libraries -->

<script type='text/javascript' src='js/js-libraries/onilabs-apollo-12f36f9/oni-apollo.js'></script>


 <script type='text/javascript' src='js/js-libraries/jquery-1.7.2.min.js'></script> 
 
 
 <!-- For canvas drawing of buildings -->
 <script type='text/javascript' src='js/js-libraries/kinetic-v3.10.3.js'></script> 
 
 
 <!-- For skills dialog box -->
 
 <link rel='stylesheet' type='text/css' href='js/js-libraries/jquery-ui-1.8.21.custom/css/jquery-ui-1.8.21.custom.css' />

 <script src='js/js-libraries/jquery-ui-1.8.21.custom/js/jquery-ui-1.8.21.custom.min.js'></script>




<style>

  .ui-dialog-titlebar-close
    {
	
    display: none;
	
	}


  #mainDiv{

      background: #000 url('images/background.jpg') repeat-y scroll left top;
      position: relative; display:block; top: 20px; left:0; height: 640px; width: 1200px;
      margin-left: auto; margin-right: auto;margin-top: auto; margin-bottom: auto;



  }




</style>
 
";



$content_ .= "<script type='text/javascript' src='include/php/start.php'></script>";



$content_ .= "

<!-- Custom JavaScript Code -->

<script type='text/javascript' src='js/js-custom/game.js.php'></script>

<script type='text/javascript' src='js/js-custom/game-generic.js.php'></script>


<script type='text/javascript' src='js/js-custom/main-display.js.php'></script>

<script type='text/javascript' src='js/js-custom/mini-map.js.php'></script>

<script type='text/javascript' src='js/js-custom/fight.js.php'></script>

<script type='text/javascript' src='js/js-custom/opponent.js.php'></script>


<script type='text/javascript' src='js/js-custom/chars/undead.js.php'></script>

<script type='text/javascript' src='js/js-custom/chars/vampire.js.php'></script>

<script type='text/javascript' src='js/js-custom/chars/shapeshifter-summoner.js.php'></script>

<script type='text/javascript' src='js/js-custom/chars/arcanemagickian.js.php'></script>

<script type='text/javascript' src='js/js-custom/chars/martial.js.php'></script>

";


$content_ .= "

    <script type='text/sjs'>

/* click (onclick) event listeners must be called in $(window).load(funcction) { }); */



$(window).load(function()
    {

    if(heritage == 'nightstalker assassin')
        {

            $('#katanaButton').click(function () {

               spawn katana();

            });


        }

    if( race == 'vampire')
        {
            /* The following way is on way to add event listener to button onclick to the function and spawn it. */

           $('#vampUnarmedButton').click(function(){

                spawn vampUnarmedAttack();

            });

            $('#vampBiteButton').click(function(){

                spawn vampBite();

            });

            $('#mistButton').click(function(){

                spawn mistform();

            });

            $('#invButton').click(function(){

                spawn inv();

            });

            $('#flyButton').click(function() {

                spawn fly();

            });

        }

    if( race == 'demon' )
        {

            $('#telekinisisButton').click( function() {

            spawn telekinisis();

            });

        }

    if( race == 'deity')
        {


            $('#symbiosisButton').click(function(){

               spawn symbiosis();

            });


            $('#infernoButton').click(function(){

                spawn inferno();

            });


        }

    if ( fClass == 'shapeshifter-summoner')
        {

            $('#shapeButton').click(function () {


               spawn shape();

            });

            $('#phoenixButton').click(function () {

               spawn phoenix();

            });


            $('#healPhoenixButton').click(function () {

               spawn healPhoenix();

            });

            $('#ectoplasmButton').click(function(){

                spawn summonEctoplasm();

            });

        }


      if(fClass == 'martial artist')
        {

         $('#pressButton').click(function () {

               spawn press();

            });

        $('#comboButton').click(function () {

           spawn combo();

        });


        $('#lifestrikeButton').click(function () {

            spawn kailifestrike();

        });


        $('#tigerButton').click(function () {

            spawn tiger();

        });


        }




      if(sClass == 'alien technologist')
        {

            $('#nanoButton').click(function(){


                spawn nano();


            });


        }

      if(sClass == 'arcane magickian' )
        {

           $('#eyesLaserBoltButton').click(function(){


                 spawn eyeLaserBolt();


            });


           $('#gaiaBlessButton').click(function(){


                 spawn gaiaBless();


            });

          $('#slowButton').click(function() {

               spawn slow();

            });


         $('#rayButton').click(function () {

               spawn ray();

            })'


        }




    });

    ";

$content_ .= file_get_contents('include/sjs/fight.sjs');

$content_ .= file_get_contents('include/sjs/phoenixFight.sjs');

$content_ .= file_get_contents('include/sjs/game-generic.sjs');


/* Load Heritage, specialties, races, first classes, second classes and standard skills*/

$content_ .= file_get_contents('include/sjs/chars/nightstalker.sjs');

$content_ .= file_get_contents('include/sjs/chars/vampire.sjs');

$content_ .= file_get_contents('include/sjs/chars/demon.sjs');

$content_ .= file_get_contents('include/sjs/chars/deity.sjs');

$content_ .= file_get_contents('include/sjs/chars/shapeshifter-summoner.sjs');


$content_ .= file_get_contents('include/sjs/chars/alientech.sjs');

$content_ .= file_get_contents('include/sjs/chars/arcanemagickian.sjs');


$content_ .= file_get_contents('include/sjs/chars/phoenix.sjs');

$content_ .= file_get_contents('include/sjs/chars/martial.sjs');


$content_ .= "

    </script>

";


$content_ .= "</head>";

$content_ .= "<body><div id='mainDiv'>";



$content_ .= " 



	<table class='layout-table'>

	
		<tr>

			<td>

				<div id='moves'></div>

			</td>

			<td>


				<table>

					<tr>
  
						<td>
  
							<table>
	 
	 	 
								<tr>
									<td>

										<div id='levelContainer'></div>

									</td>
								
								</tr>


								<tr>
									<td>

										<div id='mapContainer'></div>

									</td>

								</tr>

  
								<tr>
								
									<td>

										<div id='skillPointsContainer'></div>

									</td>
									
								</tr>
  
  
								<tr>
								
									<td>

										<div id='healthBar'></div>

									</td>
								
								</tr>

  
								<tr>
								
									<td>

										<div id='manaBar'></div>

									</td>
									
								</tr>  
  
								<tr>
								
									<td>

										<div id='energyCurrencyContainer'></div>

									</td>
								
								</tr>

								<tr>

								    <td>

								        <div id='phoenixHealthBar'></div>

								    </td>

								</tr>
							
							</table>
  
  
						</td> 
					
					</tr>
  
					<tr>
					
						<td>




		<div id='messages'  >  </div>
         <a href='#' id='scroll-down' style='text-decoration:none'>&dArr;</a>  <a href='#' id='scroll-up' style='text-decoration:none'>&uArr;</a>

						</td>
						
					</tr>
  
  
  
  
				</table>
 


			</td> 
  
  
  
			<td>

				<table>

				    <tr>

				        <td>

				            <center id='characterInfo'>

                                <span id='showHeritage'></span>

                                <span id='showSpecialty'></span>

                                <span id='showLifestate'></span>

                                <br />

                                <span id='showRace'></span>

                                <span id='showfClass'></span>

                                <span id='showsClass'></span>

                                <span id='showAlly'></span>

                                <span id='showSpirit'></span>

                            </center>

                         </td>

                     </tr>


					<tr>
						<td>
							<div id='container'></div>
						</td>
					
					</tr>
					<tr>
						<td>
							<audio id='music-theme' autoplay loop preload='auto'>
							<source src='audio/theme.ogg' type='audio/ogg' />
							<source src='audio/theme.mp3' type='audio/mp3' />
							Your browser does not support the audio element.
							</audio>
    
							<center><button onclick=\"document.getElementById('music-theme').play();canvas.focus();\">Play Music</button>
							<button onclick=\"document.getElementById('music-theme').pause();canvas.focus();\">Pause Music</button></center>
						</td>
					</tr>
					<!-- mini map -->
                    <tr>
			            <td>

				            <table align='center'>
					            <tr>

					                <td>

					          			<div id='skills'></div>
			                            <div id='shopButton'></div>
				                        <div id='saveButton'></div>

					                </td>
						            <td>
							            <canvas id='mini-map'></canvas>
						            </td>

						            <td>

						                <center><h2 id='title'>&lsaquo;Demi God&sect;&rsaquo;</h2> </center>

						            </td>
					            </tr>

				            </table>

			            </td>
					</tr>
				</table>

			</td>


  
		</tr>

	</table>




"; 

 

 
 
$content_ .= "
<div id='skillsDialog' class='dialog_window'>

<table class='layout-table skillsDialog2'>

<tr><td>

<div id='skillsDialog2'></div>

</td></tr>

</table>

</div>
"; 

$content_ .= "

<div id='saveMsg'>
</div>

";

$content_ .= "

<div id='shopDialog'></div>

";




$content_ .= "</div></body>";

$content_ .= "</html>";



echo $content_;

}

?>