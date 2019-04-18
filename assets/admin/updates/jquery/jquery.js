var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).ready (function(){
    $("#dica").addClass("selecionado");
    $("#conteudodicas").show();
    $("#conteudosites").hide();
    $("#conteudoeventos").hide();
    $("#conteudocosmakers").hide();
    $("#conteudocanais").hide();
    $("#conteudousuarios").hide();

    $("#dica").click(function(){
        $("#dica").toggleClass("selecionado");
        $("#conteudodicas").toggle('slow, 1000')
    });

    $("#site").click(function(){
        $("#site").toggleClass("selecionado");
        $("#conteudosites").toggle('slow, 1000')
    });

    $("#evento").click(function(){
        $("#evento").toggleClass("selecionado");
        $("#conteudoeventos").toggle('slow, 1000')
    });

    $("#cosmaker").click(function(){
        $("#cosmaker").toggleClass("selecionado");
        $("#conteudocosmakers").toggle('slow, 1000')
    });

    $("#canal").click(function(){
        $("#canal").toggleClass("selecionado");
        $("#conteudocanais").toggle('slow, 1000')
    });

    $("#usuario").click(function(){
        $("#usuario").toggleClass("selecionado");
        $("#conteudousuarios").toggle('slow, 1000')
    });

    var sessao = getUrlParameter('secao');

    if(sessao == 'eventos'){
        $("#evento").click();
        $("#conteudodicas").hide();
        $("#dica").removeClass("selecionado");
    }

    if(sessao == 'sites'){
        $("#site").click();
        $("#conteudodicas").hide();
        $("#dica").removeClass("selecionado");
    }

    if(sessao == 'dicas'){
        $("#dica").addClass("selecionado");
    }

    if(sessao == 'cosmakers'){
        $("#cosmaker").click();
        $("#conteudodicas").hide();
        $("#dica").removeClass("selecionado");
    }

    if(sessao == 'usuarios'){
        $("#usuario").click();
        $("#conteudodicas").hide();
        $("#dica").removeClass("selecionado");
    }

    if(sessao == 'canais'){
        $("#canal").click();
        $("#conteudodicas").hide();
        $("#dica").removeClass("selecionado");
    }

});