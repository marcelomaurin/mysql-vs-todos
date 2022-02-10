
	angular.module("App",[]);
	angular.module("App").controller("IndexCtrl", function ($scope) {
        myTimer = setInterval(Timer, 1000)															
		$scope.app = "Área restrita";			
		$scope.Mensagem = "Bem vindo ao site privado! Selecione uma das opcoes do menu ou entre com usuario e senha!";
		$scope.urlImagem = "/restrito/img/restrito.png";
		
	    //Funcao Atualização de Data e Hora
		function Timer()
		{
			var data = new Date();
			document.getElementById("hora").innerHTML = data.toLocaleTimeString();
			document.getElementById("data").innerHTML = data.toLocaleDateString();
			//$scope.Data = data.getDate()+(data.getMonth()+1)+"/"+ data.getFullYear();
			
			//scope.Hora = data.getHours()+":"+ data.getMinutes()+":"+data.getSeconds();			
		}
	
	    //
		$scope.Show = function()
		{
			$scope.Mensagem = "Bem vindo ao site restrito, todas as informações aqui necessitam de autorização prévia.";
			
			switch($scope.Opc)
			{
			  case 1:
				  $scope.Mensagem = "Cadastro de modelos.";
				  $scope.urlImagem = "/restrito/img/modelo.jpg";
				  break;
			  case 2:
					$scope.Mensagem = "Cadastro de fabricantes.";
					$scope.urlImagem = "/restrito/img/fabricante.png";
					break;
			  case 3:
					$scope.Mensagem = "Categoria.";
					$scope.urlImagem = "/restrito/img/categoria.jpg";
					break;
			  case 4:
					$scope.Mensagem = "Cadastro de Maquinas.";
					$scope.urlImagem = "/restrito/img/cadmaq.jpg";
					break;
			  
			}		
			return $scope.Mensagem;
		}
		
	});
