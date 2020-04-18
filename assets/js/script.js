/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 brdocs = {
	/**
	* Enum com opções do validador
	* @readonly
	* @enum {number}
	*/
	cpfcnpj: { "CPF": 1, "CNPJ": 2, "AMBOS": 3 },
	
	/**
	 * Função que valida CPF e CNPJ de uma só vez.
	 * O Documento a ser validado depende apenas da quantidade de dígitos
	 * 11 é aceito como CPF, 14 como CNPJ..
	 * @param {string} value - Número do CPF ou CNPJ a ser validado.
	 * @param {Element} element - Elemento HTML onde o valor se encontra.
	 * @param {Object} [params=3] params - pametros do validador definidos 
	 *			pelo enum brdocs.cpfcnpj, default assume AMBOS 
	 * @returns {boolean} se o documento é válido
	 */
	cpfcnpjValidator: function (value, element, params) {
		//params = (typeof params === 'undefined' || (typeof params === 'boolean' && params) ) ? brdocs.cpfcnpj.AMBOS : params;
		value = value.replace(/[^\d]+/g, ''); //Remove todos os cacteres que exceto [0-9]
		var isCNPJ = false;
		
		if (value.length != 11 && value.length != 14) return false;
		
		switch(params){
			case brdocs.cpfcnpj.CPF:
				if (value.length != 11) return false;
				isCNPJ = false;
				break;
			case brdocs.cpfcnpj.CNPJ:
				if (value.length != 14) return false;
				isCNPJ = true;
				break;
			default:
				isCNPJ = (value.length === 14)
				break;
		}
		
		if (/^(\d)\1+$/.test(value)) return false; //falso se se todos os digitos forem iguais, os digitos verificadores estão corretos, mas o documento não é válido.
	
		if (brdocs.calculaDigito(value, value.length-3, isCNPJ) != parseInt(value.charAt(value.length-2))) return false;
		if (brdocs.calculaDigito(value, value.length-2, isCNPJ) != parseInt(value.charAt(value.length-1))) return false;
		
		return true;
	},
	/**
	* Função que valida 1 dígito verificador, lembrando que
	* esta função não vai checar se o documento tem tamanho 
	* documento está correto, vai apenas calcular o dígito.
	* A única diferença nos algoritimos de CPF e CNPJ é que o 
	* multiplicador deve voltar a 2 quando passar de 9 no caso
	* do cnpj, ao contrário do CPF que multiplicador máximo é 
	* quantidade de caracteres no processo de soma + 2.
	*  
	* @param {string} doc - Número do documento CPF ou CNPJ a ser validado (somente números).
	* @param {number} start [start=doc.length-1] - Indice do char em doc por onde o iteração do cálculo deve iniciar 
	* 	(útil quando a string doc não foi separada previamento dos dígitos verificadores).
	* @param {boolean} [isCNPJ=false] - Se documento deve ser tratado como CPF, se omitido é tratado como falso.
	* @returns {number} valor calculado do digito.
	*/
	calculaDigito: function(doc, start, isCNPJ) {
		if(doc.length === 0) return false;
		
		start = (typeof start === 'undefined') ? doc.length-1 : start;
	 
		if(start >= doc.length)
			return false;
		
		if(isNaN(doc))
			return false;
			
		isCNPJ = (typeof isCNPJ === 'undefined') ? false : isCNPJ;
		
		var add = 0
		var multi = 2;
		
		for (i = start; i >= 0; i--) {            
			add += parseInt(doc.charAt(i)) * multi++
			if (isCNPJ && multi > 9) multi = 2;
		}
		var resultado = 11 - add % 11;
	 
		return resultado < 9 ? resultado : 0;;
	}
};
if (Object.freeze) { Object.freeze(brdocs); }
 
 function validarCPF(cpf) {
  
	cpf = cpf.replace(/[^\d]+/g,'');	
	 if (cpf == '') return true;
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			window.alert("CPF inválido. Tente novamente.");		
	// Valida 1o digito	
	
     add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			window.alert("CPF inválido. Tente novamente.");			
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		window.alert("CPF inválido. Tente novamente.");			
	return true;  
        
        alert('');
        
}
 
 //valida o CNPJ digitado

    
    // função que vai estilizar o input com as características de um input com erro
