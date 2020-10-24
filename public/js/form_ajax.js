function formAjax(formAjaxElement = '.form-ajax') {
    /*
|-------------------------------------------------------------------
| Processamento de formulário via Ajax sem o envio de arquivos
  Se vc precisa enviar arquivos use o js/form.ajax.with.flies.js
|-------------------------------------------------------------------
| Os formulários submetidos via ajax recebem o retorno e aplicam 
| os erros em seus campos usando o nome do campo ou o pseudo-nome para
| campos calculados ou combinados após o envio
|
*/
    var observer = $('body');
    var formAjaxTrigger = formAjaxElement;
    var submitFormAjax = '.submit-ajax-js';
    var containerParent = '.modal';
    var load = '.load-js';

    $(formAjaxTrigger).on('keyup keypress', function (e) {
        //bloqueado o envio do form pela tecla [ENTER]
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    /*
     |-----------------------------------------------------------------------------
     | Delegamos ao evento submit do form-ajax a função de iniciar a transação
     |-----------------------------------------------------------------------------
     | É necessário disparar o formulário pelo evento submit.
     | O evento onclick do botão não consegue interpretar os atributos dos inputs
     |
     */
    observer.delegate(formAjaxTrigger, 'submit', function (event) {
        //bloqueando o envio do form pelo evento click do botão submit
        event.preventDefault();
        var form = $(this);
        var submit = $(form.find(submitFormAjax));
        formAjaxSubmit(submit, form, containerParent);
    });

    function formAjaxSubmit(submit, formAjax, containerParent) {

        $.ajax({
            type: formAjax.attr('method'),
            url: formAjax.attr('action'),
            data: formAjax.serialize(),
            dataType: "json",
            beforeSend: function () {
                //Ativamos o load do formulario
                $(load).removeClass('d-none');
                //bloqueamos o submit enquanto a requisição é processada
                submit.attr('disabled', true);
                //econdemos os feedbacks anteriores
                $('.invalid-feedback').hide();
            },
            error: function (data) {               
                $(load).addClass('d-none');
                var response = JSON.parse(data.responseText);
                //percorremos os erros e de acordo com o 'name' ou 'pseudoname' do campo
                //associamos o erro ao seu input de origem                
                $.each(response.errors, function (index, obj) {
                    formAjax.find('*[name=' + index +
                            '],*[data-pseudoname=' + index + ']')
                        .siblings('.invalid-feedback').html(obj[0])
                        .show();
                });
            },
            success: function (response) {
                //desativamos o load do formulario
                //Ativamos o load do formulario
                $(load).addClass('d-none');
                //se a requisição deu certo mais recebe uma lista de erros de 
                //validação
                if (response.action == false) {
                    //percorremos os erros e de acordo com o 'name' ou 'pseudoname' do campo
                    //associamos o erro ao seu input de origem                
                    $.each(response.errors.list, function (index, obj) {
                        formAjax.find('*[name=' + index +
                                '],*[data-pseudoname=' + index + ']')
                            .siblings('.invalid-feedback').html(obj[0])
                            .show();
                    });
                }
                //Se a requisição deu certo e retornou sucesso
                //exibimos o feedback de sucesso para o usuário
                if (response.action == true) {
                    //Usando a biblioteca SweetAlert2               
                    sweetAlert2Feedback(response);
                }

                //Liberamos o submit no final da requisição
                submit.attr('disabled', false);
                //Desbloqueamos a tela ao final da requisição
                $('.load-content').remove();

                //Se existir um redirecionamento na resposta ajax
                // é executado aqui
                if (response.error_redirect) {
                    window.location.href = response.redirect;
                }
            }
        });

        /**
         * Recebe o response do controlador e pode executar diversas funções 
         * de callback [funções executadas depois da resposta retornada pro
         * front end] na interface
         * @param {object json} response 
         */
        function sweetAlert2Feedback(response) {
            var iconType = response.action == true ? 'success' : 'warning';
            Swal.fire({
                title: response.feedback.title,
                text: response.feedback.text,
                icon: iconType,
                /**
                 * se houver um conteúdo HTML para ser exibido no Alerta ele vai aqui
                 * dinamicamente vindo do controlador
                 * Ex: $response->html = '<label>Meu label pra ser mostrado no alerta</label>';
                 */
                html: response.html == '' ? response.html : '',
                confirmButtonText: 'ok'
            }).then((result) => {
                /**
                 * Se for necessário executar alguma função após a notificação do 
                 * Swal.fire executamos aqui
                 * A ideia é criar um nó na resposta do controlador e esse nó funcione
                 * como uma trigger aqui e chame a função desejada
                 */
                if (result.value) {

                    /**
                     * Se você passar um link no nó redirect da resposta do controlador
                     * o script vai executá-lo aqui
                     * [Você precisa criar o nó no controlador] : $response->redirect = http://link.com
                     * ou  $response->redirect= route('nomeDaRota');
                     */
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }

                    if (response.reload) {
                        window.location.reload(true);
                    }

                    /**
                     * Limpa o formulário que chamou o form.ajax
                     * [Você precisa criar o nó no controlador] : $response->clear_form = true;
                     */
                    if (response.clear_form) {
                        $(formAjax).trigger('reset');
                    }
                    /**
                     * Limpa o formulário que chamou o form.ajax
                     * [Você precisa criar o nó no controlador] : $response->clear_form = true;
                     */
                    if (response.remove_form) {
                        $('.modal,.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                    }

                    /**
                     * Se após a execução do comando submit vc precisar bloquear o formulário
                     * basta criar no controlador o nó : $response->block_submit = true;
                     */
                    if (response.block_submit) {
                        $(formAjax).find(submitFormAjax).attr('disabled', true);
                    }

                    /**
                     * Insere um HTML informado no nó "$response->append" dentro do 
                     * elemento informado no nó "$response->target"
                     * Ex: $response->append = '<p>Um parágrafo</p>';
                     * $response->target = '.box';
                     * Isso vai  inserir dentro de um elemento com a classe .box um 
                     * parágrafo escrito "Um parágrafo"
                     */
                    if (response.append != '') {
                        $(response.target).html(response.append);
                    }
                }
            })
        }
        return false;
    }

}
