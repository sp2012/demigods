// Vampire Moves functions and other functions




					

function vampStrengthBonusAndWeeknessInterval()
{

 var hr = ( new Date() ).getHours();

  
 if(hr >= 17 || hr <= 5) // hr is 0 to 23.
 {
	window.StrengthBonusVamp = 2; // 100% Bonus, it's night. Multiply time 2 for strength total.
	
	
	if(window.VampStrengthBonusCheck != false)
	{
	
	$('#messages').append('It is dark outside, your body adjusted and got the 100% strength bonus.<br />');
	$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
	
	}
	
	window.VampStrengthBonusCheck = false;
	
 }
 else
 {
	window.StrengthBonusVamp = 1; // No bonus, it's day.

	if(window.VampStrengthBonusCheck != true)
	{
	
	$('#messages').append('It is still daylight, you do not get the 100% strength bonus.<br />');
	$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
	
	}
	
	window.VampStrengthBonusCheck = true;
	
	// It's day, so the vampire takes damage.
	
	if( window.Health > ( window.HealthMax * (2 / 3) ) )  // Only if health is more than 2 third of max Health, daily damage is received. That is done, so that the vampire will not lose all his health because of light.
	{
	
		window.Health = window.Health  - Math.ceil(window.Health * window.VampDayDamage) + window.DayResist;  // We round to get an integer, that will make developing of game easier.
	
		$("#healthBarBox").attr("value", window.Health);
	
		$('#messages').append('It is still daylight, you take damage.<br />');
		$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
	
	}
 }

    setTimeout( function(){ vampStrengthBonusAndWeeknessInterval() },5000);
}

function showVampUndeadBonus()
{

    $('#messages').append( 'As an Undead Vampire you get some natural armor bonus.<br />');
    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    $('#messages').append( 'As an Vampire you get +1 Strength for each kill up to 20 extra points.<br />');
    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

}


function reverseMistForm()
{

    window.Misted = false;


}

function reverseInv()
{

    window.Inved = false;

}

function reverseFly()
{

    window.VampireFly = false;


}