function setError(){
    // define qual elemento será marcado com o erro
    var element = document.getElementById('cnpj');
    // remove a classe de sucesso e adiciona a class de erro
    element.className = element.className.replace('success', '')+' error';
    
    // verifica se já existe um elemento small com o erro do cnpj
    var error_element = document.getElementById('cnpj-error');
    if(error_element == null){
    // adiciona um elemento small depois do input com a mensagem de erro
    element.insertAdjacentHTML('afterend', '<small id="cnpj-error" class="erroralert alert-danger">CNPJ Inválido</br></div>');
}
}

// função que vai estilizar o input com as características de um input com acerto
function setSuccess(){
    // define qual elemento será marcado com o erro
    element = document.getElementById('cnpj');
    // remove a class de erro, se existir e adiciona a classe de sucesso
    element.className = element.className.replace('error', '')+' success';
    // verifica se já existe um elemento small com o erro do cnpj
    var error_element = document.getElementById('cnpj-error');
    if(error_element){
        error_element.parentNode.removeChild(error_element);
    }
}

function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/\D/g,'');
if(cnpj == '') return true;
    if(
        
        cnpj.length != 14 ||
        // Elimina CNPJs invalidos conhecidos
        cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999"){

        // dispara a função que define o erro
    setError();
        // encerra a validação
        return false;
    }

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;        
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
        	soma += numeros.charAt(tamanho - i) * pos--;
        	if (pos < 2)
        		pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)){
        	// dispara a função que define o erro
            setError();
        // encerra a validação
        return false;
    }

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
       soma += numeros.charAt(tamanho - i) * pos--;
       if (pos < 2)
          pos = 9;
  }
  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
  if (resultado != digitos.charAt(1)){
    // dispara a função que define o erro
    setError();
        // encerra a validação
        return false;
    }

    setSuccess();
    return true;

}



function cadastrarRamo() {
    $('#modaltiporamo').modal('toggle');
    $.ajax({
        url: 'ajax',
        type: 'POST',
        data: {},
        success: function (html) {
        
            $('#modaltiporamo').find('.modal-body').html(html);
              
            $('#modaltiporamo').find('form').on('submit', function (e) {
                 
                e.preventDefault();
   
                var nome = $(this).find('input[name=ramo]').val(); 
                var str = "";
              
                $.ajax({
                    url: 'ajax/cadastrarRamo',
                    type: 'POST',
                    data: {nome: nome},
                    
                    success: function () {
                   $.ajax({

        url: 'ajax/CarregaRamo',
        datatype: 'json',
        contentType: 'application/json; charset=utf-8',
        type: 'POST',
      
        success: function (data) {

// Adiciona a primeira linha.
$("#tipo_categoria").children('option:not(:first)').remove();

tiposramos = JSON.parse(data);

// Adiciona as demais linhas (dinâmico).
$.each(tiposramos, function(id, ramo) {
$("#tipo_categoria").append($('<option>', {
value: ramo.id_ramo,
text: ramo.nome
}));
});



            
            $('#modaltiporamo').modal('hide');
        },
        error: function (error) {
        }
    })
      
 
                    },//sucess
                    error: function(){
                        alert('Não foi possivel cadastrar!');
                         $('#modaltiporamo').modal('hide');
                    }
                });// ajax



            }); //function submit
           

        }
    });
}


