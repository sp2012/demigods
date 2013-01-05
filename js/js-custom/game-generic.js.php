// Generic functions regardless race, class or standard skills




function scrollBg(){

    //Go to next pixel row.
    current -= step;

    //If at the end of the image, then go to the top.
    if (current == restartPosition){
        current = 0;
    }

    //Set the CSS of the div.
    $('#mainDiv').css('background-position','0'+current+'px');

    setTimeout('scrollBg()', scrollSpeed);
}


//function to get random number from 1 to n
function randomToN(maxVal,floatVal)
{
   var randVal = Math.random()*maxVal;
   return typeof floatVal=='undefined'?Math.round(randVal):randVal.toFixed(floatVal);
}


function changeSkills(change, skillVariable, inputid)
{





            if( window[skillVariable] > 0)  // so that gamers cannot drop a skill below zero.
            {


            if(change == '-')
                {

                    window[skillVariable] = window[skillVariable] - 1;

                    window.SkillPoints = window.SkillPoints + 1;


                }

            }



    if(window.SkillPoints > 0) // I need at least a skill point.
           {
            if( window[skillVariable] >= 0)  // 0 is ok here too.
            {

                if(change == '+')
                {


                            if( skillVariable == 'VampBite')
                                {


                                    if( (window.VampBite + 1) > window.Strength )
                                        {

                                            alert("You cannot have more skill points in Vampire Bite than Strength.");
                                            return;

                                        }

                                }

                            if(skillVariable == 'Fly')
                                {


                                    if( (window.Fly + 1) > 10 )
                                    {

                                        alert("You cannot have more than 10 skill points in Fly.");
                                        return;

                                    }


                                }



                    if(skillVariable == 'Protection')
                    {


                        if( (window.Protection + 1) > 10 )
                        {

                            alert("You cannot have more than 10 skill points in this skill.");
                            return;

                        }


                    }




                    window[skillVariable] = window[skillVariable] + 1;

                    window.SkillPoints = window.SkillPoints - 1;


                }


            }





        }


    $('#'+ inputid + "").val(window[skillVariable])
    $('#skillPointsContainerBox').val(window.SkillPoints );
}

function healthRegenInterval()
{


         if( window.Health <= window.HealthMax)  /* This ensures that you will not regenerate more health than your maximum health points. */
         {

              var healthRegenTotal = window.HealthRegen;

            // Healer Bonus.

             if(window.CharIsSpirithandler == true)
             {

                 healthRegenTotal = healthRegenTotal + Math.ceil( (10/100) *  window.HealthRegen);

             }


            if(typeof window.MedRegen !== 'undefined')
                {

                    healthRegenTotal = healthRegenTotal + Math.ceil( 1.05 * window.MedRegen);

                }

            window.Health = window.Health + healthRegenTotal ;

            $('#messages').append('You regenerated ' + healthRegenTotal + ' health.<br />');
            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

            $("#healthBarBox").attr("value", window.Health);


         }

    setTimeout( function(){ healthRegenInterval() },10000);

}


function manaRegenInterval()
{


    if( window.Mana <= window.ManaMax)  /* This ensures that you will not regenerate more health than your maximum health points. */
    {

        window.Mana = window.Mana + window.ManaRegen;

        $('#messages').append('You regenerated ' + window.ManaRegen + ' mana.<br />');
        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

        $("#manaBarBox").attr("value", window.Mana);


    }

    setTimeout( function(){ manaRegenInterval() },10000);

}


// Generic game engine functions

function buySkillPoint()
    {

        if(window.EnergyCurrency >= 100) // Skill point cost is 100 Energy Currency Points.
            {

                window.EnergyCurrency = window.EnergyCurrency - 100;

                window.SkillPoints =window.SkillPoints + 1;

                $('#skillPointsContainerBox').val(window.SkillPoints );

                $('#energyCurrencyContainerBox').val(window.EnergyCurrency);

            }

    }


