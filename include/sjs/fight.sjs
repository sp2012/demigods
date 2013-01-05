
// The actual moves of the opponent + taking into consideration the windows.Protection of the gamer
function fight2()
{
    //Only run fight2() if fight hasn't finished.
    if(window.Fight == 1)
    {
        //The if window.Fight == 0 return; is done so that if checkfight ends the fight and fight2() is on hold, it won't continue running the block.
        hold(Math.random * 20);	if(window.Fight == 0) { return; }

/* Inform gamer that it is the opponent's turn, so he will know that he cannot do a move */
$('#messages').append('It is the opponent turn.<br />');
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


// Opponent regeneration cannot be done in extra attacks.

$('#messages').append('You deduce that opponent health is around: ' + window.EnemyHealth + '.<br />');
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

hold(Math.random * 20);	if(window.Fight == 0) { return; }

// Enemy Regeneration
window.EnemyHealth = window.EnemyHealth + window.EnemyRegenPoints;


$('#messages').append('Opponent regenerated : ' + window.EnemyRegenPoints + ' health.<br />');
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

hold(Math.random * 20);	if(window.Fight == 0) { return; }

// Calculate initial total armor.

        window.Armor = window.NonNaturalArmory;

// Vampire Undead Natural Armory bonus
        if(window.VampNaturalArmorBonus == true)
        {

            window.Armor  = window.Armor + Math.ceil ( (15/100) * window.Armor  );


        }

        if(window.CharIsUndead == true)
        {

            window.Armor  = window.Armor + Math.ceil ( (25/100) * window.Armor  );


        }


        // Ancient Undead which is undead + Zombie Hybrid or Vampire.
        if( (window.CharIsUndead == true || lifestate == 'undead ghost') && ( heritage == 'zombie hybrid' || heritage == 'lich hybrid'  || race == 'vampire') )
        {

            window.Armor  = window.Armor + Math.ceil ( (10/100) * window.Armor );

        }


        if(window.Shapeshifted == true)
        {

            window.Armor = window.Armor + window.Shapeshifting;

        }


        if(window.Misted == true)
        {

            window.Armor = window.Armor + Math.ceil ( (15/100) * window.Armor);

        }

        if(typeof window.ArmorBionic !== 'undefined')
        {

            window.Armor = window.Armor + ( window.ArmorBionic * 2);

        }


        //Tougher natural armory.
        if(window.MartialTougherNaturalArmory == true)
        {

            window.Armor = window.Armor + Math.ceil( window.Armor * (25/100) ) ;

        }


for (i=0; i<window.EnemyNumberAttacks; i++) // This loop is used to implement the attacks of the opponents.
{


if(i >= 1 ) // Show extra attack in messages window, only if opponent has more than 1 attacks.
	{

		$('#messages').append( 'Opponent is about to do an extra attack number ' + i + '.<br />');
		$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

        hold(Math.random * 20);	if(window.Fight == 0) { return; }
	}


// Enemy random moves

var randomEnemy = randomToN(3);




//code protection of opponent in vampirebit

var msg = ""; // Initialize to "", to do checks later.

var protectionTotal = window.Protection;

// Nightstalker assasin protection bonus.

if(window.CharIsNightStalker == true)
    {

        protectionTotal = protectionTotal + Math.ceil( (20/100) * window.Protection);

    }


if(window.Shapeshifted == true)
    {
        var shapeTemp = window.Shapeshifting;

        // Put limits to bonus window.Shapeshifting can give to Protection.
        if(window.Shapeshifting > 10)
            {
                shapeTemp = 10;
            }

        protectionTotal = protectionTotal + shapeTemp;



    }

if(typeof window.TougherBodyParts !== 'undefined')
    {

        var tougherBodyTemp = window.TougherBodyParts;

        if(window.TougherBodyParts > 10)
            {

                tougherBodyTemp = 10;

            }

        protectionTotal = protectionTotal + tougherBodyTemp;


    }


if(window.Inved == true)
    {

        protectionTotal = 100;

    }

var enemyArmor = window.EnemyArmor;


if(window.MartialPress == true)
    {

        enemyArmor = enemyArmor - Math.ceil ( enemyArmor * (30/100) );

    }

if(Math.random() <= ( protectionTotal/100 ) )  // E.g if window.Protection is 1, we divide by 100 to get 1% or 0.01.
{

var msg = 'You avoided the opponent attack.<br/ >';

    hold(Math.random * 20);	if(window.Fight == 0) { return; }
}

else

{

hold(Math.random * 20);	if(window.Fight == 0) { return; }

if(randomEnemy == 0 ) // 0 is melee attack.

{

hold(Math.random * 20);	if(window.Fight == 0) { return; }

var totalEnemyDamage = 0;

totalEnemyDamage = window.EnemyStrength - window.Armor;

if(totalEnemyDamage < 0 ) { totalEnemyDamage = 0;}  // so that no negative damage will show.

if(totalEnemyDamage >= 0)      // because if negative  - (- 5) is +5, so it would increase character life
{
window.Health = window.Health   - totalEnemyDamage;
}

//window.Health = window.Health - window.EnemyStrength;

var msg = 'Opponent hit you with a melee attack for: ' + totalEnemyDamage + ' damage.<br/ >';


// CounterStrike uses Strength, to give motivation to the player to increase Strength.
if(window.CounterStrike == true)
    {

        if( window.CharIsPhysicallytrained == true )
        {

            enemyArmor = enemyArmor - Math.ceil ( enemyArmor * (10/100) );

        }



        var totalDamage = window.Strength - enemyArmor;
        window.EnemyHealth = window.EnemyHealth - totalDamage;

        $('#messages').append('You Counter Striked for ' + totalDamage + ' damage.<br />');
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    }


}

if(randomEnemy == 1 ) // 1 is magic attack.

{

hold(Math.random * 20);	if(window.Fight == 0) { return; }

var totalEnemyDamage = 0;

totalEnemyDamage = window.EnemyMagicPower - window.Armor;

if(totalEnemyDamage < 0 ) { totalEnemyDamage = 0;}  // so that no negative damage will show.

if(totalEnemyDamage >= 0)      // because if negative  - (- 5) is +5, so it would increase character life
{
window.Health = window.Health   - totalEnemyDamage;
}

var msg = 'Opponent hit you with a magick attack for: ' + totalEnemyDamage + ' damage.<br/ >';




}


    if(randomEnemy == 3 ) // 3 is weapon attack.

    {

        hold(Math.random * 20);if(window.Fight == 0) { return; }

        var totalEnemyDamage = 0;



        totalEnemyDamage = Math.ceil( (1.5 * window.EnemyStrength) ); // Weapon attack has an 1.5 bonus to EnemyStrength.

        if(window.CharIsUndead == true)
        {

            totalEnemyDamage = totalEnemyDamage + Math.ceil ( (50/100) * totalEnemyDamage );

        }

        totalEnemyDamage = totalEnemyDamage - window.Armor;

        if(totalEnemyDamage < 0 ) { totalEnemyDamage = 0;}  // so that no negative damage will show.

        if(totalEnemyDamage >= 0)      // because if negative  - (- 5) is +5, so it would increase character life
        {
        window.Health = window.Health - totalEnemyDamage;
        }

        var msg = 'Opponent hit you with a enhanced weapon attack for: ' + totalEnemyDamage + ' damage.<br/ >';

        if(window.CharIsUndead == true )
            {

                msg = "You take more damage from weapons because you are a full blown Undead. " + msg;

            }


// CounterStrike uses Strength, to give motivation to the player to increase Strength.
        if(window.CounterStrike == true)
        {
            var totalDamage = window.Strength - enemyArmor;
            window.EnemyHealth = window.EnemyHealth - totalDamage;

            $('#messages').append('You Counter Striked for ' + totalDamage + ' damage.<br />');
            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

        }
    }


}

if(msg != "")
{
	$('#messages').append( msg);
	$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    hold(Math.random * 20);	if(window.Fight == 0) { return; }
}

var msg = ""; // Initialize to "", to do checks later. and so, that i won't show twice in messages.

if(randomEnemy == 2 ) // 2 is healing spell.

{

window.EnemyHealth = window.EnemyHealth  + window.EnemyHealingPower;

var msg = 'Opponent healed himself with a magick spell for: ' + window.EnemyHealingPower + ' health.<br/ >';

hold(Math.random * 20);	if(window.Fight == 0) { return; }

}

if(msg != "")
{
	$('#messages').append( msg);
	$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    hold(Math.random * 20);	if(window.Fight == 0) { return; }
}




} // End of loop.



var randomOpponentMove = randomToN(window.EnemyMovesSpeed) + 1000; /* randomToN may return 0, so we add 1 second to that. */

/* We make sure an opponent move will be at least 3 seconds, so that the gamer will have time to click on a move to play his turn */
if (randomOpponentMove <= 3000) {   randomOpponentMove = 3000;   }

// Implementation of arcane magician Slow spell.


if(window.Slow == true)
    {

        randomOpponentMove = randomOpponentMove + 2000;


    }

hold(Math.random * 20);	if(window.Fight == 0) { return; }


/* If check death function already run and gamer or opponent died and then fight2() was scheduled to run next and fight is over (0), fight2() stops running. */


window.FightInterval = setTimeout( function(){ spawn fight2(); },randomOpponentMove);

$('#messages').append( 'It is your turn, fight!<br />');
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    /* You increase upper limit here, so that if chechfordeath runs and fights ends and fight2() runs, you don't won't to increment the counter without a fight taking place.
     That would kill the gamer without fight.
    */

    window.UpperLimitFightDuration++; // If neither opponent wins at round 200, gamer loses.

    if(window.UpperLimitFightDuration == 200)
    {

        window.Health = 0;

        /* Reset so fights will continue to occur and the limit will still apply. */

        window.UpperLimitFightDuration = 0;

    }




}



}
