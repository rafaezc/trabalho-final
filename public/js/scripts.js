$(function (){
    //ajax form
    $("form:not('.ajax_off')").submit(function (e) { //se não tiver a classe ajax_off executa esse método
        e.preventDefault(); //não permite usar o envio http
        var form = $(this); //formulário
        var load = $(".ajax_load"); //pega a animação de carregamento
        var flashClass = "ajax_response"; //bloco que recebe as mensagens
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"), //o action do formulário irá precisar passar a rota do controlador
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex"); //carregar uma div de carregamento antes do envio
            },
            success: function (response) { //pega os dados
                //redirect
                if (response.redirect) { //redireciona
                    window.location.href = response.redirect;
                }

                //message
                if (response.message) {
                    if (flash.length) { //se tiver o ajax_response
                        flash.html(response.message);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>");
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                load.fadeOut(200); //tira a mensagem de carregamento

                if (form.data("reset") === true) { //resetar o formulario
                    form.trigger("reset");
                }
            }
        });
    })
});