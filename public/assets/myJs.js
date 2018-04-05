
// language=JQuery-CSS




$('#boxError').hide();
$('#boxSuccess').hide();

$('#form_sign_in, #form_connexion').submit(function(e){
    $('#boxError').html();
    e.preventDefault();
    var $this = $(this);
    var url = $this.attr("action");

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


