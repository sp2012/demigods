<?php

session_start();


$x = "";

/* Heritage */

if($_SESSION['heritage'] == "Spirit Handler" )          {  $x .= "var heritage = new String('spirit handler'); "; }

if($_SESSION['heritage'] == "Earth Golem Hybrid" )      {  $x .= "var heritage = new String('earth golem hybrid'); "; }

if($_SESSION['heritage'] == "Devil Pact Apostate" )     {  $x .= "var heritage = new String('devil pact apostate'); "; }

if($_SESSION['heritage'] == "Doomed" )                  {  $x .= "var heritage = new String('doomed'); "; }

if($_SESSION['heritage'] == "Gifted" )                  {  $x .= "var heritage = new String('gifted'); "; }

if($_SESSION['heritage'] == "Nightstalker Assassin")    {  $x .= "var heritage = new String('nightstalker assassin');  "; }

if($_SESSION['heritage'] == "Zombie Hybrid")            {  $x .= "var heritage = new String('zombie hybrid'); ";}

if($_SESSION['heritage'] == "Lich Hybrid")              {  $x .= "var heritage = new String('lich hybrid');  "; }

if($_SESSION['heritage'] == "Draconian Hybrid")         {  $x .= "var heritage = new String('draconian hybrid'); "; }


/* Specialty */

if($_SESSION['specialty'] == "Physically Trained" )     {  $x .= "var specialtraining = new String('physically trained');  "; }

if($_SESSION['specialty'] == "Magically Trained" )      {  $x .= "var specialtraining = new String('magically trained');  "; }

if($_SESSION['specialty'] == "Double Trained" )         {  $x .= "var specialtraining = new String('double trained'); "; }

/* Life State */

if($_SESSION['lifestate'] == "Living")                  {  $x .= "var lifestate = new String('living');  ";}

if($_SESSION['lifestate'] == "Undead")                  {  $x .= "var lifestate = new String('undead');  ";}

if($_SESSION['lifestate'] == "Undead Ghost")            {  $x .= "var lifestate = new String('undead ghost'); ";}

/* Race */

if($_SESSION['race'] == "Vampire")  {  $x .= "var race = new String('vampire'); "; }

if($_SESSION['race'] == "Werewolf") {  $x .= "var race = new String('werewolf'); "; }

if($_SESSION['race'] == "Angel")    {  $x .= "var race = new String('angel'); "; }

if($_SESSION['race'] == "Demon")    {  $x .= "var race = new String('demon'); "; }

if($_SESSION['race'] == "Mutant")   {  $x .= "var race = new String('mutant'); "; }

if($_SESSION['race'] == "Deity")    {  $x .= "var race = new String('deity'); "; }


// First Class

if( $_SESSION['firstClass'] == "Shapeshifter - Summoner") { $x .= "var fClass = new String('shapeshifter-summoner'); "; }

if( $_SESSION['firstClass'] == "Martial Artist")          { $x .= "var fClass = new String('martial artist'); "; }

if( $_SESSION['firstClass'] == "Rogue")                   { $x .= "var fClass = new String('rogue'); "; }

if( $_SESSION['firstClass'] == "Warlock")                 { $x .= "var fClass = new String('warlock'); "; }

if( $_SESSION['firstClass'] == "Warrior Priest")          { $x .= "var fClass = new String('warrior priest'); "; }

if( $_SESSION['firstClass'] == "Demonic Priest")          { $x .= "var fClass = new String('demonic priest'); "; }
// Second Card

if( $_SESSION['secondClass'] == "Alien Technologist") { $x .= "var sClass = new String('alien technologist'); "; }

if( $_SESSION['secondClass'] == "Arcane Magickian")   { $x .= "var sClass = new String('arcane magickian'); "; }


// Ally

if( $_SESSION['ally'] == "ghoul")                      { $x .= "var ally = new String('ghoul'); "; }

if( $_SESSION['ally'] == "griffon")                    { $x .= "var ally = new String('griffon'); "; }

if( $_SESSION['ally'] == "dryad")                      { $x .= "var ally = new String('dryad'); "; }

if( $_SESSION['ally'] == "hellhound")                  { $x .= "var ally = new String('hellhound'); "; }

// Mount

if( $_SESSION['spirit'] == "no-spirit")                 { $x .= "var spirit = new String('no spirit'); "; }

if( $_SESSION['spirit'] == "nightmare")                 { $x .= "var spirit = new String('nightmare'); "; }

if( $_SESSION['spirit'] == "unicorn")                   { $x .= "var spirit = new String('unicorn'); "; }

if( $_SESSION['spirit'] == "wyvern")                    { $x .= "var spirit = new String('wyvern'); "; }

echo $x;

?>