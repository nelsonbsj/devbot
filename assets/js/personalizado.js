$(document).ready(function () {
    $('a[data-confirm]').click(function (ev) {
        var href = $(this).attr('href');
        if (!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Não</button><a class="btn btn-danger text-white" id="dataComfirmOK">SIM</a></div></div></div></div>');
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

function valPrecifica() {
    var formulario = document.form_Precifica;
    var fund_totalG = 0;
    var ofic_totalG = 0;
    var almo_totalG = 0;
    var serv_totalG = 0;



    if (formulario.valor_desc.value === '') {
        formulario.valor_desc.value = 0;
    } else if (!ehFloat(formulario.valor_desc.value)) {
        formulario.valor_desc.value = 0;
    }
    var desconto = getMoney(formulario.valor_desc) / 100;
    //ajusta o campo acrescimo
    if (formulario.valor_acre.value === '') {
        formulario.valor_acre.value = 0;
    } else if (!ehFloat(formulario.valor_acre.value)) {
        formulario.valor_acre.value = 0;
    }
    var acrescimo = getMoney(formulario.valor_acre) / 100;
    //calcula o total parcial e geral dos itens válidos do movimento
    for (var flag = 1; flag <= formulario.quantidade_itens.value; flag++) {
        QuantUnit = eval('formulario.quantidade' + flag);
        //descricao = eval('formulario.material' + flag);
        valorUnit = eval('formulario.valor_unidade' + flag);
        if (QuantUnit.value === '') {
            QuantUnit.value = 0;
        } else if (!ehInteger(QuantUnit.value)) {
            QuantUnit.value = 0;
        }
        if (valorUnit.value === '') {
            valorUnit.value = 0;
        } else if (!ehFloat(valorUnit.value)) {
            valorUnit.value = 0;
        }
        totalLin = eval('formulario.total' + flag);
        totalLin.value = (getMoney(QuantUnit) * getMoney(valorUnit) / 10000).toFixed(2);
        totGeralItens = totGeralItens + (getMoney(QuantUnit) * getMoney(valorUnit) / 10000);
    }
    formulario.perc_desc.value = (desconto / totGeralItens * 100).toFixed(2).replace('.', ',');
    formulario.perc_acre.value = (acrescimo / totGeralItens * 100).toFixed(2).replace('.', ',');
    formulario.totalItens.value = (totGeralItens).toFixed(2).replace('.', ',');
    formulario.totalGeralItens.value = (totGeralItens + (acrescimo - desconto)).toFixed(2).replace('.', ',');
    calcTotalGeralOrca();
    //    //Atualiza o valor da diferença caso no formulario exista o financeiro

    if (formulario.diferenca) {
        var totalParcelas = getMoney(formulario.totalParcelas) / 100;
        var totalGeralItens = getMoney(formulario.totalGeralItens) / 100;
        formulario.diferenca.value = (totalGeralItens - totalParcelas).toFixed(2).replace('.', ',');
    }

}

function calcFundicao() {
    var formulario = document.form_Precifica;
    fund_totalG = 0;
    //alert('aqui');
    for (var flag = 1; flag <= formulario.countFundicao.value; flag++) {
        fund_hora = eval('formulario.fund_hora' + flag);
        fund_valor = eval('formulario.fund_valor' + flag);
        if (fund_hora.value === '') {
            fund_hora.value = 0;
        } else if (!ehInteger(fund_hora.value)) {
            fund_hora.value = 0;
        }
        if (fund_valor.value === '') {
            fund_valor.value = 0;
        } else if (!ehFloat(fund_valor.value)) {
            fund_valor.value = 0;
        }
        totalLin = eval('formulario.fund_total' + flag);
        totalLin.value = (getMoney(fund_hora) * getMoney(fund_valor) / 10000).toFixed(2);
        //alert(totalLin.value);

        fund_totalG = fund_totalG + (getMoney(fund_hora) * getMoney(fund_valor) / 10000);
    }
    resumoFund = eval('formulario.resumoFund');
    totalFundicao = eval('formulario.fund_totalG');
    totalFundicao.value = (fund_totalG).toFixed(2);
    resumoFund.value = (fund_totalG).toFixed(2);
    calcValor_unidade();
}

function calcOficina() {
    var formulario = document.form_Precifica;
    ofic_totalG = 0;
    //alert('aqui');
    for (var flag = 1; flag <= formulario.countOficina.value; flag++) {
        ofic_hora = eval('formulario.ofic_hora' + flag);
        ofic_valor = eval('formulario.ofic_valor' + flag);
        if (ofic_hora.value === '') {
            ofic_hora.value = 0;
        } else if (!ehInteger(ofic_hora.value)) {
            ofic_hora.value = 0;
        }
        if (ofic_valor.value === '') {
            ofic_valor.value = 0;
        } else if (!ehFloat(ofic_valor.value)) {
            ofic_valor.value = 0;
        }
        totalLin = eval('formulario.ofic_total' + flag);
        totalLin.value = (getMoney(ofic_hora) * getMoney(ofic_valor) / 10000).toFixed(2);
        //alert(totalLin.value);

        ofic_totalG = ofic_totalG + (getMoney(ofic_hora) * getMoney(ofic_valor) / 10000);
    }
    resumoOfic = eval('formulario.resumoOfic');
    totalOficina = eval('formulario.ofic_totalG');
    totalOficina.value = (ofic_totalG).toFixed(2);
    resumoOfic.value = (ofic_totalG).toFixed(2);
    calcValor_unidade();
}

function calcAlmoxa() {
    var formulario = document.form_Precifica;
    almox_totalG = 0;
    for (var flag = 1; flag <= formulario.countAlmoxarif.value; flag++) {
        almo_quant = eval('formulario.almo_quant' + flag);
        almo_valor = eval('formulario.almo_valor' + flag);
        if (almo_quant.value === '') {
            almo_quant.value = 0;
        } else if (!ehInteger(almo_quant.value)) {
            almo_quant.value = 0;
        }
        if (almo_valor.value === '') {
            almo_valor.value = 0;
        } else if (!ehFloat(almo_valor.value)) {
            almo_valor.value = 0;
        }
        totalLin = eval('formulario.almo_total' + flag);
        totalLin.value = (getMoney(almo_quant) * getMoney(almo_valor) / 10000).toFixed(2);
        //alert(totalLin.value);

        almox_totalG = almox_totalG + (getMoney(almo_quant) * getMoney(almo_valor) / 10000);
    }
    resumoAlmo = eval('formulario.resumoAlmo');
    totalAlmoxarif = eval('formulario.almox_totalG');
    totalAlmoxarif.value = (almox_totalG).toFixed(2);
    resumoAlmo.value = (almox_totalG).toFixed(2);
    calcValor_unidade();
}

function calcPeso() {
    var formulario = document.form_Precifica;
    peso_bruto = eval('formulario.peso_bruto');
    valor_kg = eval('formulario.valor_kg');
    if (peso_bruto.value === '') {
        peso_bruto.value = 0;
    } else if (!ehFloat(peso_bruto.value)) {
        peso_bruto.value = 0;
    }
    if (valor_kg.value === '') {
        valor_kg.value = 0;
    } else if (!ehFloat(valor_kg.value)) {
        valor_kg.value = 0;
    }
    valor_peso = eval('formulario.valor_peso');
    resumoPeso = eval('formulario.resumoPeso');
    valor_peso.value = (getMoney(peso_bruto) * getMoney(valor_kg) / 10000).toFixed(2);
    resumoPeso.value = (getMoney(peso_bruto) * getMoney(valor_kg) / 10000).toFixed(2);
    calcValor_unidade();
}

function calcServExterno() {
    var formulario = document.form_Precifica;
    valor_peso = 0;
    transporte = eval('formulario.transporte');
    servico = eval('formulario.servico');
    if (transporte.value === '') {
        transporte.value = 0;
    } else if (!ehFloat(transporte.value)) {
        transporte.value = 0;
    }
    if (servico.value === '') {
        servico.value = 0;
    } else if (!ehFloat(servico.value)) {
        servico.value = 0;
    }
    total_servico = eval('formulario.total_servico');
    resumoServ = eval('formulario.resumoServ');
    total_servico.value = (getMoney(transporte) / 100 + getMoney(servico) / 100).toFixed(2);
    resumoServ.value = (getMoney(transporte) / 100 + getMoney(servico) / 100).toFixed(2);
    calcValor_unidade();
}

function calcImposto() {
    var formulario = document.form_Precifica;
    imposto = eval('formulario.imposto');
    resumoParc = eval('formulario.resumoParc');
    valorImposto = eval('formulario.valorImposto');
    if (imposto.value === '') {
        imposto.value = 0;
    } else if (!ehFloat(imposto.value)) {
        imposto.value = 0;
    }
    valorImposto.value = (getMoney(resumoParc) * getMoney(imposto) / 1000000).toFixed(2);
    calcValor_unidade();
}
function calcValor_unidade() {
    var formulario = document.form_Precifica;
    resumoFund = eval('formulario.resumoFund');
    resumoOfic = eval('formulario.resumoOfic');
    resumoAlmo = eval('formulario.resumoAlmo');
    resumoPeso = eval('formulario.resumoPeso');
    resumoServ = eval('formulario.resumoServ');
    resumoParc = eval('formulario.resumoParc');
    imposto = eval('formulario.imposto');
    valorImposto = eval('formulario.valorImposto');
    valor_unidade = eval('formulario.valor_unidade');
    valor_unid = eval('formulario.valor_unid');

    resumoParc.value = ((getMoney(resumoFund) + getMoney(resumoOfic) + getMoney(resumoAlmo) + getMoney(resumoPeso) + getMoney(resumoServ)) / 100).toFixed(2);
    valorImposto.value = (getMoney(resumoParc) * getMoney(imposto) / 1000000).toFixed(2);
    resumoParc = eval('formulario.resumoParc');
    valorImposto = eval('formulario.valorImposto');
    valor_unidade.value = ((getMoney(valorImposto) + getMoney(resumoParc))/100).toFixed(2);
    valor_unid.value = ((getMoney(valorImposto) + getMoney(resumoParc))/100).toFixed(2);
}

