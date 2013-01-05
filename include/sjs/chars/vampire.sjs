function vampUnarmedAttack(   )
{



    var physicalDirectDamage = new Array();

    if(typeof  window.UnarmedCombat !=='undefined')
    {

    physicalDirectDamage[0] = Math.ceil (window.UnarmedCombat * 1.15) + Math.ceil(window.EnDamage * window.UnarmedCombat);
    }
    else
    {
        physicalDirectDamage[0] = 0;
    }
    var magicalAttacks = false;


    var lock = 'vampUnarmedAttackFunLock';

    var buttonid = 'vampUnarmedButton';

    var showButtonDelay = 5000;

    var moveName = 'Vampire Unarmed Attack';



    var oncePerFight = false;


    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function vampBite(   )
{



    var physicalDirectDamage = new Array();

    if(typeof  window.UnarmedCombat !=='undefined')
    {
    physicalDirectDamage[0] = Math.ceil( window.UnarmedCombat * 1.15) + Math.ceil(window.EnDamage * window.UnarmedCombat);
    }

    else
    {
    physicalDirectDamage[0] = 0;
    }
    physicalDirectDamage[1] = Math.ceil(window.VampBite/2);

    physicalDirectDamage[2] = Math.ceil(window.NaturalWeaponryFangs * 1.25);


    var magicalAttacks = false;

    var lock = 'vampBiteFunLock';

    var buttonid = 'vampBiteButton';

    var showButtonDelay = 5000;

    var moveName = 'Vampire Bite';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);



}

function mistform( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'Mist';

    var lock = 'mistFunLock';

    var buttonid =  'mistButton';

    var showButtonDelay = 15000;

    var moveName = 'Mist Form';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


function inv( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'Inv';

    var lock = 'invFunLock';

    var buttonid =  'invButton';

    var showButtonDelay = 30000;

    var moveName = 'Invunerability';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


function fly( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'Fly';

    var lock = 'flyFunLock';

    var buttonid =  'flyButton';

    var showButtonDelay = 10000;

    var moveName = 'Fly';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}