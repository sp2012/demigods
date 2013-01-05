
// Generic function for moves


function skills(

    physicalDirectDamage, // Array for e.g. vampire Bite, natural weaponry, unarmed combat,

    physicalDamageOverTime, // Array for e.g. infection(it will set timeouts until window.Fight == 0)

    moreLessStats, // Array e.g. for shapeshifting, hemorrhage etc

    magicalAttacks, // Array e.g. for Double Image etc

    healingSpells, // For Gaia's blessing

    runes, // Array for runes.

    escape, // Array for e.g. escape, teleportation etc

    numberAttacks, // 1 for all except Deity which is 2, allows Deity to attack twice

    special, // Array for Possession , Combo Attack instant death etc

    funLock,  // Only one click will be served for this action, until the button is unlocked.

    buttonid,

    showButtonDelay, // Delay until showing the button again, after an action has been fired,n normally spells has short delay compared to physical moves.

    moveName,

    oncePerFight, // If move is once per fight only.

    manaCost,  // additional mana cost in percentage of manaMax.

    healthCost, // health cost (like mana, but instead mana, health is used) in percentage of healthMax.

    zeroManaCost  // If set to true then that spell costs 0 mana points.


    )
{

    if ( (typeof window[funLock] === 'undefined') || ( window[funLock] === false ) )
    {  // Prevent fired copies of function to run. Only one copy should run.

        window[funLock] = true;

        $('#' + buttonid + "").hide();

        hold(Math.random * 20);



            if(window.Fight == 1) // Only if window.Fight == 1, i.e. a fight is currently happening (this will prevent you from attacking after the opponent killed you and the buttons wasn't disabled promptly)
            {

                if( window[funLock + oncePerFight] !== true )
                    {

                       // Once per fight move.
                       if( oncePerFight === true)
                       {
                            window[funLock + oncePerFight] = true;

                       }

                        window.SkillFunctionNumber++;

                        window[funLock + 'ImageLayer' + window.SkillFunctionNumber] = new Kinetic.Layer();

                        var imageObj = new Image();
                        imageObj.onload = function() {
                            var image = new Kinetic.Image({
                                x: 0,
                                y: 0,
                                image: imageObj,
                                width: 579,
                                height: 327
                            });

                            // add the shape to the layer
                            window[funLock + 'ImageLayer' +window.SkillFunctionNumber].add(image);

                            // add the layer to the stage
                            window.stage.add(window[funLock + 'ImageLayer' + window.SkillFunctionNumber]);

                            setTimeout(function() { window.stage.remove(window[funLock + 'ImageLayer' + window.SkillFunctionNumber]); } , 500);

                        };
                        imageObj.src = "images/moves/" + funLock + ".png";

                        if (typeof  moreLessStats   !== 'undefined')
                        {
                            var  moreLessTotal = 0;

                            for (x in  moreLessStats)
                            {
                                if( typeof moreLessStats[x] !==  'undefined' )
                                {
                                    moreLessTotal = moreLessTotal +  moreLessStats[x];

                                    hold(Math.random * 20);
                                }

                                hold(Math.random * 20);
                            }

                            $('#messages').append('You did  <i>' + moveName + '</i>.<br />');
                            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                            if(special === 'Mist')
                                {

                                    window.Misted = true;


                                     setTimeout( function() { reverseMistForm(); }, 10000);



                                }

                            if(special === 'Inv')
                            {
                                window.Inved = true;


                                 setTimeout( function() { reverseInv(); }, 10000);


                            }

                            if(special === 'Fly')
                                {
                                    window.VampireFly = true;

                                    setTimeout( function() { reverseFly(); } , 5000);
                                }

                            if(special === 'Ray')
                                {

                                    if(Math.random() <= ( 10/100 ) )
                                        {

                                            window.Health = window.HealthMax;

                                            $('#messages').append('You healed completely with Healing Rays.<br />');
                                            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                        }

                                }

                            if(special === 'Shape')
                                {

                                    window.Shapeshifted = true;

                                    setTimeout(function(){ reverseShape(); }, 10000);

                                }

                            if(special === 'Phoenix')
                                {

                                    setTimeout( function () { phoenixFight() }, 1000);

                                }

                            if(special === 'HealPhoenix')
                                {

                                    if( window.PhoenixHealth < window.PhoenixHealthMax)  /* This ensures that phoenix will not heal more health than your maximum health points. */
                                    {
                                        var totalManaCost = window.HealPhoenix;

                                        if( window.Mana >= totalManaCost )
                                            {

                                                window.PhoenixHealth = window.PhoenixHealth + window.HealPhoenix;

                                                $('#phoenixBarBox').attr("value", window.PhoenixHealth);

                                                window.Mana = window.Mana - window.HealPhoenix;

                                                $('#manaBarBox').attr("value", window.Mana);

                                                $('#messages').append('You spent ' + totalManaCost + ' mana.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                $('#messages').append('You healed Phoenix for ' + window.HealPhoenix + ' health.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                            }

                                        else
                                            {

                                                $('#messages').append('You do not have enough mana to cast ' + moveName + '.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                            }
                                    }

                                    else
                                    {

                                        $('#messages').append('You Phoenix is already in full health.<br />');
                                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                    }

                                }

                             if(special === 'LifeStrike')
                                    {

                                        window.Health = window.Health - Math.ceil ( (20/100) * window.HealthMax );

                                        $("#healthBarBox").attr("value", window.Health);

                                        window.EnemyHealth = window.EnemyHealth - Math.ceil ( (20/100) * ( window.EnemyHealth) );

                                    }

                            if(special === 'Tiger')
                                {

                                    window.Tiger = true;

                                    setTimeout(function() { reverseTiger() }, 5000);


                                }

                        }

                 if (typeof  healingSpells   !== 'undefined')
                    {
                        var extraManaCost = Math.ceil ( ( manaCost / 100) * window.ManaMax ) ;  /* The extra mana cost of spells */

                        var healingTotal = 0;

                        for (x in  healingSpells)
                        {
                            if( typeof healingSpells[x] !==  'undefined' )
                            {
                                healingTotal = healingTotal +  healingSpells[x];

                                hold(Math.random * 20);
                            }

                            hold(Math.random * 20);
                        }




                        // Healer Bonus.

                        if(window.CharIsSpirithandler == true)
                            {

                                healingTotal = healingTotal + Math.ceil( (10/100) * healingTotal );

                            }

                        var totalManaCost = healingTotal + extraManaCost;

                        // Arcane magic bonus.
                        if(typeof window.ArcaneStr !== 'undefined')
                            {

                                healingTotal = healingTotal + window.ArcaneStr;

                            }

                        if(window.CharIsMagicallytrained == true)
                        {

                            totalManaCost = totalManaCost - Math.ceil( (20/100) * totalManaCost );

                        }

                        if( window.Health < window.HealthMax)  /* This ensures that you will not heal more health than your maximum health points. */
                        {
                            if( window.Mana >= totalManaCost )

                                {
                                    hold(Math.random * 20);

                                    window.Health = window.Health +  healingTotal;



                                    window.Mana = window.Mana - totalManaCost;

                                    $('#messages').append('You spent ' + totalManaCost + ' mana.<br />');
                                    $('#messages').append('You heal ' + healingTotal + ' health with <i>' + moveName + '</i><br />');

                                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                    $("#healthBarBox").attr("value", window.Health);

                                    $("#manaBarBox").attr("value", window.Mana);
                                }

                            else
                                {
                                    hold(Math.random * 20);

                                    $('#messages').append('You do not have enough mana to cast <i>' + moveName + '</i>.<br />');
                                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


                                }
                      }

                      else
                       {
                           $('#messages').append('You are full health and you cannot cast <i>' + moveName + '</i>.<br />');
                           $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
                       }
                    }

                if (typeof physicalDirectDamage !== 'undefined')
                    {

                        hold(Math.random * 20);

                        hold(Math.random * 20);

                        if(Math.random() <= ( window.EnemyProtection/100 ) )  // E.g if window.Protection is 1, we divide by 100 to get 1% or 0.01.
                            {


                                $('#messages').append('The opponent avoided or resisted your move.<br />');
                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                hold(Math.random * 20);

                            }

                        else
                            {

                                if(magicalAttacks == false)
                                    {
                                       if(special !== 'Nano')
                                       {
                                        var totalDamage = window.Strength;

                                        if(window.Shapeshifted == true)
                                            {

                                                totalDamage = totalDamage + Math.ceil( (20/100) * totalDamage );

                                                totalDamage = totalDamage + window.Shapeshifting + Math.ceil(1.5 * window.TitanStr);

                                            }

                                        // Strength Bionic.
                                        if(typeof window.StrBionic !== 'undefined')
                                            {

                                                totalDamage = totalDamage + ( window.StrBionic * 2);

                                            }

                                        if(typeof window.UnarmedCombat !== 'undefined')
                                            {
                                                var unarmedCombatTemp = window.UnarmedCombat;


                                                if(window.UnarmedCombat > 15)
                                                    {

                                                        unarmedCombatTemp = 15;

                                                    }

                                                totalDamage = totalDamage + Math.ceil( (unarmedCombatTemp/100) * totalDamage);

                                            }

                                        if(typeof  window.CriticalStrike !== 'undefined')
                                            {

                                                if(Math.random() <= ( 50/100 ) )
                                                    {

                                                        $('#messages').append('You are unable to concentrate enough to do a Critical Strike.<br />');
                                                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
                                                    }

                                                else
                                                    {
                                                        totalDamage = totalDamage + Math.ceil(window.CriticalStrike * totalDamage);

                                                        $('#messages').append('Focusing enough, you will do a Critical Strike.<br />');
                                                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                    }


                                            }

                                           if(window.Tiger === true)
                                                {

                                                    totalDamage = totalDamage + Math.ceil( (30/100) * totalDamage );

                                                }

                                       }
                                     else
                                       {
                                           var totalDamage = 0;
                                       }

                                        var doDamage = true;

                                    }
                                else if(magicalAttacks == true)
                                    {

                                        var totalDamage = 0;


                                        var extraManaCost = Math.ceil ( ( manaCost / 100) * window.ManaMax ) ;  /* The extra mana cost of spells */

                                        var totalManaCost = extraManaCost;

                                        for (x in physicalDirectDamage)
                                        {
                                            if( typeof physicalDirectDamage[x] !==  'undefined' )
                                            {
                                                totalManaCost = totalManaCost + physicalDirectDamage[x];

                                                hold(Math.random * 20);
                                            }

                                            hold(Math.random * 20);
                                        }


                                        if(window.CharIsMagicallytrained == true)
                                            {

                                                totalManaCost = totalManaCost - Math.ceil( (20/100) * totalManaCost );

                                            }

                                               if(zeroManaCost == true)
                                                    {

                                                        totalManaCost = 0;

                                                    }

                                        if( window.Mana >= totalManaCost )

                                        {
                                            hold(Math.random * 20);

                                            window.Mana = window.Mana - totalManaCost;

                                            // Symbiosis just merges Deity with Symbiot, so don't show mana messages.
                                            if( special == 'Symbiosis')
                                            {


                                            }
                                            else
                                                {
                                                    $('#messages').append('You spent ' + totalManaCost + ' mana.<br />');
                                                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                    $("#healthBarBox").attr("value", window.Health);

                                                    $("#manaBarBox").attr("value", window.Mana);
                                                }
                                            var doDamage = true;

                                        }

                                        else
                                        {

                                            hold(Math.random * 20);

                                            $('#messages').append('You do not have enough mana to cast <i>' + moveName + '</i>.<br />');
                                            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


                                        }


                                    }

                                    hold(Math.random * 20);


                                if(doDamage === true)
                                {
                                    for (x in physicalDirectDamage)
                                        {
                                            if( typeof physicalDirectDamage[x] !==  'undefined' )
                                                {
                                                    totalDamage = totalDamage + physicalDirectDamage[x];

                                                    hold(Math.random * 20);
                                                }

                                            hold(Math.random * 20);
                                        }


                                    /* Vampire Strength bonus */
                                    if(magicalAttacks == false)
                                        {

                                            if( typeof window.StrengthBonusVamp !==  'undefined' )
                                                {

                                                    totalDamage = totalDamage * window.StrengthBonusVamp;

                                                    hold(Math.random * 20);

                                                }

                                        }

                                    /* Inferno bonus */

                                    if(magicalAttacks == true)
                                    {

                                        if( typeof window.InfernoBonus !==  'undefined' )
                                        {

                                            totalDamage = totalDamage * window.InfernoBonus;

                                            hold(Math.random * 20);

                                        }

                                    }


                                    // Eyes laser bolt percentage damage to enemy */
                                    if( funLock === "eyesLaserBoltFunLock")
                                        {

                                            var eyesPercentageDamage = Math.ceil ( (15/100) * window.EnemyHealth);

                                            totalDamage = totalDamage +  eyesPercentageDamage;

                                        }

                                    // Slow magic spell.
                                    if(special === 'Slow')
                                    {

                                        window.Slow = true;

                                        setTimeout(function() { reverseSlow(); }, 10000);


                                    }


                                    var enemyArmorTotal = window.EnemyArmor;


                                    if(magicalAttacks == false)
                                        {
                                            if(funLock === 'vampUnarmedAttackFunLock')
                                                {
                                                    if( window.CharIsPhysicallytrained == true )
                                                        {

                                                            enemyArmorTotal = enemyArmorTotal - Math.ceil( (10/100) * window.EnemyArmor );

                                                        }
                                                }

                                      if(special == 'Press')
                                         {

                                             window.MartialPress = true;

                                             setTimeout( function () { reversePress(); }, 10000)

                                         }


                                    if(window.MartialPress == true)
                                        {

                                            enemyArmorTotal = enemyArmorTotal - Math.ceil ( enemyArmorTotal * (30/100) );

                                        }
                                        // Unarmed, vamp bite, claws, wings and horns (bionic implant does not benefit horns) bionic implant/tougher body parts
                                        if(funLock === 'vampBiteFunLock' || funLock === 'vampUnarmedAttackFunLock')
                                            {
                                                if(typeof window.UnarmedGenericBionic !== 'undefined')
                                                    {
                                                        if(funLock !== 'hornsFunLock')  // Horns are not benefited by Generic Bionic Implant
                                                        {

                                                            totalDamage = totalDamage + window.UnarmedGenericBionic;

                                                        }
                                                    }

                                                if(typeof window.TougherBodyParts !== 'undefined')
                                                    {

                                                        totalDamage = totalDamage + window.TougherBodyParts;

                                                    }
                                            }



                                        }

                                    var actualTotalDamage =  totalDamage - enemyArmorTotal;

                                    var attacksNumber = 1;

                                    if( special == 'Symbiosis')
                                        {
                                            if(Math.random() <= ( 30/100 ) )
                                            {

                                                $('#messages').append('You failed to merge with your symbiot.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


                                            }
                                            else
                                            {
                                                window.Symbiosis = true;
                                            }
                                        }


                                     if(window.Symbiosis == true)
                                        {
                                            attacksNumber = 2;

                                            actualTotalDamage = actualTotalDamage * 2;

                                            hold(Math.random * 20);

                                        }

                                    if(special == 'Nano')
                                        {

                                            attacksNumber = 5;

                                        }

                                    if(special == 'Combo')
                                        {

                                            attacksNumber = 4;

                                        }

                                    // Arcane magic bonus.
                                    if(magicalAttacks == true)
                                        {
                                            if(typeof window.ArcaneStr !== 'undefined')
                                            {
                                                actualTotalDamage = actualTotalDamage + window.ArcaneStr;
                                            }
                                        }

                                    for (var i = 0; i< attacksNumber; i++)
                                        {


                                            // Symbiosis just merges Deity with Symbiot, so don't show 0 damage messages.
                                            if( special == 'Symbiosis')
                                                {
                                                    if( (special == 'Symbiosis' && window.Symbiosis == true))
                                                    {
                                                        if (i == 0) // Show Symbiosis message once only, no need to show it twice.
                                                        {
                                                            $('#messages').append('You did  <i>' + moveName + '</i>.<br />');
                                                            $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
                                                        }

                                                    }
                                                }
                                            else
                                                {
                                                    actualAccuracy = 100 - window.Accuracy;     // Calculate actual accuracy.
                                                   // Player may fail to do a move.

                                                    if(window.Shapeshifted == true)
                                                        {
                                                            var shapeTemp = window.Shapeshifting;

                                                            if(window.Shapeshifting > 10)
                                                                {
                                                                    shapeTemp = 10;
                                                                }
                                                            actualAccuracy = actualAccuracy - shapeTemp;

                                                        }


                                                    if(window.VampireFly == true)
                                                        {

                                                            actualAccuracy = actualAccuracy - Math.ceil( (15/100) * window.Accuracy) - window.Fly;

                                                        }


                                                    if(Math.random() <= ( actualAccuracy/100 ) )
                                                    {

                                                        $('#messages').append('You failed to do  <i>' + moveName + '</i>.<br />');
                                                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                    }
                                                    else
                                                    {
                                                        window.EnemyHealth = window.EnemyHealth  - actualTotalDamage;

                                                        $('#messages').append('You did damage: ' + actualTotalDamage + ' with <i>' + moveName + '</i>.<br />');
                                                        $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


                                                        // Katana has a small 3% chance to instantly kill opponent.
                                                        if(special === 'Katana')
                                                        {

                                                            if(Math.random() <= ( 3/100 ) )
                                                            {

                                                                window.EnemyHealth = 0;

                                                                $('#messages').append('You backstabbed your opponent with your Katana.<br />');
                                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                            }

                                                        }


                                                    }


                                                }
                                            hold(Math.random * 20);
                                        }



                                }
                                    /* Detect if the function is vamp bite, to get health points from attacking */



                                    if(funLock == "vampBiteFunLock" )
                                        {

                                            var vampBiteFound = "some value";

                                        }




                                    if( typeof vampBiteFound !==  'undefined' ) /* window.VampBite is defined, the vampire did his vampire bite move */
                                        {
                                            // You can only get health from vampire bite, if your health is lower than you HealthMax.
                                            if(window.Health < window.HealthMax)
                                            {
                                                window.Health = window.Health + window.VampBite; // Vampire gets health points based on his vampiric bite value

                                                $("#healthBarBox").attr("value", window.Health);

                                                $('#messages').append('With Vampiric Bite you gain: ' + window.VampBite + ' health.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                                hold(Math.random * 20);
                                            }
                                          else
                                            {

                                                $('#messages').append('With Vampiric Bite you do not get health. You are already full.<br />');
                                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                                            }

                                        }


                            }

                        hold(Math.random * 20);

                    }
            }

            else
            {

                $('#messages').append('You cannot do the move, this is an once  per fight move.<br />');
                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                hold(Math.random * 20);

            }


        }

        else
            {

                $('#messages').append('You cannot do the move, the fight is over.<br />');
                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                hold(Math.random * 20);

            }

        setTimeout( function ()
        {

            $('#'+ buttonid + "").show();

            window[funLock] = false;

        }, showButtonDelay);

    }

}