function cadastrarBairro() {
    $('#modalbairro').modal('toggle');
    $.ajax({
        url: 'ajax_bairro',
        type: 'POST',
        data: {},
        success: function (html) {
        
            $('#modalbairro').find('.modal-body').html(html);
              
            $('#modalbairro').find('form').on('submit', function (e) {
                 
                e.preventDefault();
   
                var nome = $(this).find('input[name=bairro]').val(); 
                var str = "";
              
                $.ajax({
                    url: 'ajax_bairro/cadastrarBairro',
                    type: 'POST',
                    data: {nome: nome},
                    
                    success: function () {
                   $.ajax({

        url: 'ajax_bairro/CarregaBairro',
        datatype: 'json',
        contentType: 'application/json; charset=utf-8',
        type: 'POST',
      
        success: function (data) {

$("#bairro").children('option:not(:first)').remove();
listabairros = JSON.parse(data);

// Adiciona as demais linhas (dinâmico).
$.each(listabairros, function(id,bairro) {
$("#bairro").append($('<option>', {
value: bairro.id_bairro,
text: bairro.bairro_nome
}));
});



            
            $('#modalbairro').modal('hide');
        },
        error: function (error) {
        }
    });
      
 
                    },//sucess
                    error: function(){
                        alert('Não foi possivel cadastrar!');
                         $('#modalbairro').modal('hide');
                    }
                });// ajax



            }); //function submit
           

        }
    });
}

function tenhointeresseeditar(id_interessado) {
    $('#Modalvenda').modal('toggle');
    $.ajax({
        url: 'tenhointeressado',
        type: 'POST',
        data: {id_interessado: id_interessado},
        success: function (html) {
            $('#Modalvenda').find('.modal-body').html(html);
            $('#Modalvenda').find('.modal-body').find('form').on('submit', function (e) {
                e.preventDefault();

                var nome = $(this).find('input[name=nome]').val();

                var email = $(this).find('input[name=email]').val();

                var telefone = $(this).find('input[name=telefone]').val();

                var celular = $(this).find('input[name=celular]').val();

                var id_tipo_assunto = $(this).find('select[name=id_tipo_assunto]').val();

                var id_imovel = $(this).find('input[name=id_imovel]').val();

                var id_tipo_imovel = $(this).find('input[name=id_tipo_imovel]').val();

                var status = $(this).find('input[name=status]').val();
                
                var id_tipo_negociacao = $(this).find('select[name=id_tipo_negociacao]').val();

                var id_interessado = $(this).find('input[name=id_interessado]').val();

                $.ajax({
                    url: 'editartenhointeressado',
                    type: 'POST',
                    data: {nome: nome, email: email, telefone: telefone, celular: celular, id_tipo_assunto: id_tipo_assunto, id_imovel: id_imovel, id_tipo_imovel: id_tipo_imovel, status: status, id_tipo_negociacao:id_tipo_negociacao, id_interessado: id_interessado},
                    success: function () {
                        alert('Alterado com sucesso!');
                     window.location.href=window.location.href;

                    }
                });



            });
            

        }
    });
}

function excluir(id){
     $('#Modalvenda').find('.modal-body').html('Tem certeza que deseja excluir?</br> <button onclick="excluir_interessado('+id+')">Sim </button> <button onclick="fechar()"> Não</button>');
     $('#Modalvenda').modal('toggle');
}

function fechar(){
      $('#Modalvenda').modal('hide');
}

function excluir_interessado(id_interessado){
       $.ajax({
                    url: 'deletartenhointeressado',
                    type: 'POST',
                    data: { id_interessado: id_interessado},
                    success: function () {
                        alert('Excluido com sucesso!');
                     window.location.href=window.location.href;

                    }
                });
}

function excluiranuncio(id,url_foto_principal,codigo){
     $('#Modalexcluir').find('.modal-body').html('<div class="row h4" id="button_excluir">Codigo:'+codigo+'</div><div class="row" id="button_excluir"><img src="upload/fotos_principais/'+url_foto_principal+'" height="100" width="100" class="img-rounded "></div><div class="row" id="button_excluir"><button type="button" class="btn btn-primary" onclick="excluir_anuncio('+id+')">Sim </button> <button type="button" class="btn btn-primary" onclick="fecharanuncio()"> Não</button> </div>');
    
    $('#Modalexcluir').modal('toggle');
}

function excluir_anuncio(id){
    
    $.ajax({
                    url: 'deletarimovel',
                    type: 'GET',
                    data: { id: id},
                    success: function () {
                    
                     window.location.href=window.location.href;
    alert('Excluido com sucesso!');
                    }
                });
}
function fecharanuncio(){
      $('#Modalexcluir').modal('hide');
}


