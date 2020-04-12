

$(function () {
    $('#cpf').mask('000.000.000-00', {reverse: true});


    $('#cep').mask('00.000-000');
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
    $('#valor2').mask('000.000.000.000.000,00', {reverse: true});
    $('#metro').mask('000.000,00', {reverse: true});
    $('#metro2').mask('000.000,00', {reverse: true});
    $('#celular').mask('(00) 00000-0000');
    $('#telefone').mask('(00) 0000-0000');
    $('#cnpj').mask('00.000.000/0000-00');
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

  $('#tel').mask(SPMaskBehavior, spOptions);
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('#cpfOuCnpj').length > 11 ? $('#cpfOuCnpj').mask('00.000.000/0000-00', options) : $('#cpfOuCnpj').mask('000.000.000-00#', options);
});

$(document).ready(function () {

    $('#login').validate({

        rules: {
            email: {required: true, isString: true},
            email: true,
            senha: "required"




        },
        messages: {

        }
    });

    $('#cadastrarusuarios').validate({

        rules: {
            nome: {required: true, isString: true},
            email: true,
            telefone: "required",
            senha: "required",

            resenha: {equalTo: "#senha"}



        },
        messages: {

        }
    });
    $('#cadastrarclientes').validate({

        rules: {
//            cpf:{required:true,cpfBR:true},
            nome: {required: true},
            telefone: "required",
            email: "required",
            email: true


        },
        messages: {

        }
    });


    $('#cadastrarusuarios').validate({

        rules: {
            cpf: {required: true, cpfBR: true},
            nome: {required: true, isString: true},
            telefone: "required",
            email: true


        },
        messages: {

        }
    });
    $.validator.addMethod("cpfcnpj", brdocs.cpfcnpjValidator, "Informe um documento válido.");
    $('#cadastrarloja').validate({

        rules: {

            anuncio_site: {required: true},
            endereco: {required: true},
            tipo_categoria: "required",
            bairro: {required: true, isString: true},
            cidade: {required: true, isString: true},
            whatsapp1: "required",
//            descricao: "required",
            funcionamento: "required",
            //Mesmo campo para ambos os documentos
            cpfcnpj: "cpfcnpj",
            cpfcnpj2: {
                cpfcnpj: brdocs.cpfcnpj.AMBOS
            }

        },

        messages: {

        }
    });

    $('#cadastrarinquilino').validate({

        rules: {
            cpf: {required: true, cpfBR: true},
            nome: {required: true, isString: true},
            telefone: "required",
            email: true


        },
        messages: {

        }
    });


    $('#tenhointeresse').validate({

        rules: {
            nome: {required: true, isString: true},
            email: true,
            fone: "required",
            telefone: "required",
            celular: {required: true}



        },
        messages: {

        }
    });

    $('#editarcliente').validate({

        rules: {
            cpf: {required: true, cpfBR: true},
            nome: {required: true, isString: true},
            celular: "required",
            email: true


        },
        messages: {

        }
    });

    $('#editarfiador').validate({

        rules: {
            cpf: {required: true, cpfBR: true},
            nome: {required: true, isString: true},
            telefone: "required",
            email: true


        },
        messages: {

        }
    });

    $('#editarimovel').validate({

        rules: {
            status: "required",
            tipovia: {required: true},
            endereco: {required: true, isString: true},
            numero: "required",
            bairro: {required: true, isString: true},
            cidade: {required: true, isString: true},
            estado: {required: true},
            id_tipo_imovel: "required",
            id_tipo_assunto: "required"



        },
        messages: {

        }
    });




    $('#perfil').validate({

        rules: {
            nome: {required: true, isString: true},
            email: true,
            telefone: "required",
            creci: "required",

            resenha: {equalTo: "#senha"}



        },
        messages: {

        }
    });

    $('#cadastrarcontato').validate({

        rules: {
            celular: {required: true},
            nome: {required: true, isString: true},
            assunto: "required",
            tipoimovel: "required",
            email: {email: true}


        },
        messages: {

        }
    });
});
