function showUndeadBonus()
{

    $('#messages').append( 'As a full blown Undead you get a significal natural armor bonus.<br />');
    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);

}