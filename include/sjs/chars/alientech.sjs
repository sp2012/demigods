function nano(   )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = window.NanoStr;


    var magicalAttacks = false;

    var special = 'Nano';

    var lock = 'nanoFunLock';

    var buttonid = 'nanoButton';

    var showButtonDelay = 15000;

    var moveName = 'Nanobots';



    var oncePerFight = false;


    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}