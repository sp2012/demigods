<?php

$content_ = "";

$content_ .= "
<pre>
Heritages:

Spirit handler:
Due to spirits you summoned to aid you,
1)your healing spells are 10% stronger.
and
2)you regenerate 10% more health
and
3)you regenerate health faster.
4)you have a spell that costs 10% of Health Max and has a 50% chance to succeed.
  If it succeeds it heals 30% of Health Max.


Earth Golem Hybrid:
Due to your skin and body constitution you are immune to the attacks of various opponents. (add VulnerableToGolemImmunity flag (values accepted
are true and false)  to opponent)


Devil Pact Apostate:
1)Your offensive spells are 25% stronger.
Offensive spells have short delays, but cost mana.
2)Your mana regeneration is increased by 20%
3)and you regenerate mana faster.
4)you have a spell that costs 10% of Health Max and has a 50% chance to succeed.
  If it succeeds it reduces opponent's health by 20%.

Doomed:
1)Able to withstand 5% of the damage he sustains
and instead of getting hurt,
2)he reflects that 5% damage back to the attacker
(tip: if(type of window.DoomedDamageReflect !== 'undefined')reduce damage to
character by 5% in opponent attack, save it in
window.DoomedDamageReflect then when a character does a move
if(typeof window.DoomedDamageReflect !== 'undefiled')
add that value to totalDamage and do window.DoomedDamageReflect = 0;)

In addition,
3)he has 10% chance to avoid any attack in a fight (if the opponent has many attacks,
  then the check will apply to each attack individually, so not all attacks can necessarily be avoided).
  This is an extra layer on top of Protection, that is, it is not added to Protection,
  but it stands on its own.
4) he has 10% chance of copying the attack or healing move
of the opponent (using the opponent's attributes to do that)
and performing that move in the same turn as the
opponent.
5) he has an attack move gaze that petrifies and kills the opponent once per fight
   The chance of that happening is 10%.
6) He has no Mana and
7) no Mana regeneration.
8) He has 3% chance that his curse will kill him, once per fight (when a fight begins).
9) He has +15 in bad luck.

Gifted:
1)He has Karma and 30% in it.
Karma affects a lot. 30% Karma means the character has 30% chance to get
a 10% bonus in Accuracy, Protection, Total Damage, Natural Armor
and -10% in Enemy Health, Enemy Strength, Enemy Armor and Enemy Speed.
The chance applies to each bonus individually.
2) He has a gift that has the effect of disorienting the opponent, removing the opponent's extra attacks permanently in a fight.
(programming tip, make variable window.GiftedSkip1Attack if window.GiftedSkip1Attack == false in attack loop give continue;
then set window.GiftedSkip1Attack = true then when gamer or opponent die do window.GiftedSkip1Attack = false; )
3) Get 1 extra Skill Point for every fight he wins.
4) Get 50% more Energy Currency for every fight he wins.

Nightstalker Assassin:
1) He has +20% Protection
2) He has +30% accuracy(normally accuracy is at 70%, but Nightstalker Assassin has 91% with this bonus)
3) He has a katana for backstabbing. With such an attack, he has a 3% chance that he will fatally kill his opponent.
   The katana also does damage.
   You can buy more powerful katanas from the shop, that deal more damage.


Zombie Hybrid

1. Infects opponent with a wasting disease that causes him damage over time.
2. As undead, he has 15% natural armory.
3. Infects opponent with a disease that causes him to cause 15% less physical damage
   (both unarmed and with a weapon).
4. Infects opponent with a disease that has 30% to severely confuse the opponent that
   in success, he fails to do his move (the whole move, ie. if the opponent
   has many attacks he will fail to do all of them).


Lich Hybrid

1. As undead, he has 15% natural armory
2. Is able to absorb 50% of the offensive magical spells damage
   (that 50% does not cause him harm, the rest 50% of damage will
   be directed to the character)
   and convert the 15% of the 50% damage absorbed, into Mana.
3. He can cast a spell to reduce the opponent's luck by 30.
4. He can cast a spell that increases the opponent's bad luck (if any) by 15.


Draconian Hybrid

1. He has a pair of draconian wings (if you have a Vampire or an Angel you keep those wings too, so you will have two
   pairs of wings), has a tail (if you a Demon, you keep your tail, so you will have two tails) and breaths fire and
   when he fights, he uses the wings, the tail and the fire breath simultaneously. Each such attack causes damage and
   the Draconian Hybrid does them at the same time. He has a skill in draconian wings, a skill in draconian tail and a
   skill in draconian fire breathing. All these skills they are stronger than normal with a 100% bonus.

2. +25% natural armor bonus due to the thick draconian skin.

3. He can cast a spell that breaks the opponents weapon and when the opponent attacks, will cause only half the normal
   damage (but note that opponent's weapon damage is much higher than opponent's unarmed attack though).

</pre>";

print $content_;

?>