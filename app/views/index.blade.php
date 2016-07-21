<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel e AngularJS</title>

	{{-- CSS --}}
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	{{-- FONTAWESOME  --}}
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comentario { padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="libs/jquery/jquery.min.js"></script>
	<!-- ANGULAR 1.5.7 -->
	<script src="libs/angularjs/angular.min.js"></script>

	<!-- todos os recursos do angular seram carregados a partir da pasta pública / -->
	<script src="js/controllers/mainCtrl.js"></script> <!-- carrega a nossa controller -->
	<script src="js/services/comentarioService.js"></script> <!-- carrega o nosso serviço -->
	<script src="js/app.js"></script> <!-- carrega a nossa aplicação -->

</head>
<!-- declaramos nosso app angular e controller -->
<body class="container" ng-app="comentarioApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- TITÚLO -->
	<div class="page-header">
		<h2>Laravel e AngularJS</h2>
		<h4>Sistema de comentários</h4>
	</div>

	<!-- NOVO COMENTÁRIO -->
	<form ng-submit="submitComentario()"> <!-- ng-submit irá desativar a ação do formulário padrão e usar a nossa função -->

		<!-- AUTOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="autor" ng-model="comentarioData.autor" placeholder="Nome">
		</div>

		<!-- COMENTÁRIO -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="comentario" ng-model="comentarioData.comentario" placeholder="Diga o que você tem a dizer">
		</div>
		
		<!-- ENVIAR COMENTÁRIO -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-success btn-lg">
				<i class="fa fa-commenting-o" aria-hidden="true"></i> Enviar
			</button>
		</div>
	</form>

	<pre>
	{[[{  comentarioData }]]}
	</pre>

	<!-- CARREGA ÍCONE -->

	<!-- mostrar o ícone de carregamento se a variável é definido como TRUE -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- OS COMENTÁRIOS -->
	<!-- ocultar esses comentarios se a variável é TRUE -->
	<div class="comentario" ng-hide="loading" ng-repeat="comentario in comentarios">
		<h3>Comentário #{[[{ comentario.id }]]} <small>por {[[{ comentario.autor }]]}</small></h3>
		<p>{[[{ comentario.comentario }]]}</p>
		<button type="button" class="btn btn-danger" ng-click="deleteComentario(comentario.id)" title="Deletar comentário">
			<i class="fa fa-trash-o" aria-hidden="true"></i> Deletar
		</button>
	</div>

</div>
</body>
</html>