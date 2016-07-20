var comentarioApp = angular.module('comentarioApp', ['mainCtrl', 'comentarioService'])
	.config(function($interpolateProvider){
		$interpolateProvider.startSymbol('{[[{')
			.endSymbol('}]]}');
	});