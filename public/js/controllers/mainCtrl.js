angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Comentario) {
		// objeto para armazenar todos os dados para o novo formulário de comentário
		$scope.comentarioData = {};

		// carregamento da variável para mostrar o ícone de carregamento de fiação
		$scope.loading = true;
		
		// obter todos os comentarios primeira e vinculá-lo ao $scope.comentarios object
		Comentario.get()
			.success(function(data) {
				$scope.comentarios = data;
				$scope.loading = false;
			});


		// função para lidar com o envio do formulário
		$scope.submitComentario = function() {
			$scope.loading = true;

			// salva o comentario. passar em dados de comentários do formulário
			Comentario.save($scope.comentarioData)
				.success(function(data) {
					$scope.comentarioData = {};
					// se bem sucedida, vamos precisar atualizar a lista de comentário
					Comentario.get()
						.success(function(getData) {
							$scope.comentarios = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// função para lidar com a exclusão de um comentário
		$scope.deleteComentario = function(id) {
			$scope.loading = true; 

			Comentario.destroy(id)
				.success(function(data) {

					// se bem sucedida, vamos precisar atualizar a lista de comentário
					Comentario.get()
						.success(function(getData) {
							$scope.comentarios = getData;
							$scope.loading = false;
						});

				});
		};

	});