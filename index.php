<?php

$content_ = "";

$content_ .= "<!DOCTYPE html>";

$content_ .= "<html>";

$content_ .= "<head>";

$content_ .= "<meta charset='utf-8'>";

$content_ .= "<title>";

$content_ .= "Demi Gods";

$content_ .= "</title>";


$content_ .= "

<script type='text/javascript'>

function showHeritages()
    {

        window.open ('include/descriptions/heritages.php', 'Heritages');

    }


function showSpecialties()
    {

        window.open ('include/descriptions/specialties.php', 'Specialties');

    }

function showLifestate()
	{

		window.open ('include/descriptions/lifeState.php','Life State');

	}

function showRaces()
	{
		window.open ('include/descriptions/races.php','Races');
	}

function showClasses1()
	{
		window.open ('include/descriptions/classes1.php','First Classes');
	}

function showClasses2()
	{
		window.open ('include/descriptions/classes2.php','Second Classes');
	}

function showStandardSkills()
	{
		window.open ('include/descriptions/standardSkills.php','Standard Skills');
	}

function showBaseStatistics()
	{
		window.open ('include/descriptions/baseStatistics.php','Base Statistics');
	}	
	
function showSummon()
    {
        window.open ('include/descriptions/creatures.php','Ally Creatures');
    }

function showMounts()
    {

        window.open ('include/descriptions/spirits.php', 'Mounts');

    }
	
</script>

";

$content_ .= "</head>";

$content_ .= "<body>";

$content_ .= "<form method='post' action='game.php'>";


$content_ .= "<b>Choose Heritage - Special Gifts:</b>";


$content_ .= "<br/><br/>";

$content_ .= "
<input type='radio' name='heritage' value='Spirit Handler'  checked />Spirit Handler <br />
<input type='radio' name='heritage' value='Earth Golem Hybrid'   />Earth Golem Hybrid <br />
<input type='radio' name='heritage' value='Devil Pact Apostate'   />Devil Pact Apostate<br />
<input type='radio' name='heritage' value='Doomed'   />Doomed <br />
<input type='radio' name='heritage' value='Gifted'   />Gifted <br />
<input type='radio' name='heritage' value='Nightstalker Assassin' />Nightstalker Assassin<br/>
<input type='radio' name='heritage' value='Zombie Hybrid' />Zombie Hybrid<br/>
<input type='radio' name='heritage' value='Lich Hybrid' />Lich Hybrid<br/>
<input type='radio' name='heritage' value= 'Draconian Hybrid' />Draconian Hybrid<br/>
";

$content_ .= "<a href='javascript:showHeritages()'>Description Of Heritages</a><br /><br /> ";


$content_ .= "<b>Choose Specialty:</b>";


$content_ .= "<br/><br/>";

$content_ .= "
<input type='radio' name='specialty' value='Physically Trained' checked />Physically Trained <br />
<input type='radio' name='specialty' value='Magically Trained' />Magically Trained <br />
<input type='radio' name='specialty' value='Double Trained' />Double Trained <br />
";

$content_ .= "<a href='javascript:showSpecialties()' >Description Of Specialties</a><br /><br />";

$content_ .= "<b>Choose Living State:</b>";


$content_ .= "<br/><br/>";

$content_ .= "
<input type='radio' name='lifestate' value='Living' checked />Living <br />
<input type='radio' name='lifestate' value='Undead' />Undead <br />
<input type='radio' name='lifestate' value='Undead Ghost' />Undead Ghost<br />
";

$content_ .= "<a href='javascript:showLifestate()' >Description Of Life State</a><br /><br />";


$content_ .= "<b>Choose Race:</b>";

$content_ .= "<br/><br/>";


$content_ .="
<input type='radio' name='race' value='Vampire' checked />Vampire <br />
<input type='radio' name='race' value='Werewolf' />Werewolf <br />
<input type='radio' name='race' value='Angel' />Angel<br />
<input type='radio' name='race' value='Demon' />Demon<br />
<input type='radio' name='race' value='Mutant' />Mutant<br /> 
<input type='radio' name='race' value='Deity' />Deity<br />

";




$content_ .= "<a href='javascript:showRaces()'>Description Of Races</a><br /><br /> ";


$content_ .= "<b>Choose First Class:</b>";

$content_ .= "<br/><br/>";

$content_ .="
<input type='radio' name='first-class' value='Shapeshifter - Summoner' checked />Shapeshifter - Summoner <br />
<input type='radio' name='first-class' value='Martial Artist' />Martial Artist <br />
<input type='radio' name='first-class' value='Rogue' />Rogue <br />
<input type='radio' name='first-class' value='Warlock' />Warlock<br />
<input type='radio' name='first-class' value='Warrior Priest' />Warrior Priest<br />
<input type='radio' name='first-class' value='Demonic Priest' />Demonic Priest<br />
";

