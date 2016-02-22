/**
* Funcionalidade responsável pelo OAuth no Facebook
* @author: Mateus Moura
* @Version: 1.0
*/

Module('MM.OAuthFacebook', function (OAuthFacebook) {
	OAuthFacebook.fn.initialize = function ($container, FB){
		this.container = $container;
		this.FB = FB;

		this.config();
	};
	/**
	* Carregar Scripts necessários para funcionalidade.
	*/
	OAuthFacebook.fn.loadScripts = function(){
		// var _this = this;

		// jQuery.ajaxSetup({
		// 	cache: true
		// });

		// if( $.datepicker === undefined ){
		// 	$.when(
		// 		$.getScript(base_url + "js/plugins/jQuery.ui.datepicker.min.js"),
		// 		$.Deferred(function(deferred){
		// 			$(deferred.resolve)
		// 		})
		// 	).done(function(){
		// 		_this.config();
		// 	}).fail(function() {
		// 		console.log('Erro getScript')
		// 	});
		// } else{
		// 	_this.config();
		// }
	};
	/**
	* Configuração inicial do OAuthFacebook
	*/
	OAuthFacebook.fn.config = function(){
		this.getLoginStatus();

		this.addEventListeners();
	};
	/**
	* Verificar se o usuário está logado no Facebook
	*/
	OAuthFacebook.fn.getLoginStatus = function(){
		this.FB.getLoginStatus( function (resp) {
			if(resp.status === 'connected') {
				$('.fb__notLogged', this.container).removeClass('fb__notLogged');

				this.FB.api(
					'/me',
					'GET',
					{"fields":"id,name,email,picture"},
					this.setValues
				);
			} else {

			}
		}.bind(this));
	};
	/**
	* Define o NOME e EMAIL do usuário.
	*/
	OAuthFacebook.fn.setValues = function (resp) {
		$('input[name=user_name]', this.container).val(resp.name);
		$('input[name=user_email]', this.container).val(resp.email);
		$('.modal__event--user img', this.container).attr({
			src: resp.picture.data.url,
			alt: resp.name
		});
		$('.modal__event--user h2', this.container).text(resp.name);
		$('.modal__event--loading', this.container).fadeOut();
	};
	/**
	* Adiciona os eventos necessários.
	*/
	OAuthFacebook.fn.addEventListeners = function(){
		$('.btn-facebook', this.container)
			.on('click', this.authorizeAPP.bind(this));

		$('.btn-logout', this.container)
			.on('click', function(event) {
				event.preventDefault();
				/* Act on the event */
			});
	};
	/**
	* Função para autorizar o APP
	*/
	OAuthFacebook.fn.authorizeAPP = function () {
		this.FB.login( function (resp) {
			if(resp.status === 'connected') {
				$('.fb__notLogged', this.container).removeClass('fb__notLogged');

				this.FB.api(
					'/me',
					'GET',
					{"fields":"id,name,email"},
					this.setValues
				);
			}
		}.bind(this), {scope: 'email,user_birthday'});
	};
});