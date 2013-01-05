// Fight functions

function fight(stage)
{

// stage is called for cosmetic reason, in reality is the number of the opponent

	
if(window.FightLock == false)
{

$('#messages').append('You attacked a stage ' + stage + ' opponent.<br />');
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


	
window.FightLock = true; // Lock fight so that user cannot rerun same stage.

		//Fight Starts
		window.Fight = 1;

	
		// Turn Moves visible
		$("#moves").css('visibility', 'visible');
		
		// Turn Visibility off for skills, shop and save button
		$("#skills").css('visibility', 'hidden');
	    $("#shopButton").css('visibility', 'hidden');
		$("#saveButton").css('visibility', 'hidden');

	
		// Build opponent based on his stage

		 buildOpponent(stage);

		$('#messages').append('You deduce that opponent health is around: ' + window.EnemyHealth + '.<br />');
		$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
		 
		 
		window.textLayer = new Kinetic.Layer();

		var complexText = new Kinetic.Text({

		x: 380,

		y: 150,

		stroke: "blue",

		strokeWidth: 5,

		fill: "#ddd",

		text: "Stage " + stage + " opponent.",

		fontSize: 14,

		fontFamily: "Calibri",

		textFill: "#888",

		textStroke: "#444",

		padding: 15,

		align: "center",

		verticalAlign: "middle",
        cornerRadius: 10

		});	 
		 
		window.textLayer.add(complexText);
	
	    
		window.EnemyHealthLayer = new Kinetic.Layer();

		window.complexText = new Kinetic.Text({

		x: 28,

		y: 150,

		stroke: "blue",

		strokeWidth: 5,

		fill: "#ddd",

		text: "Health: " + window.EnemyHealth,

		fontSize: 14,

		fontFamily: "Calibri",

		textFill: "#888",

		textStroke: "#444",

		padding: 15,

		align: "center",

		verticalAlign: "middle",
		
        cornerRadius: 10

		});	 
		 
		window.EnemyHealthLayer.add(window.complexText);

	
			/* add monster image to background */
		 window.imageMonsterLayer = new Kinetic.Layer();
		 
		 var animations = {
          idle: [{
            x: 0,
            y: 0,
            width: 579,
            height: 327
          },
		  {
            x: 579,
            y: 0,
            width: 579,
            height: 327
          },
		  {
            x: 1158,
            y: 0,
            width: 579,
            height: 327
          }]
        };
		 
		 var imageObj = new Image();
        imageObj.onload = function() {
          var image = new Kinetic.Sprite({
            x: 0,
            y: 0,
            image: imageObj,
            width: 579,
            height: 327,
			image: imageObj,
            animation: 'idle',
            animations: animations,
            frameRate: 3
          });

          // add the shape to the layer
          window.imageMonsterLayer.add(image);

          // add the layer to the stage
          window.stage.add(window.imageMonsterLayer);
		  
		  image.start();
		  
		  // add text to the stage
		  window.stage.add(window.textLayer);
		  
		  window.stage.add(window.EnemyHealthLayer);
		  
        };
        imageObj.src = "images/sprites/fight.jpg";
	
	
	    /* Decide who will have a turn to attack first, the gamer or the opponent. In other words, if the gamer will start, he will have enough time to attack.
	    *
	    * If turn time is 1 millisecond, then gamer will not have time to attack, so it is like the opponent starts first.
	    *
	    * */

        var decideWhoStarts = randomToN(1);

        /* 3 seconds till the opponent attacks, gamer has time to attack. */
        if ( decideWhoStarts == 0 ) {  var firstTurnTime = 3000; var whoStartsMsg = 'You managed to get the upper hand and you are able to attack first. Fight!';  }

        /* 1 millisecond till opponent attacks, so it is like he attacks first, gamer cannot click a move so fast */
        if ( decideWhoStarts == 1 ) {   var firstTurnTime = 1; var whoStartsMsg = 'It is the opponent turn, he managed to get the upper hand.'; }

		window.FightInterval = setTimeout( function(){ fight2() }, firstTurnTime);
		
		window.CheckFightDeathInterval = setTimeout( function(){ checkFightDeath(stage) },1);

        $('#messages').append(whoStartsMsg  + '<br />');
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

}		
		
}
					



