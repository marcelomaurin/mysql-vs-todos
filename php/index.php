
<?php
  //Controla o Debug no projeto
  ini_set('display_errors', 'On');
  
  include "sessao.php";
  include "config.php";
  include "funcs.php";
?>

<html>
	<header>
		<title>Cadastro de Pessoas</title>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</header>
	<body>

	    
		<div ng-app="Pessoas" ng-controller="cntrl" >
			<div class="container-fluid bg-1 text-rigth">
				<form>
					<?  Pesquisar Itens ?>
					<div class="jumbotron">
							<h1>Cadastro de Pessoas</h1>							
							<p>Modelo de aplicação MVC, conforme <a href="http://maurinsoft.com.br/index.php/2022/02/04/mysql-com-c-lazarus-python-php-r-parte-3/">Artigo publicado.</a></p>
							<p>Para maiores informações <a href="mailto:marcelomaurinmartins@gmail.com">marcelomaurinmartins@gmail.com</a></p>
					</div>
					<div class="row">
						<div class="col-sm-1">idPessoa:</div>
						<div class="col-sm-2"><input class="form-control" placeholder="idPessoa (opcional)" type="text" ng-model="pidpessoa" name="pidpessoa"></div>					
					</div>			
					<div class="separador">
					</div>			
					<div class="row">
						<div class="col-sm-1">Nome:</div>
						<div class="col-sm-4"><input class="form-control" placeholder="nome (opcional)" type="text" ng-model="pnome" name="pnome"></div>					
					</div>	
					<div class="separador">
					</div>	
							
					<div class="row">
						<div class="col-sm-1">Profissão:</div>
						<div class="col-sm-4"><input class="form-control" placeholder="profissao (opcional)" type="text" ng-model="pprofissao" name="pprofissao"></div>											
					</div>	
					<div class="separador">
					</div>						
					<div class="row">					
					    <div class="col-sm-1">Dt. Nascimento:</div>
						<div class="col-sm-4"><input class="form-control" placeholder="dt Nascimento (yyyy-mm-dd) (opcional)" type="text" ng-model="pdtnasc" name="pdtnasc"></div>											
					</div>						
					<div class="separador">
					<div class="row">					
					    <div class="col-sm-1">Sexo:</div>
						<div class="col-sm-4"><input class="form-control" placeholder="Genero sexual (M/F) (opcional)" type="text" ng-model="psexo" name="psexo"></div>											
					</div>						
					<div class="separador">					
					</div>	
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-4"></div>																
						<div class="col-sm-1"> <input type="button" class="btn btn-primary"  value="Pesquisar" ng-click="displayPessoa(pidpessoa,pnome,pprofissao,psexo,pdtnasc)" > </div> 
						<div class="col-sm-1">  </div> 
						<div class="col-sm-1"> <input type="button" class="btn btn-primary"  value="Novo Item" ng-click="newPessoa(pidpessoa)" > </div> 
					
					</div>
					
					
					<? Retorno de mensagem de erro ?>
					<div class="info">
						<div class="control-label">Alerta:</div>
						<div class="info">{{msg}}</div>
					</div>
				</form>
			</div>
			<? layout da tabela de resposta ?>
			<div class="container-fluid bg-1 text-rigth">
				
				<? **Cadastrar itens** ?>
				<div id="cadastro" ng-style="disableInsert" >
					<div class="row">
						<div class="col-sm-12"> <h3>Operação Insert registro </h3></div>	
					</div>					
					<div class="row">
						<div class="col-sm-1 control-label"> Nome: </div>
						<div class="col-sm-4"> <input  class="form-control" placeholder=" Nome da pessoa" type="text" ng-model="nome" name="nome"> </div>	
					</div>
					<div class="row">
						<div class="col-sm-1 control-label"> Profissão</div>
						<div class="col-sm-4"> <input class="form-control"  placeholder=" Profissão da pessoa" type="text" ng-model="profissao" name="profissao"></div>
					</div>									
					<div class="row">
						<div class="col-sm-1 control-label"> Dt. Nascimento</div>
						<div class="col-sm-4"> <input class="form-control"  placeholder=" Dt nascimento (YYYY-mm-dd)" type="text" ng-model="dtnasc" name="dtnasc"></div>
					</div>	
					<div class="row">
						<div class="col-sm-1 control-label">Sexo</div>
						<div class="col-sm-4"> <input class="form-control"  placeholder=" Sexo de Nascimento (M/F)" type="text" ng-model="sexo" name="sexo"></div>
					</div>				
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-1 control-label">  </div> 
						<div> <input type="button" class="btn btn-primary" value="submit" ng-click="insertPessoa()" > </div> 					
					</div>
				</div>
			</div>
			
			<div class="container-fluid bg-1 text-rigth">
				
				<? *** Update *** ?>
				<div id="edicao" ng-style="disableUpdate" class="container-fluid bg-1 text-rigth">
					<div class="row">
						<div class="col-sm-12"> <h3>Operacao de Edicao</h3></div>
					</div>
					<div class="row">
						<div class="col-sm-1 control-label"> idPessoa:</div><div> {{edidpessoa}}</div>
					</div>
					<div class="row">
						<div class="col-sm-1 control-label"> Nome</div>
						<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="ednome" name="ednome"></div>
					</div>				
					<div class="row">
						<div class="col-sm-1 control-label"> Profissão</div>
						<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="edprofissao" name="edprofissao"></div>
					</div>									
					<div class="row">
						<div class="col-sm-1 control-label"> Dt. Nascimento</div>
						<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="eddtnasc" name="eddtnasc"></div>
					</div>	
					<div class="row">
						<div class="col-sm-1 control-label">Sexo</div>
						<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="edsexo" name="edsexo"></div>
					</div>									
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-1"> <button class="btn btn-primary" ng-click="updatePessoa(edidpessoa,ednome, edprofissao, eddtnasc, edsexo)">Atualizar</button></div>
					</div>
				</div>
			</div>
			
			<div class="container-fluid bg-1 text-rigth">
				<div class="row">
				<hr>
				</div>
			</div>
				
			<? ** Tela de Resultado **?>
			<div class="container-fluid bg-1 text-rigth">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>IdPessoa</th>
							<th>Nome</th>
							<th>Profissão</th>
							<th>Dt. Nascimento</th>
							<th>Sexo</th>
											
						<tr>
					</thead>
					<tbody>
						<tr ng-repeat="dados in data.rs">
							<td>{{dados.idpessoa}}</td>
							<td>{{dados.nome}}</td>						
							<td>{{dados.profissao}}</td>	
							<td>{{dados.dtnasc}}</td>	
							<td>{{dados.sexo}}</td>	
							<td><button class="btn btn-primary" ng-click="deletePessoa(dados.idpessoa);">Delete</button></td>
							<td><button class="btn btn-primary" ng-click="HabilitaEdicao(dados);">Edit</button></td>
						</tr>
					</tbody>
				</table>
				
				
			</div>
			
			
			
			<? *** Controler *** ?>
			<script>
				var app = angular.module('Pessoas',[]);
				app.controller('cntrl', function($scope,$http)
				{
				    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
					$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
					
					//Mostra  os Jobs				
					$scope.insertPessoa=function()
					{
						$http.post("/exemplos/phpmysql/ws/iPessoa.php",{'nome':$scope.nome,'profissao':$scope.profissao,'dtnasc':$scope.dtnasc,'sexo':$scope.sexo})
						.success(function()
						{
							$scope.msg = "nome foi cadastrado com sucesso";
							$scope.displayPessoa();
						})
					}

					$scope.displayPessoa=function(pidpessoa,pnome,pprofissao,psexo,pdtnasc)
					{
					    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
						$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
						
						if (typeof pidpessoa == "undefined") 
						{
							pidpessoa = "";
						}	
						if (typeof pnome == "undefined") 
						{
							pnome = "";
						}	
						if (typeof psexo == "undefined") 
						{
							psexo = "";
						}	
						if (typeof pprofissao == "undefined") 
						{
							pprofissao = "";
						}	
						if (typeof pdtnasc == "undefined") 
						{
							pdtnasc = "";
						}	

						var params = {"idpessoa": pidpessoa, "nome": pnome, "profissao": pprofissao, "sexo": psexo, "dtnasc": pdtnasc };
						var config = {params: params};
						
						
						$http.get("/exemplos/phpmysql/ws/sPessoa.php",config)
						.success(function(data)
						{
							$scope.data = data;
							$scope.msg = "Tela Atualizada!";
						})
						.error(function()
						{
							$scope.msg = "Pesquisa retornou vazia";
							$scope.data = null;
						}) 
					}
					
					$scope.deletePessoa=function(idpessoa)
					{
						$http.post("/exemplos/phpmysql/ws/dPessoa.php",{'idpessoa':idpessoa})
						.success(function()
						{					
							$scope.displayPessoa();
							$scope.msg = "Registro excluido!";
						})
					}
					
					//Mostra  os Jobs				
					$scope.newPessoa=function()
					{
						$scope.disableInsert = {'display': 'block'}; 
						$scope.disableUpdate = {'display': 'none'}; 
						$scope.edidpessoa = "";
						$scope.ednome = "";
						
					}					
					
					$scope.HabilitaEdicao=function(dado)
					{
						$scope.disableUpdate = {'display': 'block'}; 
						$scope.edidpessoa = dado.idpessoa;
						$scope.ednome = dado.nome;			
						$scope.edprofissao = dado.profissao;			
						$scope.eddtnasc = dado.dtnasc;
						$scope.edsexo = dado.sexo;			
						
					}
					
					
					$scope.updatePessoa=function(edidpessoa, ednome, edprofissao, eddtnasc, edsexo)
					{
						$http.post("/exemplos/phpmysql/ws/uPessoa.php",{'pesidpessoa':edidpessoa,'nome':ednome,'profissao':edprofissao,'dtnasc':eddtnasc,'sexo':edsexo})
						.success(function()
						{					
							$scope.displayPessoa();
							$scope.msg = "Registro excluido!";
							
							$scope.disableUpdate = {'display': 'none'}; 
							$scope.displayPessoa();
						})
					}

				});
			</script>


		</div>
	</body>
</html>