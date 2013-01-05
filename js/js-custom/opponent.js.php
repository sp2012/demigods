// Enemy object/functions

function opponent(health, strength, protection, magicPower, healingPower, regenPoints, movesSpeed, numberAttacks, enemyArmor)
{

// Higher Level Enemies will be given higher arguments in the function
// magicPower will determine how much damage the opponent will do with spells
// Once the fight has started, the enemy will attack every five seconds, 
// a randomizer will determine if the opponent will use a strength attack, an offensive magic or a healing magic.

window.EnemyHealth = health;
window.EnemyStrength = strength;
window.EnemyProtection = protection;
window.EnemyMagicPower = magicPower;
window.EnemyHealingPower = healingPower;
window.EnemyRegenPoints = regenPoints;

window.EnemyMovesSpeed = movesSpeed; // Moves speed is in seconds, in that every 1000 is one second.

window.EnemyNumberAttacks  = numberAttacks // The number of attacks an opponent has.

window.EnemyArmor = enemyArmor;

}					


// Builds opponent based on his stage.

function buildOpponent(stage)
{


var opponentTemp = new Array();

if(stage == 1)  { return new opponent(15,4,2,4,3,1,9000,1,1); }
if(stage == 2)  { return new opponent(100,20,20,18,10,5,9000,1,10); }
if(stage == 3)  { return new opponent(17,2,2,2,4,1,9000,1,1); }
if(stage == 4)  { return new opponent(18,2,2,2,4,1,9000,1,1); }
if(stage == 5)  { return new opponent(19,2,50,2,5,1,9000,1,1); }
if(stage == 6)  { return new opponent(20,2,2,2,5,1,8000,2,1); }
if(stage == 7)  { return new opponent(21,2,2,2,5,1,8000,2,1); }
if(stage == 8)  { return new opponent(22,2,2,2,5,1,8000,2,1); }
if(stage == 9)  { return new opponent(23,2,2,2,5,1,8000,2,1); }
if(stage == 10) { return new opponent(24,9,5,2,5,1,4000,3,1); }


return opponentTemp[stage];



}


function anEnemyAttacksInterval()
{

if(window['MapLock'] == false)
{

var mapEnemyLevel = new Array(); // Depending on the map, add a number, so that the aggro opponents will be from the map that the gamer plays, so the gamer won't face very high level enemies that will kill him easily.

mapEnemyLevel[1] = 0; // This means that for map 1, don't add a number to match the level of the enemies of map 1.



var randomEnemyStage = randomToN(9) + 1 + mapEnemyLevel[window.MapNumber]; // So, far we have 10 monsters, so we pass 9 to the randomizer, but it's returned values start at 0 and end to 9, we add 1 to access the monsterskilled array properly.

 if( window.MonstersKilled[randomEnemyStage] == false) // If gamer hasn't killed the monster yet he can fight him
    {

        window.autoEnemyFightFinished = false;

        window['MapLock'] = true;

        $('#messages').append('A stage ' + randomEnemyStage + ' opponent escaped from a portal and attacked you.<br />');
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

        fight(randomEnemyStage);

    }

    else
    /* we reschedule auto enemy, because monster is dead and */
    /* so auto opponent doesn't fight and cannot reschedule himself, also window.autoEnemyFinished remains true */
    /* and a selected opponent cannon reschedule the auto opponent to run again. */
        {

            window.AutoEnemyAttacksInterval = setTimeout( function(){ anEnemyAttacksInterval() }, 60000);

        }

}


else if(window['MapLock'] == true)
/* we reschedule auto enemy, because window.MapLock is true (the fight is currently locked and is not allowed for auto opponents) */
    /* so auto opponent doesn't fight and cannot reschedule himself, also window.autoEnemyFinished remains true */
    /* and a selected opponent cannon reschedule the auto opponent to run again. */
    {

        window.AutoEnemyAttacksInterval = setTimeout( function(){ anEnemyAttacksInterval() }, 60000);

    }
}