/**
* Arquivo responsavel pela chamada de todas as funcionalidades do site 
*
* @author: Mateus Moura
* @email: chagas[dot]mateus[at]gmail[dot]com
* @date: 13/10/2014
* 
* Copyright(c) Todos os direitos reservados a 
*/

if (window.console == null) window.console = { log: function (p) { }, error: function (p) { } };

if (!Function.prototype.bind) {
	Function.prototype.bind = function (oThis) {
		if (typeof this !== "function") {
			// closest thing possible to the ECMAScript 5 internal IsCallable function
			throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
		}

		var aArgs = Array.prototype.slice.call(arguments, 1),
			fToBind = this,
			fNOP = function () {},
			fBound = function () {
			  return fToBind.apply(this instanceof fNOP && oThis
						 ? this
						 : oThis,
					aArgs.concat(Array.prototype.slice.call(arguments)));
			};

		fNOP.prototype = this.prototype;
		fBound.prototype = new fNOP();

		return fBound;
	};
}
var site = {
	/*
	* Funcionalidades GLOBAL onde e chamado em todas as páginas do projeto.
	*/
	global: function(){
		var _collapse = $('.collapse');

		MM.Mascarar();

		if($('.header__image--post').hasClass('header__image--post-random')){
			MM.Random($('.header__image--post'), 'img/fke/post-header-image-', 8, 30000);
		}
		for (var i = _collapse.length - 1; i >= 0; i--) {
			MM.Collapsible(_collapse.eq(i), true);
		};

		MM.Modal();
		MM.ValidarFormularios($('form.validate'));

		if($('main').hasClass('about')) {
			this.about();
		}

		this.button_search();
		this.second_header();

		if(events_data) {
			MM.Calendar($('.block__fullcalendar'), events_data);
		}
	},

	second_header: function () {
		$(window).scroll(function(event) {
			event.preventDefault();
			/* Act on the event */

			if(window.scrollY > 260) {
				$('.header__menu--second').slideDown();
			} else {
				$('.header__menu--second').slideUp();
			}
		});
	},

	button_search: function () {
		$('.header__search .btn-search').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */

			if($('.header__search .form-search input').val().length) {
				window.location.href = $('.header__search .form-search').attr('action') + "?s=" + $('.header__search .form-search input').val();
			}
		});
	},
	/* Animation About page */
	about: function () {
		$('.block__slider').on('click', '.btn-default.btn-left', function(event) {
			event.preventDefault();
			/* Act on the event */

			$('.block__slider--item.active .block__slider--shadow').fadeIn();

			$('.block__slider--item.active').animate({
				left: '-59%'
			}, 500, function() {
				/* stuff to do after animation is complete */
				$(this).removeClass('active').addClass('left').css('left', 'auto');
				//$('.block__slider--item.hidden:first').removeClass('hidden').addClass('right');
			});

			$('.block__slider--item.left').animate({
				left: '-59%',
			}, 500, function() {
				/* stuff to do after animation is complete */
				$('.block__slider--item.hidden:first').removeClass('hidden').addClass('right').css('left', 'auto').appendTo($('.block__slider'));
				$(this).removeClass('left').addClass('hidden').css('left', 'auto');
			});

			$('.block__slider--item.right .block__slider--shadow').fadeOut();

			$('.block__slider--item.right').animate({
				left: '-59%',
			}, 500, function() {
				/* stuff to do after animation is complete */
				$(this).removeClass('right').addClass('active').css('left', 'auto');
				$('.block__slider--item.active .block__slider--shadow').fadeOut();
			});
		}).on('click', '.btn-default.btn-right', function(event) {
			event.preventDefault();
			/* Act on the event */

			$('.block__slider--item.active .block__slider--shadow').fadeIn();

			$('.block__slider--item.active').animate({
				right: '-59%'
			}, 500, function() {
				/* stuff to do after animation is complete */
				$(this).removeClass('active').addClass('right').css('right', 'auto');
			});

			$('.block__slider--item.right').animate({
				right: '-59%',
			}, 500, function() {
				/* stuff to do after animation is complete */
				$('.block__slider--item.hidden:first').removeClass('hidden').addClass('left').css('right', 'auto').insertBefore($('.block__slider--item.left:first'));
				$(this).removeClass('right').addClass('hidden').css('right', 'auto');
			});

			$('.block__slider--item.left .block__slider--shadow').fadeOut();

			$('.block__slider--item.left').animate({
				right: '-59%',
			}, 500, function() {
				/* stuff to do after animation is complete */
				$(this).removeClass('left').addClass('active').css('right', 'auto');
				$('.block__slider--item.active .block__slider--shadow').fadeOut();
			});
		});;
	},
	/*
	* Callback quando salva um evento na modal.
	*/
	registerEvent: function ($form, resp) {
		var _name       = $('input[name=user_name]', $form).val(),
			_email      = $('input[name=user_email]', $form).val(),
			_url        = $('input[name=user_url_event]', $form).val(),
			_eventID    = _url.replace(/([^0-9 @_-])/ig, '');

		FB.api(
			'/' + _eventID,
			'GET',
			{'fields':'cover,description,start_time,end_time,id,name,place'},
			function(response) {
				// Insert your code here
				console.log('Resposta', response);
				if(!response.error) {
					var params = {
							'action'                : 'wp_create_event',
							'link'                  : 'https://www.facebook.com/events/' + response.id,
							'adicionado_por'        : _name,
							'email'                 : _email,
							'evento_id'             : response.id,
							'data_inicio'           : response.start_time,
							'data_final'            : response.end_time,
							//'local_do_evento'       : response.place.location.latitude + ', ' + response.place.location.longitude,
							'cidade_estado_pais'    : '',//response.place.name + ' - ' + response.place.city + ', ' + response.place.state,
							'title'                 : response.name,
							'content'               : response.description,
							'cover'                 : response.cover ? response.cover.source : ''
						}

					if(response.place.location) {
						//params.local_do_evento = String(response.place.location.latitude) + ',' + String(response.place.location.longitude);
						if(response.place.location.latitude && response.place.location.longitude) {
							params.local_do_evento_lat = response.place.location.latitude;
							params.local_do_evento_long = response.place.location.longitude;
						}

						if(response.place.location.name) {
							params.cidade_estado_pais += response.place.location.name;

							if(response.place.location.city) {
								params.cidade_estado_pais += ' - ' + response.place.location.city;

								if(response.place.location.state) {
									params.cidade_estado_pais += ', ' + response.place.location.state;
								}
							}
						} else if (response.place.location.city) {
							params.cidade_estado_pais += response.place.location.city;

							if(response.place.location.state) {
								params.cidade_estado_pais += ', ' + response.place.location.state;
							}
						} else if (response.place.location.state) {
							params.cidade_estado_pais += response.place.location.state;
						}

						if(response.place.location.city) {
							params.cidade_estado_pais += ' - ' + response.place.location.city;

							if(response.place.location.state) {
								params.cidade_estado_pais += ', ' + response.place.location.state;
							}
						} else if (response.place.location.state) {
							params.cidade_estado_pais += ' - ' + response.place.location.state;
						}
					} else {
						params.local_do_evento = null;
					}

					$('.modal__event .btn-default.btn-full').addClass('btn-loading');

					$.ajax({
						type: 'POST',
						data: params,
						url: ajaxurl, // templateDir is declared in the footer
						success: function(result) {
							$('.modal__event .btn-default.btn-full').removeClass('btn-loading');

							$('.modal__event form').fadeOut(function() {
								$('.modal__event .modal__event--success').fadeIn();
							});

							$('.modal__event .modal__event--url input').val('');

							$('.modal__event .btn-again')
								.unbind()
								.on('click', function(event) {
									$('.modal__event .modal__event--success').fadeOut(function() {
										$('.modal__event form').fadeIn();
									});
								});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
							$('.modal__event .btn-default.btn-full').removeClass('btn-loading');
						}
					});
				} else {
					MM.Feedback('Ops! Ocorreu um problema na solicitação, por favor tente novamente mais tarde. :(')
				}
			}
		);
	},
	/*
	* Callback quando salva um evento na modal.
	*/
	registerEvent2: function ($form, resp) {
		console.log('registerEvent2');

		FB.api(
			'/me/events?limit=3',
			'GET',
			{'fields':'cover,description,start_time,end_time,id,name,place'},
			function(response) {
				// Insert your code here
				console.log('Resposta', response);
				if(!response.error) {
					var event  = [],
						params = {};

					for (var i = 0; i < response.data.length; i++) {
						var event  = response.data[i];
						var params = {
							'action'                : 'wp_create_event',
							'link'                  : 'https://www.facebook.com/events/' + event.id,
							'adicionado_por'        : event.name,
							'email'                 : 'wordpress@webfacetecnologia.com.br',
							'evento_id'             : event.id,
							'data_inicio'           : event.start_time,
							'data_final'            : event.end_time,
							//'local_do_evento'       : event.place.location.latitude + ', ' + event.place.location.longitude,
							'cidade_estado_pais'    : '',//event.place.name + ' - ' + event.place.city + ', ' + event.place.state,
							'title'                 : event.name,
							'content'               : event.description
							//'cover'                 : response.cover
						}

						if(event.place.location) {
							//params.local_do_evento = String(event.place.location.latitude) + ',' + String(event.place.location.longitude);
							if(event.place.location.latitude && event.place.location.longitude) {
								params.local_do_evento_lat = event.place.location.latitude;
								params.local_do_evento_long = event.place.location.longitude;
							}

							if(event.place.location.name) {
								params.cidade_estado_pais += event.place.location.name;

								if(event.place.location.city) {
									params.cidade_estado_pais += ' - ' + event.place.location.city;

									if(event.place.location.state) {
										params.cidade_estado_pais += ', ' + event.place.location.state;
									}
								}
							} else if (event.place.location.city) {
								params.cidade_estado_pais += event.place.location.city;

								if(event.place.location.state) {
									params.cidade_estado_pais += ', ' + event.place.location.state;
								}
							} else if (event.place.location.state) {
								params.cidade_estado_pais += event.place.location.state;
							}

							if(event.place.location.city) {
								params.cidade_estado_pais += ' - ' + event.place.location.city;

								if(event.place.location.state) {
									params.cidade_estado_pais += ', ' + event.place.location.state;
								}
							} else if (event.place.location.state) {
								params.cidade_estado_pais += ' - ' + event.place.location.state;
							}
						} else {
							params.local_do_evento = null;
						}

						$('.modal__event .btn-default.btn-full').addClass('btn-loading');

						$.ajax({
							type: 'POST',
							data: params,
							url: ajaxurl, // templateDir is declared in the footer
							success: function(result) {
								$('.modal__event .btn-default.btn-full').removeClass('btn-loading');

								$('.modal__event form').fadeOut(function() {
									$('.modal__event .modal__event--success').fadeIn();
								});

								$('.modal__event .modal__event--url input').val('');

								$('.modal__event .btn-again')
									.unbind()
									.on('click', function(event) {
										$('.modal__event .modal__event--success').fadeOut(function() {
											$('.modal__event form').fadeIn();
										});
									});
							},
							error: function(jqXHR, textStatus, errorThrown) {
								console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
								$('.modal__event .btn-default.btn-full').removeClass('btn-loading');
							}
						});

					}
				} else {
					MM.Feedback('Ops! Ocorreu um problema na solicitação, por favor tente novamente mais tarde. :(')
				}
			}
		);
	}
}


$( function(){
	site.global();
});