$content_ .= " <a href='javascript:showClasses1()'>Description Of First Classes</a><br /> <br /> ";



$content_ .= "<b>Choose Second Class:</b>";

$content_ .= "<br/><br/>";

$content_ .="
<input type='radio' name='second-class' value='Alien Technologist' checked />Arcane Technologist <br />
<input type='radio' name='second-class' value='Arcane Magickian' />Arcane Magickian <br />

";

$content_ .= " <a href='javascript:showClasses2()'>Description Of Second Classes</a><br /> <br />";


$content_ .= "<b>Choose Ally Creature To Command (if it dies, you cannot use its spells, unless you revive it):</b>";

$content_ .= "<br/><br/>";

$content_ .= "
<input type='radio' name='ally' value='ghoul' checked />Ghoul <br/>
<input type='radio' name='ally' value='griffon' />Griffon <br/>
<input type='radio' name='ally' value='dryad' />Dryad <br/>
<input type='radio' name='ally' value='hellhound' />Hellhound <br/>
";

$content_ .= " <a href='javascript:showSummon()'>Description Of Creatures</a><br /> <br />";


$content_ .= "<b>Choose A Spirit (if it dies, you cannot use its spells, unless you revive it):</b>";

$content_ .= "<br/><br/>";

$content_ .= "
<input type='radio' name='spirit' value='no-spirit' checked/>No Spirit <br/>
<input type='radio' name='spirit' value='nightmare' />Nightmare <br/>
<input type='radio' name='spirit' value='unicorn' />Unicorn <br/>
<input type='radio' name='spirit' value='wyvern' />Wyvern <br/>
";

$content_ .= " <a href='javascript:showMounts()'>Description Of Spirits</a><br /> <br />";

$content_ .= "<b>Standard Skills:</b>";

$content_ .= "<br/>";


$content_ .= " <a href='javascript:showStandardSkills()'>Description Of Standard Skills</a><br /> <br/>";


$content_ .= "<b>Base Statistics:</b>";

$content_ .= "<br/>";


$content_ .= " <a href='javascript:showBaseStatistics()'>Information For Base Statistics</a><br /> ";


$content_ .= "<p>Best viewed in Firefox, Chrome and Opera browsers in full screen.";


$content_ .= "<p>";

$content_ .= "Note: 1. Some skills have a maximum skill points they can have.<br/ >";

$content_ .= "2. Every skill or spell in game has varied amount of seconds for cooldown.<br />";

$content_ .= "3. You only have 3 runes slots.<br />";

$content_ .= "4. Runes, provide various bonuses for the duration of a battle,<br />";

$content_ .= "  they can be used only once per fight, so they don't have cooldown and and they don't cost mana.<br/>";

$content_ .= "  Depending on the bonuses they offer, their price varies.<br/ >";

$content_ .= "5. Special Clothing absorves damage. There are three pieces you can buy. An underwear set,a full suit and a cape. Three upgrades for knuckle dusters are also available for selling.<br />";

$content_ .= "6. Every time you collect skill points you can spend them to skills. You will have to go to a higher level zone to get a greater number of skill points,<br /> ";

$content_ .= "  as lower level zones will not provide many skill points (Energy Currency, the currency of the game, obtained by killing opponents is always the same).<br/>";

$content_ .= "7. You can redistribute your skill points among your skills at any time. <br/ >";

$content_ .= "8. Over time effects last for varied amount of seconds.<br />";

$content_ .= "9. Strength is translated in the game as physical damage done to the opponent. Spells are not affected by Strength. <br />";

$content_ .= "10. If you die, there is a chance that you body was mutulated so much, that health regeneration will take a while to regerate your health to the point where you will <br />";

$content_ .=  "be able to fight again, without instantly getting killed.<br />";

$content_ .= "11. Unarmed Attacks use Strength. In addition, they may use other skills too; it depends on the move if it uses other skills too.<br />";

$content_ .= "Weapon attacks don not use Strength, they use Weapons Combat instead. They also use Advanved Weapons Combat skill, if you have it. <br />";

$content_ .= "12. Magic spells have a significantly shorter cooldown than melee/weapon attacks or abilities.";

$content_ .= "</p>";


$content_ .= "<input type='submit' name='create-char' value='Create Character' />";

$content_ .= "</form>";

$content_ .= "<p>";

$content_ .= "Copyright 2012 Solon Papageorgiou.";

$content_ .= "</p>";

$content_ .= "</body>";

$content_ .= "</html>";

echo $content_;



?>