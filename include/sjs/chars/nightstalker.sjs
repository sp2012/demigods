function katana(   )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = 0;


    var magicalAttacks = false;

    var special = 'Katana';

    var lock = 'katanaFunLock';

    var buttonid = 'katanaButton';

    var showButtonDelay = 5000;

    var moveName = 'Katana';



    var oncePerFight = false;


    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}