/* Preload images. */

var images = [
	'images/background.jpg',
	'images/border.png',
	'images/chars.png',
	'images/main.png',
	'images/sprites/fight.jpg',
	'images/tiles/t0.png',
	'images/tiles/t1.png',
	'images/tiles/t2.png',
	'images/tiles/t3.png',
	'images/tiles/t4.png',
	'images/tiles/t5.png',
    'images/tiles/t6.png',
    'images/tiles/t7.png',

    'images/moves/infernoFunLock.png',
    'images/moves/vampBiteFunLock.png',
    'images/moves/vampUnarmedAttackFunLock.png'
];

$(images).each(function() {
	var image = $('<img />').attr('src', this);
});

// Moving background.

var scrollSpeed = 1; 		// Speed in milliseconds
var step = 1; 				// How many pixels to move per step
var current = 0;			// The current pixel row
var imageHeight = 4300;		// Background image height
var headerHeight = 700;		// How tall the header is.

//The pixel row where to start a new loop
var restartPosition = -(imageHeight - headerHeight);


// Utility variables

window.SkillFunctionNumber = 0;

window.UpperLimitFightDuration = 0; // If neither opponent wins at round 200, gamer loses.

window.autoEnemyFightFinished = true; // Only if a fight with an opponent that auto attaks, renew setTimeOut, instead of using a lot of set Intervals ending in the queue. For a fight that the gamer chooses, the setTimeout for autoenemyattack will not happen.

window.FightLock = false; // You should lock a fight once it beguns so that the gamer can not click and thus rerun the stage again.


// Game variables

// Base Statistics Variables	
// global javascript variables start with window.				

// Total Strenght is the damage done
window.QuestAccepted = false;

window.MapNumber = 1; //This is the current map number. For a new games that should be 1. Map and 3D use this to load their correct version.


window.FountainHealth = 0; // Fountain of health restores health max points to health, but only 2 times per map.

// Total armor of character.

window.Armor = 0;


// These are fixed, unless a race or class gives a bonus.

window.HealthRegen = 1;

window.ManaRegen = 1;

// These are current health and mana, window.HealthMax and window.ManaMax are the actually statistics of the gamer.

window.Health               = 10;
					
window.Mana                 = 10;

// This keeps a track of the monsters killed, the games is able to attack higher level monsters one every area (every area has 5 monsters) and if he wins gets a skill points bonus.

window.MonstersKilled = new Array();

window.MonstersKilled[1] = false;
window.MonstersKilled[2] = false;
window.MonstersKilled[3] = false;
window.MonstersKilled[4] = false;
window.MonstersKilled[5] = false;
window.MonstersKilled[6] = false;
window.MonstersKilled[7] = false;
window.MonstersKilled[8] = false;
window.MonstersKilled[9] = false;
window.MonstersKilled[10] = false;



window.Fight                = 0; // 0 is no fight currently, 1 is fight is taking place

window.Level                = 1;


window.SkillPoints          = 0;

window.EnergyCurrency       = 0;

 
window.HealthMax            = 10;
					
window.Strength             = 1;
					
window.ManaMax              = 10;

window.Protection           = 1;					
					
window.Escape         = 20;
					
window.NonNaturalArmory     = 1;

window.RunesMagick          = 1;

window.EnergyAbsorption     = 1;

window.Accuracy             = 70;