// This function runs at very fast interval to determine when the gamer or opponent died. So, that, there won't be a chance that the gamer or opponent died, but got health and remained in fight.

function checkFightDeath(stage)
{
    if(window.Health >= 1 && window.EnemyHealth >= 1)
    {
        window.CheckFightDeathInterval = setTimeout( function(){ checkFightDeath(stage) },1);
    }

    // Don not show negative health.
    if(window.Health <= 0)
        {

            window.Health = 0;

        }

// Show current health of gamer

$("#healthBarBox").attr("value", window.Health);

// Update opponent health on screen

		 
window.complexText.setText("Health: " + window.EnemyHealth);

window.EnemyHealthLayer.draw();




if(window.Health <= 0 || window.EnemyHealth <= 0 || (window.Health == 0 && window.EnemyHealth == 0) )
{

clearTimeout(window.FightInterval); // Even if this interval was set already with setTimeInterval, it will never call the function, as it is cleared and killed here.

clearTimeout(window.CheckFightDeathInterval);

clearTimeout(window.PhoenixTimer);
		
		// Turn Moves hidden
		$("#moves").css('visibility', 'hidden');
		
		// Turn Visibility off for skills and save button
		$("#skills").css('visibility', 'visible');
		$("#shopButton").css('visibility', 'visible');
		$("#saveButton").css('visibility', 'visible');		

		if(window.Health <= 0 && window.Fight == 1) // && window.Fight == 1 so that timer won't hit twice and we will have both gamer and opponent as winners
		{
		
				//Fight ends
		        window.Fight = 0;
				
			$('#messages').append('Opponent won.<br />');
			$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
		
		}
		
		if(window.EnemyHealth <= 0 && window.Fight == 1) // && window.Fight == 1 so that timer won't hit twice and we will have both gamer and oppenent as winners
		{
		   		//Fight ends
				window.Fight = 0;
		
			window.MonstersKilled[stage] = true; // This monster has been killed, so it can't be selected for killing it again.

            if(window.Level > stage) { var bonusLevel = 0; }

            if(window.Level <= stage) { var bonusLevel = Math.ceil ( (10/100) * window.Level); } //Bonus at 10% for not getting a lot of bonus skill points.

		    var bonusSkillPoints = stage + bonusLevel; // This is used for storing the bonus experience you receive if you fight higher level monsters.
		
		    window.Level = window.Level + 1; // Increase level by 1; 
		    
			var randomSkillPointsAwarded = randomToN(3); // Skill Karma (skill points) are awared randomly between 0 and 3.
			if (randomSkillPointsAwarded == 0) { randomSkillPointsAwarded = 1; } // Fix, if you get 0 from randomizer function, it is converted to 1.
			
			window.SkillPoints = window.SkillPoints + randomSkillPointsAwarded + bonusSkillPoints;


            // For Vampires permanent Strenght bonus, up to 20, every time he wins a fight.

            if(race == 'vampire' && window.PermanentFightStrengthBonus < 20)
                {

                    window.Strength = window.Strength + 1;

                    $('#strengthSkillBox').val(window.Strength);

                    $('#messages').append('Your strength increased by one.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                }


			$('#levelContainerBox').val(window.Level );
            $('#skillPointsContainerBox').val(window.SkillPoints );
			
			// Energy currency gains
			window.EnergyCurrency = window.EnergyCurrency + randomToN(100);
		
			$('#energyCurrencyContainerBox').val(window.EnergyCurrency);

			$('#messages').append('You won. You killed a stage: ' + stage + ' opponent.<br />');
			$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
		
}


window.stage.remove(window.textLayer);
window.stage.remove(window.EnemyHealthLayer);
window.stage.remove(window.imageMonsterLayer);
		

		
window.FightLock = false; // Fight finished, unlock stage. Now the gamer can select the next level.		

if( window.autoEnemyFightFinished == false)
{

    window.autoEnemyFightFinished = true;

    window.AutoEnemyAttacksInterval = setTimeout( function(){ anEnemyAttacksInterval() }, 60000);
}
// Remove Map Lock from iframe map and 3D world
resetWindowMapLock();

/* Reset once per fight moves now that the fight ended */

window.eyesLaserBoltFunLocktrue  = false;

window.phoenixFunLocktrue = false;

// Fight ended, remove symbiot.
window.Symbiosis = false;


canvas.focus();
}





}