function showOnLogIn() {
    $('#registro').hide();
    $('#login').hide();
    $('#logout').show();
    $('#inicio').show();
    $('#insertar').show();
    $('#creditos').show();
    $('#verBD').show();
    $('#verXML').hide();
    $('#verXSL').hide();
    $('#admin').hide();
    //$("#h1").append("<img width=\"50\" height=\"50\" src=\"data:image/*;base64,<?php echo getImagenDeBD();?>\" alt=\"Img\"/>");
}

function LogInAdmin() {
    $('#registro').hide();
    $('#login').hide();
    $('#logout').show();
    $('#inicio').show();
    $('#insertar').hide();
    $('#creditos').show();
    $('#verBD').hide();
    $('#verXML').hide();
    $('#verXSL').hide();
    $('#admin').show();
    //$("#h1").append("<img width=\"50\" height=\"50\" src=\"data:image/*;base64,<?php echo getImagenDeBD();?>\" alt=\"Img\"/>");
}

function showOnNotLogIn() {
    $('#registro').show();
    $('#login').show();
    $('#logout').hide();
    $('#inicio').show();
    $('#insertar').hide();
    $('#creditos').show();
    $('#verBD').hide();
    $('#verXML').hide();
    $('#verXSL').hide();
    $('#admin').hide();
}

$(document).ready(function () {

});