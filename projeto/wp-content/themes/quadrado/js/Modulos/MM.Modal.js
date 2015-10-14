/**
* Funcionalidade responsável por Configurar e mostrar as modais.
* @author: Mateus Moura
* @Version: 1.0
*/

Module('CNA.Modal', function(Modal){
	Modal.fn.initialize = function($callfn){
		this.modal = $('#modal').length ? $('#modal') : $('<div id="modal"><a href="#this" class="btn-fechar"><i class="icon icon-fechar2"></i></a><div class="conteudo"></div></div>').appendTo($('body'));
		this.overlay = $('#overlay').length ? $('#overlay') : $('<div id="overlay"></div>').appendTo($('body'));
		this.call = $callfn;

		this.addEventListeners();
	};
	/**
	* Efetua o AJAX do conteúdo da modal.
	*/
	Modal.fn.ajax = function($url, $evt){
		var _this = this;

		$.ajax({
			url: $url,
			cache: true,
			beforeSend: function(){
				//oTalk.loading.add(oTalk.overlay).fadeIn();
				_this.overlay.fadeIn();
			},
			error: function(jqXHR, textStatus, errorThrown){
				//console.log( "ERROR: ", jqXHR, textStatus, errorThrown );
				//oTalk.loading.add(oTalk.overlay).fadeOut();
				_this.overlay.fadeOut();
			},
			success: function( response ){
				//oTalk.loading.fadeOut();
				$(response).appendTo(_this.modal.find('.conteudo').empty());

				_this.posicionarModal($evt);
				//oTalk.util.radio();
				//oTalk.util.checkbox();

				// if($('body').hasClass('ie7') || $('body').hasClass('ie8')){
				// 	$('input[placeholder], textarea[placeholder]', this.modal).placeholder();
				// }

				if( _this.call != undefined ){
					_this.call();
				}
				//oTalk.actions[_fnmodal]();
			}
		});
	};
	/**
	* Centraliza a MODAL na página
	*/
	Modal.fn.posicionarModal = function($evt, $m){
		var _modal = $m != undefined ? $m : this.modal,
			_left =  $(window).width() - _modal.width(),
			_top = $evt.pageY - _modal.height();

		_left = _left/2;

		_modal.css({
			left: _left,
			top: _top + 35
		}).fadeIn();

		$("html, body").animate({
			scrollTop: _top
		}, 500 );
	};
	/**
	* Adiciona os eventos necessários.
	*/
	Modal.fn.addEventListeners = function(){
		$('.btn-modal')
			.on('click', this.onButtonClick.bind(this));

		this.modal.find('.btn-fechar')
			.on('click', this.onButtonClose.bind(this));

		this.overlay
			.on('click', this.onButtonClose.bind(this));
	};
	/**
	* Evento de CLICK do BOTÃO para mostrar a modal.
	*/
	Modal.fn.onButtonClick = function(event){
		if(event.currentTarget.rel != "" && event.currentTarget.cached == true){
			this.overlay.fadeIn();
			this.posicionarModal(event, $('div.modal.' + this.rel));
		}else{
			this.ajax(event.currentTarget.href, event);
		}

		return false;
	};
	/**
	* Evento de CLICK do BOTÃO para fechar a modal.
	*/
	Modal.fn.onButtonClose = function(event){
		var _this = this;

		_this.modal.fadeOut(function(){
			_this.overlay.fadeOut();
		});

		return false;
	};
});
