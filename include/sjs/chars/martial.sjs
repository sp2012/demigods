// Pressure points technique
function press( )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = 0;


    var magicalAttacks = false;

    var special = 'Press';

    var lock = 'pressFunLock';

    var buttonid =  'pressButton';

    var showButtonDelay = 20000;

    var moveName = 'Pressure Points';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function combo(   )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = 0;


    var magicalAttacks = false;

    var special = 'Combo';

    var lock = 'comboFunLock';

    var buttonid = 'comboButton';

    var showButtonDelay = 15000;

    var moveName = 'Combo Attack';



    var oncePerFight = false;


    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function kailifestrike( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'LifeStrike';

    var lock = 'lifestrikeFunLock';

    var buttonid =  'lifestrikeButton';

    var showButtonDelay = 5000;

    var moveName = 'Ki Life Strike';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


function tiger( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'Tiger';

    var lock = 'tigerFunLock';

    var buttonid =  'tigerButton';

    var showButtonDelay = 7000;

    var moveName = 'Tiger Style';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}