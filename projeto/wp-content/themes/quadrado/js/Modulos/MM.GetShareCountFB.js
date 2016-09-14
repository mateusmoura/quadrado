/**
* Funcionalidade responsável por fazer o GET da quantidade de compartilhamentos no Facebook
* @author: Mateus Moura
* @Version: 1.0
*/

Module('MM.GetShareCountFB', function(GetShareCountFB){
	GetShareCountFB.fn.initialize = function($inputs){
		this.$linkShareCount = $('.btn-getsharecount');

		this.building();
	};
	/**
	* Inicializar a busca
	*/
	GetShareCountFB.fn.building = function($input){
		for (var i = this.$linkShareCount.length - 1; i >= 0; i--) {
			this.getData(this.$linkShareCount.eq(i))
		}
	};
	/**
	* Adiciona os eventos necessários.
	*/
	GetShareCountFB.fn.addEventListeners = function($input){
		
	};
	/**
	* Get Data of Facebook
	*/
	GetShareCountFB.fn.getData = function($scope){
		$.getJSON( 'http://graph.facebook.com/?id=' + $scope.data('url'), function( fbdata ) {
			$scope.html('<i class="fa fa-share"></i> ' + fbdata.share.share_count);
		});
	};
});