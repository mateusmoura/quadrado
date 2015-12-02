/**
* Funcionalidade responsável por criar o calendário
* @author: Mateus Moura
* @Version: 1.0
*/
Module('MM.Calendar', function (Calendar) {
	Calendar.fn.initialize = function ($container, $json) {
		this.$container			= $container;
		this.$json				= $json;

		this.loadScripts();
	};
	/**
	* Carregar Scripts necessários para funcionalidade.
	*/
	Calendar.fn.loadScripts = function(){
		var _this = this;

		jQuery.ajaxSetup({
			cache: true
		});

		if(jQuery.fn.fullCalendar === undefined){
			$.when(
				$.getScript(base_url + "js/plugins/moment.min.js"),
				$.getScript(base_url + "js/plugins/jQuery.fullcalendar.js"),
				$.Deferred(function(deferred){
					$.getScript(base_url + "js/plugins/pt-br.js");
					$(deferred.resolve)
				})
			).done(function(){
				_this.config();
			}).fail(function(a, b, c) {
				console.log('Erro getScript', a, b, c)
			});
		} else{
			_this.config();
		}
	};
	/**
	* Configuração do plugin para mostrar o calendário.
	*/
	Calendar.fn.config = function(){
		this.$container.fullCalendar({
			defaultDate: '2015-12-12',
			editable: false,
			lang: 'pt-br',
			eventLimit: true, // allow "more" link when too many events
			header : {
				left: 'prev',
				center: 'title',
				right: 'next'
			},
			events: this.$json
		});
	};
});