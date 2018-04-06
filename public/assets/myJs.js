
// language=JQuery-CSS

// ----- form d'inscription ---
$('#boxError').hide();
$('#boxSuccess').hide();


$('#form_sign_in').submit(function(e){
    $('#boxError').html();
    e.preventDefault();
    var $this = $(this);
    var url = $this.attr("action");
    /* $.post(url,$this.serialize()).done(function(data){
         $('#boxError').html(data);
         alert(data.data.error);
     }, "json");*/
    $.post(url,$this.serialize(), function(data){
        if(data.error != null){
            $('#boxError').html(data.error);
            $('#boxError').show();
        }
        else {
            $('#boxSuccess').html(data.success);
            $('#boxError').hide();
            $('#boxSuccess').show();
            $('#form_sign_in').hide();
        }
        //alert(data.data.error);
    }, "json");
});


// ------- form de connexion ------
$('#boxErrorNav').hide();
$('#boxSuccessNav').hide();
$(' #form_connexion').submit(function(e){
    $('#boxErrorNav').html();
    e.preventDefault();
    var $this = $(this);
    var url = $this.attr("action");

    $.post(url,$this.serialize(), function(data){
        if(data.error != null){
            $('#boxErrorNav').html(data.error);
            $('#boxErrorNav').show();
        }
        else {

            $('#boxSuccessNav').html(data.success);
            $('#boxErrorNav').hide();
            $('#boxSuccessNav').show();
            $('#form_connexion').hide();


        }
        //alert(data.data.error);
    }, "json");
});


// ---------- selection de game dans la liste ------

$('.join-game').click(function(){
    var gameId = $(this).attr('data-gameId');
    var url='/proc/join_game';
    $.post(url,{gameId : gameId}, function(data){
            if(data.error == null){
                location.reload();
            }
            else {
                alert('erreur');
            }
    }, "json");
});

// --- lancement d'une partie

$('.tr-game').click(function(){
    var playerId2 = $(this).attr('data-player2');
    var id= $(this).attr('data-id');
    if (playerId2 != ""){ // on authorize l'envoie de la partie
        //alert(playerId2);
        $(location).attr('href',"/myGame?id="+id);
    }
    else{
        //alert('vzvr');
    }
});