function buyHealthPoition()
{

    if(window.EnergyCurrency >= 50) // Health Potion cost is 50 Energy Currency Points.
        {
               if(window.Health <= window.HealthMax)
                    {
                        window.EnergyCurrency = window.EnergyCurrency - 50;

                        // Player has below 0 health, that could be like -500, so set it to 0, then give health, so he can play.
                        if(window.Health < 0) {  window.Health = 0; }

                        window.Health = window.Health + Math.ceil( (50/100) * window.HealthMax );

                        $("#healthBarBox").attr("value", window.Health);

                        $('#energyCurrencyContainerBox').val(window.EnergyCurrency);
                    }
                else
                    {

                        $('#messages').append('You are full of Health.<br />');
                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                    }
        }

}



function showSkillsDialog()
{

window.FightLock = true; // Lock fight so that user cannot run the stage.

window.MapLock = true;
/* Set heritage, race, first and second class skills value in skillsDialog2. */

if( race =='vampire')
    {

        $('#vampBiteSkillBox').val(window.VampBite );

        $('#vampFangsSkillBox').val(window.NaturalWeaponryFangs);

        $('#flySkillBox').val(window.Fly);

        $('#dayResistSkillBox').val(window.DayResist);


    }

if( race == 'demon')
    {

        $('#telekinisisSkillBox').val(window.Telekinisis);

    }


if( race == "deity")
    {


        $('#infernoSkillBox').val(window.Inferno);


    }

if(fClass == 'shapeshifter-summoner' )
    {


        $('#summonEctoplasmSkillBox').val(window.SummonEctoplasm);

        $('#shapeshiftingSkillBox'). val(window.Shapeshifting);

        $('#titanStrSkillBox').val(window.TitanStr);


        $('#sumAllyStrSkillBox').val(window.SumAllyStr);

        $('#phoenixClawsSkillBox').val(window.PhoenixClaws);

        $('#phoenixBreathSkillBox').val(window.PhoenixBreath);

        $('#phoenixHealthSkillBox').val(window.PhoenixHealthMax);

        $('#healPhoenixSkillBox').val(window.HealPhoenix);



    }

if(fClass == 'martial artist')
    {

        $('#unarmedCombatSkillBox').val(window.UnarmedCombat);

        $('#tougherBodyPartsSkillBox').val(window.TougherBodyParts);

        $('#medRegenSkillBox').val(window.MedRegen);

    }

    if (sClass == 'alien technologist')
    {

        $('#unarmedGenericBionicSkillBox').val(window.UnarmedGenericBionic);

        $('#armorBionicSkillBox').val(window.ArmorBionic);

        $('#strBionicSkillBox').val(window.StrBionic);

        $('#healthRegenSkillBox').val(window.HealthRegen);

        $('#nanoSkillBox').val(window.NanoStr);


    }

if(sClass == 'arcane magickian' )
    {

        $('#eyeLaserBoltSkillBox').val(window.EyeLaserBolt);

        $('#manaRegenSkillBox').val(window.ManaRegen);

        $('#arcaneStrSkillBox').val(window.ArcaneStr);

        $('#gaiaBlessSkillBox').val(window.GaiaBless);
    }

    /* Set standard skills value in skillsDialog2. */

    $('#strengthSkillBox').val(window.Strength );

    $('#accuracySkillBox').val(window.Accuracy);

    $('#healthSkillBox').val(window.HealthMax);

    $('#manaSkillBox').val(window.ManaMax);

    $('#protectionSkillBox').val(window.Protection);

    $('#escapeSkillBox').val(window.Escape);

    $('#nonNaturalArmorySkillBox').val(window.NonNaturalArmory);

    $('#runesSkillBox').val(window.RunesMagick);

    $('#energyAbsorptionSkillBox').val(window.EnergyAbsorption);


$("#skillsDialog").dialog('open');


}


function hideSkillsDialog()
{

window.FightLock = false; // Unlock fight (unlock stage). Now the gamer can select the level.

window.MapLock = false;

$("#skillsDialog").dialog('close');

canvas.focus();



}


function saveMsg()
{

$("#saveMsg").dialog('open');



}

function closeSaveMsg()
{

$("#saveMsg").dialog('close');

canvas.focus();

}



function openShop()
{

    $("#shopDialog").dialog('open');

}

function closeShop()
{

    $("#shopDialog").dialog('close');

    canvas.focus();

}

		