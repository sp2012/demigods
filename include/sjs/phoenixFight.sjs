function phoenixFight()
{

    if(window.Fight == 1)
        {
            hold(Math.random * 20);	if(window.Fight == 0) { return; }

            if(window.PhoenixHealth <= 0)
                {
                    var PhoenixLives = false;

                    $('#messages').append('Phoenix died.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                    hold(Math.random * 20);	if(window.Fight == 0) { return; }

                    if(Math.random() <= ( 30/100 ) )
                        {

                                var PhoenixLives = true;

                                window.PhoenixHealth = window.PhoenixHealthMax;

                                $('#phoenixBarBox').attr("value", window.PhoenixHealth);

                                $('#messages').append('Phoenix rebirthed from its ashes.<br />');
                                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
                                hold(Math.random * 20);	if(window.Fight == 0) { return; }
                        }

                }
            else
                {
                   var PhoenixLives = true;
                }

            if ( PhoenixLives == true)
                {
                    hold(Math.random * 20);	if(window.Fight == 0) { return; }


                    // Phoenix claws attack.

                    var totalDamageClaws = window.SumAllyStr + window.PhoenixClaws;

                    totalDamageClaws = totalDamageClaws - window.EnemyArmor;

                    window.EnemyHealth = window.EnemyHealth - totalDamageClaws;

                    $('#messages').append('Phoenix attacked the opponent with its claws for ' + totalDamageClaws + ' damage.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                    hold(Math.random * 20);	if(window.Fight == 0) { return; }


                    // Phoenix firebreath attack.

                    var totalDamageBreath = window.SumAllyStr + window.PhoenixBreath;

                    totalDamageBreath = totalDamageBreath - window.EnemyArmor;

                    window.EnemyHealth = window.EnemyHealth - totalDamageBreath;

                    $('#messages').append('Phoenix attacked the opponent with a firebreath for ' + totalDamageBreath + ' damage.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                    hold(Math.random * 20);	if(window.Fight == 0) { return; }

                    // Opponent attacks Phoenix.

                    window.PhoenixHealth = window.PhoenixHealth - window.EnemyStrength;

                    $('#messages').append('Opponent attacked the Phoenix with his bow and arrows for ' + window.EnemyStrength + ' damage.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

                    $('#phoenixBarBox').attr("value", window.PhoenixHealth);

                    hold(Math.random * 20);	if(window.Fight == 0) { return; }

                    window.PhoenixTimer = setTimeout( function() { spawn phoenixFight(); }, 5000);

                    hold(Math.random * 20);	if(window.Fight == 0) { return; }

                }
    }
}