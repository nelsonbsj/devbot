/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
$(document).ready(function () {
    $('a[data-confirm]').click(function (ev) {
        var href = $(this).attr('href');
        if (!$('#confirm-delete').length) {
            $('body').append('\
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">\n\
    <div class="modal-dialog">\n\
        <div class="modal-content">\n\
            <div class="modal-header bg-danger text-white">\n\
                EXCLUIR ITEM\n\
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n\
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>\n\
                    </button>\n\
            </div>\n\
            <div class="modal-body">\n\
                Tem certeza de que deseja excluir o item selecionado ?\n\
            </div>\n\
            <div class="modal-footer">\n\
                 <button type="button" class="btn btn-success" data-dismiss="modal">\n\
                     Não\n\
                 </button>\n\
                 <a class="btn btn-danger text-white" id="dataComfirmOK">\n\
                      SIM\n\
                 </a>\n\
            </div>\n\
        </div>\n\
    </div>\n\
</div>');
        }
        $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
        return false;
    });
});

function validaSenha() {
    var formulario = document.formSenha;
    var msg = '';
    if (formulario.senha.value === formulario.resenha.value) {
        return true;
    } else {
        msg += 'Campo Senha e Confirmação de senha devem ser identicos \n';
        alert(msg);
        return false;
    }
    if (msg === '') {
        return true;
    } else {
        alert(msg);
        return false;
    }
}

function validaData(campo) {
    if (campo.value === '') {
        campo.style.backgroundColor = '#FFFFFF';
        return true;
    } else if (!ehData(campo.value)) {
        campo.style.backgroundColor = '#ff0000';
        return false;
    } else {
        campo.style.backgroundColor = '#FFFFFF';
        return true;
    }
}

function getMoney(el) {
    var money = el.value.replace(',', '.');
    return parseFloat(money) * 100;
}

function ehFloat(valor) {
    var tipo = /^([0-9])*[,]?[0-9]*$/;
    return tipo.test(valor);
}
function ehInteger(valor) {
    var tipo = /^([0-9])*$/;
    return tipo.test(valor);
}

function ehData(valor) {
    var tipo = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/\d{4}$/;
    return tipo.test(valor);
}


