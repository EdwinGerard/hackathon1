
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

/*$('#list-game tr.tr-game').click(function(){
    var id = $(this).attr('data-id');
    var playerId2 = $(this).attr('data-player2');
    if (playerId2 == null){
        // on peut s'ajouter à la partie

    }
});*/

$('.join-game').click(function(){
    var gameId = $(this).attr('data-gameId');
    var url='/proc/join_game';
    $.post(url,{gameId : 'gameId'}, function(data){
            alert(data);
    });
});

