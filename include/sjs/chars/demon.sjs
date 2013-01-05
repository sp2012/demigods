function telekinisis( )
{


    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = window.Telekinisis;

    var magicalAttacks = true;


    var lock = 'telekinisisFunLock';

    var buttonid = 'telekinisisButton';

    var showButtonDelay = 1000;

    var moveName = 'Telekinisis';


    var oncePerFight = false;

    var manaCost = 10;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}