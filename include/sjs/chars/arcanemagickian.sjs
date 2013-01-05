

function eyeLaserBolt( )
{


    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = window.EyeLaserBolt;

    var magicalAttacks = true;


    var lock = 'eyesLaserBoltFunLock';

    var buttonid = 'eyesLaserBoltButton';

    var showButtonDelay = 10000;

    var moveName = 'Eyes Laser Bolt';


    var oncePerFight = true;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = true;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}


function gaiaBless(  )
{

    var magicalAttacks = true;


    var healingPoints = new Array();

    healingPoints[0] = window.GaiaBless;





    var lock = 'gaiaBlessFunLock';

    var buttonid = 'gaiaBlessButton';

    var showButtonDelay = 1000;

    var  moveName = 'Gaia Blessing';


    var oncePerFight = false;

    var manaCost = 20;

    var healthCost = 0;

    var zeroManaCost = false;


    spawn skills(undefined, undefined, undefined, magicalAttacks, healingPoints, undefined, undefined, undefined, undefined,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function slow( )
{



    var physicalDirectDamage = new Array();

    physicalDirectDamage[0] = 0;


    var magicalAttacks = true;

    var special = 'Slow';

    var lock = 'slowFunLock';

    var buttonid =  'slowButton';

    var showButtonDelay = 20000;

    var moveName = 'Slow';


    var oncePerFight = false;

    var manaCost = 10;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(physicalDirectDamage, undefined, undefined, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}

function ray( )
{



    var moreLess = new Array();

    moreLess[0] = 0;


    var magicalAttacks = true;

    var special = 'Ray';

    var lock = 'rayFunLock';

    var buttonid =  'rayButton';

    var showButtonDelay = 2000;

    var moveName = 'Healing Rays';


    var oncePerFight = false;

    var manaCost = 0;

    var healthCost = 0;

    var zeroManaCost = false;

    spawn skills(undefined, undefined, moreLess, magicalAttacks, undefined, undefined, undefined, undefined, special,
    lock,buttonid, showButtonDelay, moveName, oncePerFight, manaCost, healthCost, zeroManaCost);




}