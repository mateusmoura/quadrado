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
		

		MM.ValidarFormularios($('form.validate'));

		if($('main').hasClass('about')) {
			this.about();
			console.log('aki')
		}
	},

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
			});

			$('.block__slider--item.left').animate({
				left: '-59%',
			}, 500, function() {
				/* stuff to do after animation is complete */
				$(this).removeClass('left').addClass('right').css('left', 'auto').appendTo($('.block__slider'));
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
				$(this).removeClass('right').addClass('left').css('right', 'auto').insertBefore($('.block__slider--item.left:first'));
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
	}
}


$( function(){
	site.global();
});