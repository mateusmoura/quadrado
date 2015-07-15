Actions.fn.extend({
	util: {
		/**
		* MÁSCARA DOS INPUTS OBS: precisa do arquivo javascript: jQuery.maskinput.js
		* @author: Mateus Moura
		*/
		mask: function(){
			$("input")
				.filter('.mask-cnpj').mask('99.999.999/9999-99').data("mask", "__.___.___/____-__").end()
				.filter('.mask-cpf').mask('999.999.999-99').data("mask", "___.___.___-__").end()
				.filter('.mask-cep').mask('99.999-999').data("mask", "__.___-___").end()
				.filter('.mask-data').mask('99/99/9999').data("mask", "__/__/____").end()
				.filter('.mask-real').maskMoney({thousands:'.', decimal:','}).end()
				.filter('.mask-telefone').focusout(function(){
					var phone, element;
					element = $(this);
					element.unmask();
					phone = element.val().replace(/\D/g, '');
					if(phone.length > 10) {
						element.mask("(99) 99999-999?9").data("mask", "(__) ____-_____");
					} else {
						element.mask("(99) 9999-9999?9").data("mask", "(__) ____-_____");
					}
				}).trigger('focusout').end();
		},
		/**
		* FUNCIONALIDADE DE TROCA DE ABAS
		* @author: Mateus Moura
		*/
		abas: function($div){
			var _nav = $('nav', $div),
				_grupo = $('div.grupo', $div),
				_indiceAtivo = [],
				_z = 10;

			$('a:first', _nav).addClass('ativo').nextAll(':not(":last")').addClass('proximo');
			$('a:last', _nav).addClass('ultimo');

			$('a.proximo', _nav).each(function(){
				$(this).css('z-index', _z);
				_z--;
			})

			_indiceAtivo = $('a', _nav).index($('a.ativo', _nav));

			$($('>div', _grupo)[_indiceAtivo]).fadeIn();

			$('a', _nav).unbind().click(function(){
				var _bt = $(this),
					_indice = $('a', _nav).index(_bt);

				if(_indiceAtivo < _indice){
					$('a.ativo', _nav).removeClass('ativo').addClass('anterior');
				} else if( _indiceAtivo > _indice ){
					$('a.ativo:not(".ultimo")', _nav).addClass('proximo');
					$('a.ativo', _nav).removeClass('ativo')
				}
				
				if(_bt.hasClass('ultimo')){
					_bt.addClass('ativo').removeClass('anterior proximo');
					_bt.prevAll().removeClass('proximo').addClass('anterior');
				}else{
					_bt.addClass('ativo').removeClass('anterior proximo');
					_bt.next(':not(".ultimo")').addClass('proximo');
				}

				_indiceAtivo = _indice;

				$('>div:visible', _grupo).fadeOut(function(){
					$($('>div', _grupo)[_indice]).fadeIn();
				});

				return false;
			});
		},
		/**
		* FUNCIONALIDADE DO INPUT RADIO CUSTOMIZADO.
		* @author: Mateus Moura
		*/
		radio: function(){
			$('input[type=radio]').each(function(){
				var _inp = $(this);
				if(_inp.is(':checked')){
					_inp.siblings('i').removeClass('selecao').addClass('selecionado');
				}
			}).change(function(){
				var _inp = $(this);
				
				$('input[name=' + _inp.attr('name') + ']').siblings('i').removeClass('selecionado').addClass('selecao');
				_inp.siblings('i').removeClass('selecao').addClass('selecionado');
			});
		},
		/**
		* FUNCIONALIDADE DO INPUT CHECKBOX ou RADIOS CUSTOMIZADO.
		* @author: Mateus Moura
		*/
		customizarChecks: {
			iniciar: function(){
				var _this = this;

				$('.checkbox input[type=checkbox]').each(function(){
					_this.construir(this);
				});
			},

			construir: function($input){
				var _div = $('<div class="custom-checks"></div>');

				_div.insertAfter($($input));
				$($input).appendTo(_div);

				this.acoes($input);
			},

			acoes: function($input){
				$($input).on('click', function(){
					var _inp = $(this);
					
					//_inp.is(':checked') ? _inp.parent().addClass('selecionado') : _inp.parent().removeClass('selecionado');

					// Verificar se está funcionando normalmente tanto para Checkbox como para Radio
					if( _inp.is('[type=checkbox]') )
						_inp.is(':checked') ? _inp.parent().addClass('selecionado') : _inp.parent().removeClass('selecionado');
					else{
						$('.selecionado input[name='+ _inp.attr('name') +']').parent().removeClass('selecionado');
						_inp.parent().addClass('selecionado');
					}
				});
			}
		},
		/**
		* FUNCIONALIDADE DO INPUT FILE CUSTOMIZADO.
		* @author: Mateus Moura
		*/
		'file-upload': function(){
			oTalk.modal.on('change', 'input[type=file]', function(a, b, c){
				var _inp = $(this);

				//console.log(_inp.val(), _inp)

				$('body').hasClass('mozilla')
					? $('p', _inp.parent()).text(_inp.val())
					: $('p', _inp.parent()).text(_inp.val().split('fakepath')[1]);
			});
		},
		/**
		* FUNCIONALIDADE DE ABRIR MODAL VIA AJAX
		* @author: Mateus Moura
		*/
		modal: {
			init: function(){
				var _this = this;

				oTalk.overlay = $('#overlay');
				oTalk.modal = $('#modal');

				$('.bt-modal').unbind().click(function(evt){
					if(this.rel != ""){
						oTalk.overlay.fadeIn();
						_this.centerModal(evt, $('div.modal.' + this.rel));
					}else{
						_this.ajaxModal(this.href, evt);
					}

					return false;
				});

				_this.closeModal();
			},

			ajaxModal: function($url, $evt){
				var _this = this;

				$.ajax({
					url: $url,
					cache: true,
					beforeSend: function(){
						oTalk.loading.add(oTalk.overlay).fadeIn();
					},
					error: function(jqXHR, textStatus, errorThrown){
						//console.log( "ERROR: ", jqXHR, textStatus, errorThrown );
						oTalk.loading.add(oTalk.overlay).fadeOut();
					},
					success: function( response ){
						var _fnmodal = $(response).attr('id');
						oTalk.loading.fadeOut();
						$(response).appendTo($('.alinhamento', oTalk.modal));

						_this.centerModal($evt);
						//oTalk.util.radio();
						//oTalk.util.checkbox();

						if($('body').hasClass('ie7') || $('body').hasClass('ie8')){
							$('input[placeholder], textarea[placeholder]', oTalk.modal).placeholder();
						}
						//oTalk.actions[_fnmodal]();
					}
				});
			},

			centerModal: function($evt, $m){
				var $modal = $m != undefined ? $m : oTalk.modal
					_left =  $(window).width() - $modal.width(),
					_top = $evt.pageY / 2;

				_left = _left/2;

				$modal.css({
					left: _left,
					top: _top
				}).fadeIn();

				$("html, body").animate({
					scrollTop: _top
				}, 500 );
			},

			closeModal: function(){
				$('.bt-close', oTalk.modal).add(oTalk.overlay).add($('div.modal .bt-close')).click(function(){
					console.log('click')

					oTalk.modal.add($('div.modal')).fadeOut(function(){
						$('div.alinhamento', oTalk.modal).empty();
						oTalk.overlay.fadeOut();
					});

					return false;
				});
			}
		},
		/**
		* VALIDAR OS FORMULÁRIOS. OBS: precisa do arquivo javascript: jQuery.validade.js
		* @author: Mateus Moura
		*/
		validarFormularios: function($form, settings, _callfn){
			var defaults = {
					errorClass: "error",
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
						equalTo: "Por favor insira o mesmo valor da nova senha.",
						// maxlength: $.validator.format("Please enter no more than {0} characters."),
						minlength: $.validator.format("Por favor, senha deve conter no mínimo {0} caracteres."),
						// rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
						// range: $.validator.format("Please enter a value between {0} and {1}."),
						// max: $.validator.format("Please enter a value less than or equal to {0}."),
						min: $.validator.format("Por favor informe um valor igual ou maior que {0}.")
					},
					errorPlacement: function(error, element){
						var $maskValue = element.data().mask;

						error.hide().insertAfter(element);

						element.val() == "" || element.val() == $maskValue ? element.removeClass("error").parent().addClass("verify") : element.parent().removeClass("verify");
					},
					submitHandler: function(forms){
						//formulario.loading.fadeIn();

						$("div.verify", $form).removeClass("verify"); // Verificar se ainda está usando essa classe VERIFY

						console.log('Formulário OKOKOKOKOK')

						//formulario.nextStep({sucesso: true, completo: false});

						//formulario.loading.fadeOut();

						// $form.ajaxSubmit({
						// 	dataType: 'json',
						// 	error: function(a, b, c){
						// 		console.log("ERROR:", a, b, c);
						// 		formulario.loading.fadeOut();
						// 	},
						// 	success: function(resp){
						// 		resp.sucesso == false
						// 			? alert(resp.mensagem + "")
						// 			: formulario.nextStep(resp);

						// 		formulario.loading.fadeOut();
						// 	}
						// });
					},
					showErrors: function(errors){
						var $elem = this.currentElements;

						this.defaultShowErrors();

						for (var i = $elem.length - 1; i >= 0; i--) {
							$( $elem[i] ).hasClass("valid") && $elem.parent().removeClass("verify").addClass('valid');
							$( $elem[i] ).hasClass("error") && $elem.parent().addClass("verify").removeClass('valid');
						};
					}
				},
				settings = $.extend({}, defaults, settings||{});

			for (var i = $form.length - 1; i >= 0; i--) {
				$($form[i]).validate(
					settings
				);
				_callfn != undefined && _callfn($($form[i]));
			};
		},
		/**
		* Adiciona novos metodos no plugin jQuery.validade.js
		* @author: Mateus Moura
		*/
		metodosAdicionais: function(){
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
		},
		/**
		* FUNCIONALIDADE DE LIMITAR QUANTIDADE DE CARACTERES EM TEXTAREA OU INPUT
		* @author: Mateus Moura
		*/
		limit: function (elem, maxLen) {
			if (!elem.length) {
				return false
			}

			var char = Number(maxLen),
				texto = elem.val(),
				tamanho = texto.length,
				line = texto.replace(/\s+$/g, ""),
				separate = line.split("\n"),
				separateLength = separate.length,
				element = elem.siblings("span.caracteres");

			if (tamanho > char) {
				elem.val(texto.substr(0, char));
			}
			else {
				element.html(char - tamanho + " caracteres restantes");
			}


			elem.keyup(function () {
				var elem = $(this),
					texto = elem.val(),
					tamanho = texto.length,
					line = texto.replace(/\s+$/g, ""),
					separate = line.split("\n"),
					separateLength = separate.length,
					element = elem.siblings("span.caracteres");

				if (tamanho > char) {
					elem.val(texto.substr(0, char));
					return false;
				}
				else {
					element.html(char - tamanho + " caracteres restantes");
					return true;
				}
			}).keypress(function (e) {
				// if (e.keyCode == 13)
				// 	return false;
			});
		},
		/**
		* FUNCIONALIDADE PARA MONSTRAR O NOME DO USUARIOS DOS POST-ITS
		* @author: Mateus Moura
		*/
		tooltip: function(){
			$('p.usuario:not([disabled])').unbind().stop(0,0).hover(function(){
				var _this = $(this);

				_this.find('.tooltip').length
					? _this.find('.tooltip').stop(0,0).fadeIn()
					: $('<div class="tooltip"><p></p></div>"').find('p').text(_this.attr('title')).end().appendTo(_this).stop(0,0).fadeIn().css('margin-left', - ( _this.find('.tooltip').width() / 2) );
			}, function(){
				$(this).find('.tooltip').stop(0,0).fadeOut();
			});
		},
		/**
		* FUNCIONALIDADE PARA MONSTRAR O POP-UP E POSICIONAR
		* @author: Mateus Moura
		*/
		popup: {
			init: function(elem, evt){
				var _elem = $(elem),
					_popup = $('div.popup.' + _elem.attr('rel'));

				_popup.data('event', evt);

				_elem.toggleClass('ativo');

				this.position(_elem, _popup, evt);

				_popup.fadeToggle();

				this.close(_popup);
			},

			position: function($elem, $popup, $evt){
				var _nt = "",
					$evt = $evt !== undefined ? $evt : $popup.data('event');

				if( $popup.hasClass('esquerda') && !$popup.hasClass('config') ){
					//_nt = $(window).width() - ($elem.offset().left + (($evt.currentTarget.clientWidth + 25) / 2))
					console.log($elem.offset().left);
					_nt = $elem.offset().left + ($evt.currentTarget.clientWidth / 2);

					$popup.css({
						left: _nt - ( (($popup.width()+20)*10)/100 ),
						top: $evt.pageY - ($popup.height() + 70 + $evt.offsetY)
					}).addClass('config');
				} else if( $popup.hasClass('direita') && !$popup.hasClass('config') ){
					//_nt = $(window).width() - ($elem.offset().left + (($evt.currentTarget.clientWidth + 25) / 2))
					_nt = $elem.offset().left + ($evt.currentTarget.clientWidth / 2);

					$popup.css({
						left: _nt - ((($popup.width() + 20 )*90)/100 ),
						top: $evt.pageY - ($popup.height() + 70 + $evt.offsetY)
					}).addClass('config');
				} else if( !$popup.hasClass('config') ){
					//_nt = $(window).width() - ($elem.offset().left + (($evt.currentTarget.clientWidth + 40) / 2));
					console.log($elem, $elem.offset().left);
					_nt = $elem.offset().left + ($evt.currentTarget.clientWidth / 2);

					$popup.css({
						left: _nt - ( ( $popup.width() + 20 ) / 2 ),
						top: $evt.pageY - ($popup.height() + 70 + $evt.offsetY)
					}).addClass('config');
				}
			},

			close: function($popup){
				$("body").unbind().on("click",function(e) {
					if( !$(e.target).parents('.popup').length && !$(e.target).hasClass('popup') ){
						$popup.fadeOut().removeClass('config');
					}
				});
			}
		},
		/**
		* FUNCIONALIDADE RESPONSÁVEL POR INICIAR O DATEPICKER NO FORMULÁRIO
		* @author: Mateus Moura
		*/
		datepicker: function(){
			$('.datepicker').datepicker({
				dateFormat: 'dd/mm/yy',
				showOtherMonths: true,
				changeMonth: false,
				changeYear: false,
				dayNames: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
				dayNamesMin: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
				dayNamesShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' ],
				monthNames: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
				monthNamesShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ]
			});
		},
		/**
		* FUNCIONALIDADE RESPONSÁVEL POR PERGUNTAR SE A PÁGINA PODE SER FECHADA.
		* @author: Mateus Moura
		*/
		alterado: false,
		verificarFechamento: function(){
			
			if( oTalk.util.alterado ){
				return "Todos os dados serão perdidos!";
			}
		}
	}
});

