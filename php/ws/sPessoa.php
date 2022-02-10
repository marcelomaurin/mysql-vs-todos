<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'Off');
	error_reporting(E_ALL);
	
	include "connectdb.php";
	
	//header('Cache-Control: no-cache, must-revalidate');
	//$data = var_dump(json_decode(file_get_contents("php://input")));
	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$idpessoa = $dbhandle->real_escape_string($data->idpessoa);
		$nome = $dbhandle->real_escape_string($data->nome);
		$profissao = $dbhandle->real_escape_string($data->profissao);
		$sexo = $dbhandle->real_escape_string($data->sexo);
		$dtnasc = $dbhandle->real_escape_string($data->dtnasc);
	} else {
		$idpessoa = $dbhandle->real_escape_string($_GET['idpessoa']);	
		$nome = $dbhandle->real_escape_string($_GET['nome']);
		$profissao = $dbhandle->real_escape_string($_GET['profissao']);		
		$sexo = $dbhandle->real_escape_string($_GET['sexo']);		
		$dtnasc = $dbhandle->real_escape_string($_GET['dtnasc']);		
	}
		

	$query = "select * from pessoas";
	$sqlwhere = "";
	if($idpessoa){	
		$sqlwhere = " where (idpessoa = ".$idpessoa.");";
	}
	if($nome){	
		if($sqlwhere){
			$sqlwhere = $sqlwhere." and (nome like '%".$nome."%');";
		} else {
			$sqlwhere = " where (nome like '%".$nome."%');";
		}
	}
	if($profissao){	
		if($sqlwhere){
			$sqlwhere = $sqlwhere." and (profissao like '%".$profissao."%');";
		} else {
			$sqlwhere = " where (profissao like '%".$profissao."%');";
		}
	}
	if($sexo){	
		if($sqlwhere){
			$sqlwhere = $sqlwhere." and (sexo = '".$sexo."');";
		} else {
			$sqlwhere = " where (sexo = '".$sexo."');";
		}
	}
	if($dtnasc){	
		if($sqlwhere){
			$sqlwhere = $sqlwhere." and (dtnasc = '".$dtnasc."');";
		} else {
			$sqlwhere = " where (dtnasc = '".$dtnasc."');";
		}
	}
	$query = $query . $sqlwhere;

	//echo $query."<br/>";
	
	$rs = $dbhandle->query($query);
	
	//print json_encode($rs);	

	$cont = 0;
	
	echo '{"rs":[';
	$row=$rs->fetch_assoc();
	if($row){
		do
		{		
			if($cont!=0)
			{
				echo ',';
			}
			echo '{';
			echo '"idpessoa":"'.$row['idPessoa'].'",';
			echo '"nome":"'.$row['nome'].'",';
			echo '"profissao":"'.$row['profissao'].'",';
			echo '"dtnasc":"'.$row['dtnasc'].'",';
			echo '"sexo":"'.$row['sexo'].'"';
			echo '}';
			$cont ++;
		} while($row=$rs->fetch_assoc());
	}
	echo ']}'; 
	if ($cont>0)
	{
		echo($strJSON);
	}
	

?>