function tenhointeresse(id) {
    $('#Modalvenda').modal('toggle');
    $.ajax({
        url: 'tenhointeresse',
        type: 'POST',
        data: {id: id},
        success: function (html) {
             
            $('#Modalvenda').find('.modal-body').html(html);
            $('#Modalvenda').find('.modal-body').find('form').on('submit', function (e) {
             
                e.preventDefault();
    
                var nome = $(this).find('input[name=nome]').val(); 
                alert('variavel');
                
                var email = $(this).find('input[name=email]').val();
                var telefone = $(this).find('input[name=fonefixo]').val();
                var celular = $(this).find('input[name=fone]').val();
                var id_tipo_assunto = $(this).find('input[name=id_tipo_assunto]').val();
                 var tipo_assunto = $(this).find('input[name=tipo_assunto]').val();
                var id_imovel = $(this).find('input[name=id_imovel]').val();
                var id_tipo_imovel = $(this).find('input[name=id_tipo_imovel]').val();
                 var tipo_imovel = $(this).find('input[name=tipo_imovel]').val();
                
                    
                $.ajax({
                    url: 'cadastrartenhointeresse',
                    type: 'POST',
                    data: {nome: nome, email: email, telefone: telefone, celular: celular, id_tipo_assunto: id_tipo_assunto,tipo_assunto: tipo_assunto, id_imovel: id_imovel, id_tipo_imovel: id_tipo_imovel, tipo_imovel:tipo_imovel},
                    success: function () {
                        
                       alert('Cadastrado com Sucesso!');
                     $('#Modalvenda').modal('hide');

                    }
                });



            });
           

        }
    });
}

function tenhointeresseeditar(id_interessado) {
    $('#Modalvenda').modal('toggle');
    $.ajax({
        url: 'tenhointeressado',
        type: 'POST',
        data: {id_interessado: id_interessado},
        success: function (html) {
            $('#Modalvenda').find('.modal-body').html(html);
            $('#Modalvenda').find('.modal-body').find('form').on('submit', function (e) {
                e.preventDefault();

                var nome = $(this).find('input[name=nome]').val();

                var email = $(this).find('input[name=email]').val();

                var telefone = $(this).find('input[name=telefone]').val();

                var celular = $(this).find('input[name=celular]').val();

                var id_tipo_assunto = $(this).find('select[name=id_tipo_assunto]').val();

                var id_imovel = $(this).find('input[name=id_imovel]').val();

                var id_tipo_imovel = $(this).find('input[name=id_tipo_imovel]').val();

                var status = $(this).find('input[name=status]').val();
                
                var id_tipo_negociacao = $(this).find('select[name=id_tipo_negociacao]').val();

                var id_interessado = $(this).find('input[name=id_interessado]').val();

                $.ajax({
                    url: 'editartenhointeressado',
                    type: 'POST',
                    data: {nome: nome, email: email, telefone: telefone, celular: celular, id_tipo_assunto: id_tipo_assunto, id_imovel: id_imovel, id_tipo_imovel: id_tipo_imovel, status: status, id_tipo_negociacao:id_tipo_negociacao, id_interessado: id_interessado},
                    success: function () {
                        alert('Alterado com sucesso!');
                     window.location.href=window.location.href;

                    }
                });



            });
            

        }
    });
}

function excluir(id){
     $('#Modalvenda').find('.modal-body').html('Tem certeza que deseja excluir?</br> <button onclick="excluir_interessado('+id+')">Sim </button> <button onclick="fechar()"> Não</button>');
     $('#Modalvenda').modal('toggle');
}

function fechar(){
      $('#Modalvenda').modal('hide');
}

function excluir_interessado(id_interessado){
       $.ajax({
                    url: 'deletartenhointeressado',
                    type: 'POST',
                    data: { id_interessado: id_interessado},
                    success: function () {
                        alert('Excluido com sucesso!');
                     window.location.href=window.location.href;

                    }
                });
}
