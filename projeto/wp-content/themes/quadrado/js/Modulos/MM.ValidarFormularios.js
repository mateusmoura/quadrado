/**
* Funcionalidade responsável por fazer as validações dos formulários.
* @author: Mateus Moura
* @Version: 1.0
*/

Module('MM.ValidarFormularios', function(ValidarFormularios){
	ValidarFormularios.fn.initialize = function($form, $settings, $callfn){
		this.formulario = $form;
		this.settings = $settings;
		this.call = $callfn;

		//this.config();
		//this.setValidar();
		this.loadScripts();
	};
	/**
	* Carregar Scripts necessários para funcionalidade.
	*/
	ValidarFormularios.fn.loadScripts = function(){
		var _this = this;

		jQuery.ajaxSetup({
			cache: true
		});

		if( $.validator === undefined ){
			$.when(
				$.getScript(base_url + "js/plugins/jQuery.validate.js"),
				$.getScript(base_url + "js/plugins/jQuery.form.js"),
				$.Deferred(function(deferred){
					$(deferred.resolve)
				})
			).done(function(){
				_this.config();
			}).fail(function() {
				console.log('Erro getScript')
			});
		} else{
			_this.config();
		}
	};
	/**
	* Adiciona novos métodos ao plugins de validação.
	*/
	ValidarFormularios.fn.metodos  = function(){
		jQuery.validator.addMethod("ignoremask", function(value, element) {
			var $elem = $(element);

			if( value == $elem.data().mask ) return false;

			return true;
		}, "Este campo é obrigatório.");

		jQuery.validator.addMethod("cpf", function(value, element) {
			value = jQuery.trim(value);
			
			value = value.replace('.','');
			value = value.replace('.','');
			cpf = value.replace('-','');
			while(cpf.length < 11) cpf = "0"+ cpf;
			var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/,
				a = [],
				b = new Number,
				c = 11;

			for (i=0; i<11; i++){
				a[i] = cpf.charAt(i);
				if (i < 9) b += (a[i] * --c);
			}
			if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
			b = 0;
			c = 11;
			for (y=0; y<10; y++) b += (a[y] * c--);
			if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
			
			var retorno = true;
			if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
			
			return this.optional(element) || retorno;
		}, "Informe um CPF válido.");

		jQuery.validator.addMethod("dateBR", function(value, element) {
			if(value.length!=10) return false;

			var data        = value,
				dia         = data.substr(0,2),
				barra1      = data.substr(2,1),
				mes         = data.substr(3,2),
				barra2      = data.substr(5,1),
				ano         = data.substr(6,4);

			if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
			if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
			if(mes==2   &&  (dia>29||(dia==29 && ano%4!=0)))return false;
			if(ano < 1900 )return false;
			return true;
		}, "Informe uma data válida");

		jQuery.validator.addMethod("dateBR14", function(value, element) {
			if(value.length!=10) return false;

			var data        = value,
				dia         = data.substr(0,2),
				barra1      = data.substr(2,1),
				mes         = data.substr(3,2),
				barra2      = data.substr(5,1),
				ano         = data.substr(6,4);

			if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
			if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
			if(mes==2   &&  (dia>29||(dia==29 && ano%4!=0)))return false;
			if(ano < 1900 || ano > 1998 )return false;
			return true;
		}, "Informe uma data válida");

		jQuery.validator.addMethod("cnpj", function(cnpj, element) {
			cnpj = jQuery.trim(cnpj);
			
			cnpj = cnpj.replace('/','');
			cnpj = cnpj.replace('.','');
			cnpj = cnpj.replace('.','');
			cnpj = cnpj.replace('-','');

			var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
			digitos_iguais = 1;

			if (cnpj.length < 14 && cnpj.length < 15){
				return this.optional(element) || false;
			}
			for (i = 0; i < cnpj.length - 1; i++){
				if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
				 digitos_iguais = 0;
				 break;
				}
			}

			if (!digitos_iguais){
				tamanho = cnpj.length - 2
				numeros = cnpj.substring(0,tamanho);
				digitos = cnpj.substring(tamanho);
				soma = 0;
				pos = tamanho - 7;

				for (i = tamanho; i >= 1; i--){
				 soma += numeros.charAt(tamanho - i) * pos--;
				 if (pos < 2){
					pos = 9;
				 }
				}
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
				if (resultado != digitos.charAt(0)){
				 return this.optional(element) || false;
				}
				tamanho = tamanho + 1;
				numeros = cnpj.substring(0,tamanho);
				soma = 0;
				pos = tamanho - 7;
				for (i = tamanho; i >= 1; i--){
				 soma += numeros.charAt(tamanho - i) * pos--;
				 if (pos < 2){
					pos = 9;
				 }
				}
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
				if (resultado != digitos.charAt(1)){
				 return this.optional(element) || false;
				}
				return this.optional(element) || true;
			}else{
				return this.optional(element) || false;
			}
		}, "Informe um CNPJ válido.");
	};
	/**
	* Configuração do plugin para fazer as validações.
	*/
	ValidarFormularios.fn.config = function(){
		var _this = this;

		this.metodos();

		this.defaults = {
			errorClass: "erro",
			validClass: "validado",
			errorElement: "div",
			ignore: '.noValidate',
			rules: {},
			messages: {
				required: "Este campo é obrigatório.",
				// remote: "Please fix this field.",
				email: "Digite um e-mail válido.",
				// url: "Please enter a valid URL.",
				date: "Digite uma data válida.",
				dateISO: "Digite uma data válida (ISO).",
				number: "Digite uma quantidade válida.",
				// digits: "Please enter only digits.",
				// creditcard: "Please enter a valid credit card number.",
				equalTo: "Por favor insira o mesmo valor da {0}.",
				// maxlength: $.validator.format("Please enter no more than {0} characters."),
				minlength: $.validator.format("Por favor, senha deve conter no mínimo {0} caracteres."),
				// rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
				// range: $.validator.format("Please enter a value between {0} and {1}."),
				// max: $.validator.format("Please enter a value less than or equal to {0}."),
				min: $.validator.format("Por favor informe um valor igual ou maior que {0}.")
			},
			errorPlacement: function(error, element){
				var _maskValue = element.data().mask;

				error.css('top', element[0].offsetTop).hide().insertAfter(element);

				console.log(element);

				if( element.val() === "" || element.val() === _maskValue ){
					element.removeClass("erro").addClass("verificar");
					element.parent().addClass('verificando');
				} else{
					element.add(error).removeClass("verificar");
					element.parent().removeClass('verificando');
				}
			},
			submitHandler: function(forms){
				$("div.verificar", _this.formulario).removeClass("verificar"); // Verificar se ainda está usando essa classe VERIFY

				if(_this.formulario.data('ajax')){
					// $(forms).ajaxSubmit({
					// 	dataType: 'json',
					// 	error: function(a, b, c){
					// 		//console.log("ERROR:", a, b, c)
					// 	},
					// 	success: function(resp){
					// 		//console.log( "RESPONSE: ", resp );
					// 		_this.call != undefined && _this.call(_this.formulario);
					// 	}
					// });

					var resposta = '<div class="view view-preenchida">\
						<div class="linha separar">\
							<div class="col-11">\
								<h1 class="h2-form"><i class="bullet bullet-num borda-cinza"><i class="icon icon-correto"></i></i> Informações gerais</h1>\
								<div class="linha paddedx2">\
									<div class="col-12">\
										<p class="inline">Tipo de cadastro: <span>Pessoa Física</span></p>\
										<p class="inline padded">Nome: <span>Mateus das Chagas Moura</span></p>\
										<p class="inline padded">Sexo: <span>Masculino</span></p>\
										<p class="inline padded">Profissão/Cargo: <span>Desenvolvedor Front-End</span></p>\
										<p class="inline padded">CPF: <span>014.448.871-06</span></p>\
									</div>\
								</div>\
							</div>\
							<div class="col-1">\
								<a href="#this" class="cor-verde2 btn-editarView">Editar</a>\
							</div>\
						</div>\
					</div>'

					_this.call != undefined && site[_this.call](_this.formulario, resposta)//_this.call(_this.formulario);
				}else{
					forms.submit();
				}
			},
			showErrors: function(errors){
				var $elem = this.currentElements;

				if( !$elem.siblings('div.erro').length ){
					$elem.parent().siblings('div.erro').css('top', $elem[0].offsetParent.offsetTop);
				}

				this.defaultShowErrors();

				for (var i = $elem.length - 1; i >= 0; i--) {
					if( $( $elem[i] ).hasClass("validado") ){
						$elem.removeClass('verificar').parent().addClass('validado').removeClass('verificando');
					}
					$( $elem[i] ).hasClass("erro") && $elem.parent().removeClass('validado');
				};
			}
		},
		this.settings = $.extend({}, this.defaults, this.settings||{});

		this.setValidar();
	};
	/**
	* Inicia a validação nos formulário(s) passado como parametro.
	*/
	ValidarFormularios.fn.setValidar = function(){
		var _this = this;

		for (var i = _this.formulario.length - 1; i >= 0; i--) {
			_this.formulario.eq(i).validate(
				_this.settings
			);
		};
	};
});