/**
* Mensagem Personalizada
*
* @ return false
* @ Mateus Moura
*/
(function () {
	var $ = jQuery;
	window.Message = { show: show, init: init };

	var htmlRef = null;

	function init() {
		htmlRef = jQuery("<div class='message' style='background-color:#ffffff; border:5px solid #b2cd5f; display:none; left:50%; margin-left:-245px; padding:20px; position:fixed; top:50%; width:450px; z-index:10000;'><h3 style='font-size: 1.9em;'></h3><p style='color:#535353; display:block; font-size:1.4em; line-height:1.3em; text-align:center;'></p></div>").appendTo('body');
	};

	function show(title, message, type) {
		type = type == null ? "" : type;
		htmlRef.fadeIn('slow');
		htmlRef.attr("class", "message " + type);
		htmlRef.find("h3").html(title);
		htmlRef.find("p").html(message);

		if (jQuery.browser.msie && jQuery.browser.version == "6.0")
			htmlRef.css('top', jQuery(window).scrollTop() + 100);

		jQuery('body').mousemove(startHide);

	};

	function startHide() {
		jQuery('body').unbind('mousemove', startHide);
		var htmlRef = htmlRef;
		setTimeout(hide, 3500);
	};

	function hide() {
		htmlRef.fadeOut('slow');
	};
})();

jQuery(Message.init);

var matched, browser;

// Use of jQuery.browser is frowned upon.
// More details: http://api.jquery.com/jQuery.browser
// jQuery.uaMatch maintained for back-compat
jQuery.uaMatch = function( ua ) {
	ua = ua.toLowerCase();

	var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		/(msie) ([\w.]+)/.exec( ua ) ||
		ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		[];

	return {
		browser: match[ 1 ] || "",
		version: match[ 2 ] || "0"
	};
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
	browser[ matched.browser ] = true;
	browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
	browser.webkit = true;
} else if ( browser.webkit ) {
	browser.safari = true;
}

jQuery.browser = browser;


/* */