$(document).ready(function () {    

    function limpa_formulario_cep() {
        $("#delta_alunos_ende_rua").val("");
        $("#delta_alunos_ende_bairro").val("");
        $("#delta_alunos_ende_cidade").val("");
        $("#delta_alunos_ende_uf").val("");
    }

    $("#delta_alunos_ende_cep").blur(function () {

        var cep = $(this).val().replace(/\D/g, '');

        if (cep !== "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $("#delta_alunos_ende_rua").val("...");
                $("#delta_alunos_ende_bairro").val("...");
                $("#delta_alunos_ende_cidade").val("...");
                $("#delta_alunos_ende_uf").val("...");

                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        $("#delta_alunos_ende_rua").val(dados.logradouro);
                        $("#delta_alunos_ende_bairro").val(dados.bairro);
                        $("#delta_alunos_ende_cidade").val(dados.localidade);
                        $("#delta_alunos_ende_uf").val(dados.uf);
                    } else {
                        limpa_formulario_cep();
                        alerta('error', 'Aconteceu um erro!', 'CEP não encontrado.');
                        $("#delta_alunos_ende_cep").focus();
                    }
                });
            } else {
                limpa_formulario_cep();
                alerta('error', 'Aconteceu um erro!', 'Formato de CEP inválido.');
                $("#cep").focus();
            }
        } else {
            limpa_formulario_cep();
        }
    });
});