$(window).load(function() {

// Generic Intervals



setTimeout( function(){ manaRegenInterval() },10000);

window.AutoEnemyAttacksInterval = setTimeout( function(){ anEnemyAttacksInterval() }, 60000);

// Place default value Messsages in #messages					 


$('#messages').html("Messages:<br/ >");
$('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


var heritageMoves = "";

if(heritage == 'spirit handler')
{

    window.CharIsSpirithandler = true;

}

    var healthRegenTimer = 10000;

    // Healer bonus.
    if(window.CharIsSpirithandler == true)
        {

            healthRegenTimer = 7000;

            $('#messages').append("As a Spirit Handler you regenerate health in every 7 instead of 10 seconds, you regenerate 10% more health and your healing spells are 10% stronger.<br/ >");
            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

        }

    setTimeout( function(){ healthRegenInterval() },healthRegenTimer);


if(heritage =='nightstalker assassin')
{

    window.CharIsNightStalker = true;


    window.Accuracy = window.Accuracy + Math.ceil ( (30/100) * window.Accuracy);

    heritageMoves = "<input type='button' value='Katana' id='katanaButton' />";

    $('#messages').append("As a Night Stalker Assasin you gain +20% to Protection and 30% to Accuracy and you have a Katana that does damage and has a 3% chance to instantly kill your opponent.<br/ >");
    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

}


if ( specialtraining == 'physically trained' )
    {

        window.CharIsPhysicallytrained = true;

        $('#messages').append("As Physically Trained you have 10% armor bypass with physical unarmed attacks or werewolf claws.<br/ >");
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    }


if( specialtraining == 'magically trained')
    {

        window.CharIsMagicallytrained = true;

        $('#messages').append("As Magically Trained your spells cost 20% less mana.<br/ >");
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

    }



if(lifestate == "undead")
{
    setTimeout ( function () { showUndeadBonus(); }, 2000);

    window.CharIsUndead = true;

}


if(race == 'vampire')
{

 setTimeout( function(){ vampStrengthBonusAndWeeknessInterval() },5000);

 setTimeout ( function () { showVampUndeadBonus(); }, 2000);

 window.VampNaturalArmorBonus = true;

 window.PermanentFightStrengthBonus = 0; // Once this goes 20, the vampire doesn't get more permanent Strength points

 window.StrengthBonusVamp = 1; // Starting value. Bonus will be calculated every 5 seconds, to monitor day or night and decide if the vampire strength bonus applies.

 window.VampBite = 1;

 window.NaturalWeaponryFangs = 1;

 window.VampDayDamage = 0.5; // Starting weekness to daylight. Multiply window.Health * windowVampDayDamage and then Math.round() to get an integer.

 window.DayResist = 1;

 window.Fly = 1;

 var raceMoves = "<input type='button' value='Unarmed Attack' id='vampUnarmedButton' />"  +

     "<input type='button' value='Vampiric Bite' id='vampBiteButton' />" +

     "<input type='button' value='Invunerability' id='invButton' />" +

     "<input type='button' value='Mist Form' id='mistButton' />" +

      "<input type='button' value='Fly' id ='flyButton' />";
 
 var raceSkills = 
 
"<button onclick=\"changeSkills('-', 'VampBite', 'vampBiteSkillBox')\">-</button><input type='text' id='vampBiteSkillBox' disabled='disabled' />vampiric bite<button onclick=\"changeSkills('+', 'VampBite', 'vampBiteSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'NaturalWeaponryFangs', 'vampFangsSkillBox')\">-</button><input type='text' id='vampFangsSkillBox' disabled='disabled' />natural weaponry (fangs)<button onclick=\"changeSkills('+', 'NaturalWeaponryFangs', 'vampFangsSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'DayResist', 'dayResistSkillBox')\">-</button><input type='text' id='dayResistSkillBox' disabled='disabled' />daylight resistance<button onclick=\"changeSkills('+', 'DayResist', 'dayResistSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'Fly', 'flySkillBox')\">-</button><input type='text' id='flySkillBox' disabled='disabled' />flying<button onclick=\"changeSkills('+', 'Fly', 'flySkillBox')\">+</button><br />";

 
}

if(race == 'werewolf')
{

var raceMoves = "<button>Unarmed Attack</button>" +

    "<button>Lycanthropy</button>" +

    "<button>Claws Attack</button>" +

    "<button>Impale</button>" +

    "<button>Hemorrhage</button>";

var raceSkills = 

"<button>-</button>Lycanthropy<button>+</button><br />" +

"<button>-</button>natural weaponry (claws), it makes his claws stronger<button>+</button><br />" +

"<button>-</button>natural armory<button>+</button><br />" +

"<button>-</button>Impale instant death (percentage of occuring /5)<button>+</button><br />" +

"<button>-</button>hemorrhage technhique<button>+</button><br />" +

"<button>-</button>infection technique<button>+</button><br />";



}

if(race == 'angel')
{

var raceMoves = "<button>Unarmed Attack</button><button>Wings Attack</button><button>Double Image</button><button>Heavenly Shield</button><button>Teleport</button><button>Ethereal Form</button>";

var raceSkills = 

"<button>-</button>flying evasion<button>+</button><br />" +

"<button>-</button>natural weaponry (wings), it makes his wings stronger<button>+</button><br />" +

"<button>-</button>angelic regeneration (regenerates health and mana points)<button>+</button><br />" +

"<button>-</button>white magick (percentage of double image occuring and percentage * 2 of protect heavenly shield offers)<button>+</button><br />" +

"<button>-</button>teleportation<button>+</button><br />" +

"<button>-</button>angelic mana<button>+</button><br />" +

"<button>-</button>ethereal form<button>+</button><br />";



}

if(race == 'demon')
{

window.Telekinisis = 1;

var raceMoves = "<button>Unarmed Attack</button><button>Disease</button><button>Possession</button><button>Invisibility</button>" +

"<input type='button' value='Telekinisis' id='telekinisisButton' />" +

"<button>Acidic Poison</button><button>Abandon Body</button><button>Tail Technique</button><button>Horns Attack</button>";

var raceSkills = 

"<button>-</button>black magick<button>+</button><br />" +

"<button>-</button>possession<button>+</button><br />" +

"<button>-</button>invisibility (percentage)<button>+</button><br />" +

"<button onclick=\"changeSkills('-', 'Telekinisis', 'telekinisisSkillBox')\">-</button><input type='text' id='telekinisisSkillBox' disabled='disabled' />telekinisis<button onclick=\"changeSkills('+', 'Telekinisis', 'telekinisisSkillBox')\">+</button><br />" +

"<button>-</button>poisons<button>+</button><br />" +

"<button>-</button>abandoning body<button>+</button><br />" +

"<button>-</button>demonic mana<button>+</button><br />" +

"<button>-</button>Tail Technique<button>+</button><br />" +

"<button>-</button>Horns attack<button>+</button><br />";

}

if(race == 'mutant')
{

var raceMoves = "<button>Knuckle Dusters Attack</button><button>Unarmed Second Attack</button><button>Unarmed Third Attack</button><button>Psychic Blast</button><button>Degeneration</button><button>Mana Blast</button>";

var raceSkills = 

"<button>-</button>psionic magick<button>+</button><br />" +

"<button>-</button>Mutant knuckle dusters<button>+</button><br />" +

"<button>-</button>Mutant health<button>+</button><br />" +

"<button>-</button>Mutant mana<button>+</button><br />" +

"<button>-</button>Mutant mana mind shuttering blast<button>+</button><br />";



}

if(race == 'deity')
{

window.Inferno = 1;

window.InfernoBonus = 2;

window.Symbiosis = false;

var raceMoves = "<button>Unarmed Attack</button><button>Black Clouds</button>" +

"<input type='button' value='Merge with Symbiot' id='symbiosisButton' />" +

"<input type='button' value='Inferno' id='infernoButton' />" +

"<input type='button' value='Chaos Spawn Form' id='chaosSpawnButton' />";

var raceSkills =  

"<button>-</button>Black clouds<button>+</button><br />" +

"<button>-</button>Symbiosis<button>+</button><br />" +

"<button onclick=\"changeSkills('-', 'Inferno', 'infernoSkillBox')\">-</button><input type='text' id='infernoSkillBox' disabled='disabled' />Inferno<button onclick=\"changeSkills('+', 'Inferno', 'infernoSkillBox')\">+</button><br />";


}

// First Class

if (fClass == 'shapeshifter-summoner')
{

window.Shapeshifted = false;

window.Shapeshifting = 1;

window.TitanStr = 1;

window.SummonEctoplasm = 1;

window.PhoenixHealthMax = 10;

window.PhoenixHealth = 10;

window.SumAllyStr = 1;

window.PhoenixClaws = 1;

window.PhoenixBreath = 1;

window.HealPhoenix = 1;


var fClassMoves = "<input type='button' value='Shapeshift' id ='shapeButton' />" +

    "<input type='button' value='Summon Phoenix' id='phoenixButton' />" +
    "<input type='button' value='Heal Phoenix' id='healPhoenixButton' />" +
    "<input type='button' value='Summon Thunderbird' id='thunderbirdButton' />" +
    "<input type='button' value='Heal Thunderbird' id='healThunderBirdButton' />" +
    "<input type='button' value='Summon Ectoplasm' id='ectoplasmButton' />";

var fClassSkills = 

"<button onclick=\"changeSkills('-', 'Shapeshifting', 'shapeshiftingSkillBox')\">-</button><input type='text' id='shapeshiftingSkillBox' disabled='disabled' />Shapeshifting<button onclick=\"changeSkills('+', 'Shapeshifting', 'shapeshiftingSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'SumAllyStr', 'sumAllyStrSkillBox')\">-</button><input type='text' id='sumAllyStrSkillBox' disabled='disabled' />summoned ally (Strength Bonus)<button onclick=\"changeSkills('+', 'SumAllyStr', 'sumAllyStrSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'TitanStr', 'titanStrSkillBox')\">-</button><input type='text' id='titanStrSkillBox' disabled='disabled' />Titanic Strength<button onclick=\"changeSkills('+', 'TitanStr', 'titanStrSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'PhoenixClaws', 'phoenixClawsSkillBox')\">-</button><input type='text' id='phoenixClawsSkillBox' disabled='disabled' />Phoenix Claws<button onclick=\"changeSkills('+', 'PhoenixClaws', 'phoenixClawsSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'PhoenixBreath', 'phoenixBreathSkillBox')\">-</button><input type='text' id='phoenixBreathSkillBox' disabled='disabled' />Phoenix Firebreath<button onclick=\"changeSkills('+', 'PhoenixBreath', 'phoenixBreathSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'PhoenixHealthMax', 'phoenixHealthSkillBox')\">-</button><input type='text' id='phoenixHealthSkillBox' disabled='disabled' />Phoenix Health<button onclick=\"changeSkills('+', 'PhoenixHealthMax', 'phoenixHealthSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'HealPhoenix', 'healPhoenixSkillBox')\">-</button><input type='text' id='healPhoenixSkillBox' disabled='disabled' />Heal Phoenix<button onclick=\"changeSkills('+', 'HealPhoenix', 'healPhoenixSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'SummonEctoplasm', 'summonEctoplasmSkillBox')\">-</button><input type='text' id='summonEctoplasmSkillBox' disabled='disabled' />Summon Ectoplasm<button onclick=\"changeSkills('+', 'SummonEctoplasm', 'summonEctoplasmSkillBox')\">+</button><br />";

}

if (fClass == 'martial artist')
{


window.CriticalStrike = (50/100);

window.EnDamage = (20/100);

window.UnarmedCombat = 1;

window.MartialTougherNaturalArmory = true;

window.TougherBodyParts = 1;

window.MedRegen = 1;

var fClassMoves =

"<input type='button' value='Pressure Points Technique' id='pressButton' />" +

"<input type='button' value='Combo Attack' id='comboButton' />" +

"<input type='button' value='Ki Life Strike' id='lifestrikeButton' />" +

"<input type='button' value='Tiger Style' id='tigerButton' />";


var fClassSkills = 

"<button onclick=\"changeSkills('-', 'UnarmedCombat', 'unarmedCombatSkillBox')\" >-</button><input type='text' id='unarmedCombatSkillBox' disabled='disabled' />Unarmed Combat<button onclick=\"changeSkills('+', 'UnarmedCombat', 'unarmedCombatSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'TougherBodyParts', 'tougherBodyPartsSkillBox')\" >-</button><input type='text' id='tougherBodyPartsSkillBox' disabled='disabled' />Tougher Body Parts<button onclick=\"changeSkills('+', 'TougherBodyParts', 'tougherBodyPartsSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'MedRegen', 'medRegenSkillBox')\" >-</button><input type='text' id='medRegenSkillBox' disabled='disabled' />Meditative Regeneration (regens health)<button onclick=\"changeSkills('+', 'MedRegen', 'medRegenSkillBox')\" >+</button><br />";



}

// Second Class

if (sClass == 'alien technologist')
{

window.UnarmedGenericBionic = 1; // It includes attacks with vampire fang, claws wings.

window.ArmorBionic = 1;

window.StrBionic = 1;

window.CounterStrike = true;

window.NanoStr = 1;

var sClassMoves = "<input type='button' value='Release Nanobots' id='nanoButton' />";

var sClassSkills = 

"<button onclick=\"changeSkills('-', 'UnarmedGenericBionic', 'unarmedGenericBionicSkillBox')\" >-</button><input type='text' id='unarmedGenericBionicSkillBox' disabled='disabled' />Generic Bionic Implant for unarmed attacks, vampire bites, wings, claws and horns.<button onclick=\"changeSkills('+', 'UnarmedGenericBionic', 'unarmedGenericBionicSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'ArmorBionic', 'armorBionicSkillBox')\" >-</button><input type='text' id='armorBionicSkillBox' disabled='disabled' />Electromagnetic Field Armor Bionic Implant<button onclick=\"changeSkills('+', 'ArmorBionic', 'armorBionicSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'StrBionic', 'strBionicSkillBox')\" >-</button><input type='text' id='strBionicSkillBox' disabled='disabled' />Strength Bionic Implant<button onclick=\"changeSkills('+', 'StrBionic', 'strBionicSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'HealthRegen', 'healthRegenSkillBox')\" >-</button><input type='text' id='healthRegenSkillBox' disabled='disabled' />Health Regeneration (Implant)<button onclick=\"changeSkills('+', 'HealthRegen', 'healthRegenSkillBox')\" >+</button><br /> " +

 "<button onclick=\"changeSkills('-', 'NanoStr', 'nanoSkillBox')\" >-</button><input type='text' id='nanoSkillBox' disabled='disabled' />Engineered Nanobots strength<button onclick=\"changeSkills('+', 'NanoStr', 'nanoSkillBox')\" >+</button><br />"   ;

}

if (sClass == 'arcane magickian')
{

window.EyeLaserBolt = 1;

window.GaiaBless = 1;

window.ArcaneStr = 1;

var sClassMoves = "<input type='button' value='Gaia Blessing' id='gaiaBlessButton' />" +
    "<input type='button' value='Eyes Laser Bolt' id='eyesLaserBoltButton' />" +
    "<input type='button' value='Slow' id='slowButton' />" +
    "<input type='button' value='Healing Rays' id='rayButton' />";

var sClassSkills = 

"<button onclick=\"changeSkills('-', 'GaiaBless', 'gaiaBlessSkillBox')\" >-</button><input type='text' id='gaiaBlessSkillBox' disabled='disabled' />Gaia's blessing (healing spell)<button onclick=\"changeSkills('+', 'GaiaBless', 'gaiaBlessSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'ArcaneStr', 'arcaneStrSkillBox')\" >-</button><input type='text' id='arcaneStrSkillBox' disabled='disabled' />arcane magick strength (it makes healing, offensive, beneficial and detrimental spells stronger)<button onclick=\"changeSkills('+', 'ArcaneStr', 'arcaneStrSkillBox')\" >+</button><br /><br />" +

"<button onclick=\"changeSkills('-', 'ManaRegen', 'manaRegenSkillBox')\" >-</button><input type='text' id='manaRegenSkillBox' disabled='disabled' />Mana Regeneration<button onclick=\"changeSkills('+', 'ManaRegen', 'manaRegenSkillBox')\" >+</button><br />" +

"<button onclick=\"changeSkills('-', 'EyeLaserBolt', 'eyeLaserBoltSkillBox')\" >-</button><input type='text' id='eyeLaserBoltSkillBox' disabled='disabled' />Eyes Laser Bolt (once per combat, it costs no mana, it reduces health of opponent by 15% and does damage)<button onclick=\"changeSkills('+', 'EyeLaserBolt', 'eyeLaserBoltSkillBox')\">+</button><br />";

}

// Standard Moves

var standardMoves = "<button>Escape</button>" +
    "<button>Rune 1</button>" +
    "<button>Rune 2</button>" +
    "<button>Rune 3</button>";

var standardSkills = 

"<button onclick=\"changeSkills('-', 'HealthMax', 'healthSkillBox')\">-</button><input type='text' id='healthSkillBox' disabled='disabled'/>Health<button onclick=\"changeSkills('+', 'HealthMax', 'healthSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'Strength', 'strengthSkillBox')\">-</button><input type='text' id='strengthSkillBox' disabled='disabled'/>Strength<button onclick=\"changeSkills('+', 'Strength', 'strengthSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'ManaMax', 'manaSkillBox')\">-</button><input type='text' id='manaSkillBox' disabled='disabled'/>Mana<button onclick=\"changeSkills('+', 'ManaMax', 'manaSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'Protection', 'protectionSkillBox')\">-</button><input type='text' id='protectionSkillBox' disabled='disabled'/>Protection (blocking and evasion)<button onclick=\"changeSkills('+', 'Protection', 'protectionSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'Escape', 'escapeSkillBox')\">-</button><input type='text' id='escapeSkillBox' disabled='disabled'/>Escape<button onclick=\"changeSkills('+', 'Escape', 'escapeSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'NonNaturalArmory', 'nonNaturalArmorySkillBox')\">-</button><input type='text' id='nonNaturalArmorySkillBox' disabled='disabled'/>Armor<button onclick=\"changeSkills('+', 'NonNaturalArmory', 'nonNaturalArmorySkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'RunesMagick', 'runesSkillBox')\">-</button><input type='text' id='runesSkillBox' disabled='disabled'/>Runes Magkick<button onclick=\"changeSkills('+', 'RunesMagick', 'runesSkillBox')\">+</button><br />" +

"<button onclick=\"changeSkills('-', 'EnergyAbsorption', 'energyAbsorptionSkillBox')\">-</button><input type='text' id='energyAbsorptionSkillBox' disabled='disabled'/>Energy Absorption<button onclick=\"changeSkills('+', 'EnergyAbsorption', 'energyAbsorptionSkillBox')\">+</button><br />" +

"<input type='text' id='accuracySkillBox' disabled='disabled'/>Accuracy";


if(sClassMoves != "") { sClassMoves += "<hr />"; }


var allMoves = "<div id='moves' class='movesSet' style='visibility:hidden;'>" + heritageMoves + "<hr />" + raceMoves + "<hr />" + fClassMoves + "<hr />" + sClassMoves +  standardMoves + "</div>";
				 
$("#moves").replaceWith(allMoves);


var allSkills = "<div id='skillsDialog2'>" + raceSkills + "<br />" + fClassSkills + "<br />" + sClassSkills +  "<br / >" + standardSkills + "<p><button onclick='hideSkillsDialog()'>Close Skills Set</button></p></div>";

$("#skillsDialog2").replaceWith(allSkills);

$("#skillsDialog").dialog({ autoOpen: false, show: "blind", hide: "explode", width:800, autoResize:true });



$("#skills").replaceWith("<div id='skills' class='movesSet' onclick='showSkillsDialog()'><button>Skills</button></div>");

$("#shopButton").replaceWith("<div id='shopButton' class='movesSet'><button onclick='openShop()'>Shop</button></div>");

$("#saveButton").replaceWith("<div id='saveButton' class='movesSet'><button onclick='saveMsg()'>Save</button></div>");


$("#saveMsg").replaceWith("<div id='saveMsg'>Save is not yet available<br /><button onclick='closeSaveMsg()'>OK</button></div>");
$("#saveMsg").dialog({ autoOpen: false, show: "blind", hide: "explode", width:800, autoResize:true });


$("#shopDialog").replaceWith("<div id='shopDialog'><button onclick='buySkillPoint()'>Buy Skill Point</button><button onclick='buyHealthPoition()'>Buy Health Potion</button><br /><button onclick='closeShop()'>OK</button></div>");
$("#shopDialog").dialog({ autoOpen: false, show: "blind", hide: "explode", width:800, autoResize:true });

$("#levelContainer").replaceWith("<div id='levelContainer'><span class='LHMBar'>Level: </span><input type='text' id='levelContainerBox' size='23' value='0' disabled='disabled'></div>");

$("#mapContainer").replaceWith("<div id='mapContainer'><span class='LHMBar'>Map Number: </span><input type='text' id='mapContainerBox' size='13' value='0' disabled='disabled'></div>");

$("#skillPointsContainer").replaceWith("<div id='skillPointsContainer'><span class='LHMBar'>Skill Points: </span><input type='text' id='skillPointsContainerBox' size='16' value='0' disabled='disabled'></div>");

$("#healthBar").replaceWith("<div id='healthBar'><span class='LHMBar'>Health: </span><input type='text' value='0' id='healthBarBox' disabled='disabled' size='21' /> </div>");

$("#manaBar").replaceWith("<div id='manaBar'><span class='LHMBar'>Mana: </span><input type='text' value='0' id='manaBarBox' disabled='disabled' size='21' /> </div>");

$("#energyCurrencyContainer").replaceWith("<div id='energyCurrencyContainer'><span class='LHMBar'>Energy Currency: </span><input type='text' id='energyCurrencyContainerBox' size='7' value='0' disabled='disabled'></div>");


$('#levelContainerBox').val(window.Level );


$("#mapContainerBox").val(window.MapNumber);


$('#skillPointsContainerBox').val(window.SkillPoints );


$("#healthBarBox").attr("value", window.Health);

//$("#healthBarBox").attr("max", window.HealthMax);


$("#manaBarBox").attr("value", window.Mana);

//$("#manaBarBox").attr("max", window.ManaMax);


$('#energyCurrencyContainerBox').val(window.EnergyCurrency);


if(fClass == 'shapeshifter-summoner')
     {

        $("#phoenixHealthBar").replaceWith("<div id='phoenixHealthBar'><span class='LHMBar'>Phoenix Health: </span><input type='text' value='0' id='phoenixBarBox' disabled='disabled' size='9' /></div>");

        $('#phoenixBarBox').attr("value", window.PhoenixHealth );

        //$('#phoenixBarBox').attr("max", window.PhoenixHealthMax );
     }

/* Showing Heritage, Race, first class and second class on screen. */

$("#showHeritage").replaceWith("<span id='showHeritage'>Heritage: " +  heritage + " </span>");

$("#showSpecialty").replaceWith("<span id='showSpecialty'>Specialty: " + specialtraining + " </span>");

    if( (lifestate == 'undead' || lifestate == 'undead ghost') && ( heritage == 'zombie hybrid' || heritage == 'lich hybrid' || race == 'vampire') )
    {

        var tempAncientText = 'ancient ';


    }
    else
    {

        var tempAncientText = '';

    }

    if( lifestate == 'undead') { var corporealOrNot = ' (corporeal)';  }

    else if( lifestate == 'undead ghost') { var corporealOrNot = ' (incorporeal)';  }

    else
    {

        var corporealOrNot = '';

    }

   var sClassTemp = sClass;

   if(sClassTemp == 'alien technologist') { sClassTemp = 'arcane technologist'; }

$("#showLifestate").replaceWith("<span id='showLifestate'>Living State: " + tempAncientText + lifestate + corporealOrNot + " </span>");

$("#showRace").replaceWith("<span id='showRace'>Race: " + race + " </span>");

$("#showfClass").replaceWith("<span id='showfClass'>1st Class: " + fClass + " </span>");

$("#showsClass").replaceWith("<span id='showsClass'>2nd Class: " + sClassTemp + " </span>");

$("#showAlly").replaceWith("<span id='showAlly'>Ally: " + ally + " </span>");

$("#showSpirit").replaceWith("<span id='showSpirit'>Spirit: " + spirit + " </span>");





    $('#messages').click(function() {
        var w = window.open();

        var html = "<html><head><title>Demi Gods Log</title></head><body>" + $("#messages").html() + "<style>body{ background-color:black; color:white; }</style></body></html>";

        $(w.document.body).html(html);


    });






 //Calls the scrolling function
 setTimeout('scrollBg()', scrollSpeed);





    /* If game window focus is lost, reload game (this is done, because setTimeouts often die if the focus is lost) */
    /*temporarily disable this and see how the game goes with the timers
    $(window).blur(function()
        {
            alert('Game window focus was lost. You changed tabs or switched to another application? Restarting game.');

            history.back(); // Return to character initialisation screen

        });
    */

});



$(function() {
    var ele   = $('#messages');
    var speed = 25, scroll = 5, scrolling;

    $('#scroll-up').mouseenter(function() {
        // Scroll the element up
        scrolling = window.setInterval(function() {
            ele.scrollTop( ele.scrollTop() - scroll );
        }, speed);
    });

    $('#scroll-down').mouseenter(function() {
        // Scroll the element down
        scrolling = window.setInterval(function() {
            ele.scrollTop( ele.scrollTop() + scroll );
        }, speed);
    });

    $('#scroll-up, #scroll-down').bind({
        click: function(e) {
            // Prevent the default click action
            e.preventDefault();
        },
        mouseleave: function() {
            if (scrolling) {
                window.clearInterval(scrolling);
                scrolling = false;
            }
        }
    });
});
					
					


		
		





 		

					
					



