/* Deity has faster moves, e.g. if a move has 1000 delay, Deity will have 500 delay */

function symbiosis( )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = 0;


    var magicalAttacks = true;

    var special = 'Symbiosis'

    var lock = 'symbiosisFunLock';

    var buttonid =  'symbiosisButton';

    var showButtonDelay = 10000;

    var moveName = 'Symbiosis';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = true;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function inferno(    )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = window.Inferno;


    var magicalAttacks = true;


    var lock = 'infernoFunLock';

    var buttonid =  'infernoButton';

    var showButtonDelay = 500;

    var moveName = 'Inferno';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}