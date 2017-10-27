$(document).ready( function () {
    buscar();

    function buscar() {
        $.ajax({
            url: 'http://localhost/lateja/api?acao=buscar',
            type: 'GET',
            dataType: 'json',
            success: function (resultado) {
                if (resultado.status == false) {
                    $('#msg-sem-contatos').removeClass('hidden');
                    return false;
                }

                $('#lista-contatos').html('');

                $.each(resultado.data, function (chave, valor) {
                    $('#lista-contatos').append(
                        '<tr>' +
                        '<td>' + valor.id + '</td>' +
                        '<td>' + valor.nome + '</td>' +
                        '<td>' + valor.email + '</td>' +
                        '<td>' + valor.telefone + '</td>' +
                        '</tr>'
                    );
                });

                $('#msg-sem-contatos').addClass('hidden');
            }
        });
    }

    $('#form-contato').submit( function (event) {

        var dados = {
            nome: $('#nome').val(),
            email: $('#email').val(),
            telefone: $('#telefone').val()
        };

        $.ajax({
            url: 'http://localhost/lateja/api?acao=inserir',
            type: 'GET',
            data: dados,
            success: function (resultado) {
                if (resultado.status == false) {
                    alert('Erro ao inserir o novo contato');

                    $('#msg-novo-contato').addClass('hidden');
                    return false;
                }

                $('#msg-novo-contato').removeClass('hidden');
                buscar();
            }
        });

        $(this).trigger('reset');
        $('#close-modal').trigger('click');
        buscar();

        event.preventDefault();
    });
});