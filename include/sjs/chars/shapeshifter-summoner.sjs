function  summonEctoplasm(    )
{

    var magicalAttacks =  true;

    var healingPoints = new Array();

    healingPoints[0] = window.SummonEctoplasm;

    healingPoints[1] = window.HealthRegen;





    var lock = 'ectoplasmFunLock';

    var buttonid = 'ectoplasmButton';

    var showButtonDelay = 1000;

    var moveName = 'Summon Ectoplasm';


    var oncePerFight = false;

    var manaCost = 20;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(undefined, undefined, undefined, magicalAttacks, healingPoints, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


// Gives bonus to protection, strength, armor and accuracy.
function shape( )
{



    var moreLess = new Array();

    moreLess[0] = window.Shapeshifting;


    var magicalAttacks = true;

    var special = 'Shape';

    var lock = 'shapeFunLock';

    var buttonid =  'shapeButton';

    var showButtonDelay = 20000;

    var moveName = 'Shapeshifting to Titan';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


function healPhoenix( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'HealPhoenix';

    var lock = 'healPhoenixFunLock';

    var buttonid =  'healPhoenixButton';

    var showButtonDelay = 1000;

    var moveName = 'Heal Phoenix';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}