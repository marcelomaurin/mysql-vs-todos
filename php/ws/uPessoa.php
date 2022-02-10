<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'Off');
	/*error_reporting(E_ALL);*/
	//echo "teste1";
	
	include "connectdb.php";
	
	
	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$pesidpessoa = $dbhandle->real_escape_string($data->pesidpessoa);
		$pesnome = $dbhandle->real_escape_string($data->pesnome);
		$pesprofissao = $dbhandle->real_escape_string($data->pesprofissao);
		$pessexo = $dbhandle->real_escape_string($data->pessexo);
		$pesdtnasc = $dbhandle->real_escape_string($data->pesdtnasc);
		
		$idpessoa = $dbhandle->real_escape_string($data->idpessoa);
		$nome = $dbhandle->real_escape_string($data->nome);
		$profissao = $dbhandle->real_escape_string($data->profissao);
		$dtnasc = $dbhandle->real_escape_string($data->dtnasc);
		$sexo = $dbhandle->real_escape_string($data->sexo);
	} else {
		$pesidpessoa = $dbhandle->real_escape_string($_GET['pesidpessoa']);
		$pesnome = $dbhandle->real_escape_string($_GET['pesnome']);
		$pesprofissao = $dbhandle->real_escape_string($_GET['pesprofissao']);
		$pesdtnasc = $dbhandle->real_escape_string($_GET['pesdtnasc']);
		$pessexo = $dbhandle->real_escape_string($_GET['pessexo']);

		$idpessoa = $dbhandle->real_escape_string($_GET['idpessoa']);
		$nome = $dbhandle->real_escape_string($_GET['nome']);
		$profissao = $dbhandle->real_escape_string($_GET['profissao']);
		$dtnasc = $dbhandle->real_escape_string($_GET['dtnasc']);
		$sexo = $dbhandle->real_escape_string($_GET['sexo']);
		
	}   
	
	
	$query= "update pessoas set  ";
	$qryset = "";
	if($nome)
	{			
		$qryset = $qryset . " nome = '".$nome."'";
	}
	if($profissao)
	{			
		if($query)
		{
			$qryset = $qryset . ", profissao = '".$profissao."'";
		} else {
			$qryset = $qryset . " profissao = '".$profissao."'";
		}
	}
	if($dtnasc)
	{			
		if($query)
		{
			$qryset = $qryset . ", dtnasc = '".$dtnasc."'";
		} else {
			$qryset = $qryset . " dtnasc = '".$dtnasc."'";
		}
	}
	
	if($sexo)
	{			
		if($query)
		{
			$qryset = $qryset . ", sexo = '".$sexo."'";
		} else {
			$qryset = $qryset . " sexo = '".$sexo."'";
		}
	}
	
	$query = $query . $qryset;
	
	$qrywhere = "";
	if($pesidpessoa)
	{
		$qrywhere = $qrywhere ." where idpessoa=". $pesidpessoa;
	}
	
	if($pesnome)
	{
		if($qrywhere)
		{
			$qrywhere = $qrywhere ." and nome='". $pesnome."'";
		} else 
		{
			$qrywhere = $qrywhere ." where nome='". $pesnome."'";	
		}
	}
	
	if($pesprofissao)
	{
		if($qrywhere)
		{
			$qrywhere = $qrywhere ." and profissao='". $pesprofissao."'";
		} else 
		{
			$qrywhere = $qrywhere ." where profissao='". $pesprofissao."'";	
		}
	}
	
	if($pesdtnasc)
	{
		if($qrywhere)
		{
			$qrywhere = $qrywhere ." and dtnasc='". $pesdtnasc."'";
		} else 
		{
			$qrywhere = $qrywhere ." where dtnasc='". $pesdtnasc."'";	
		}
	}
	
	if($pessexo)
	{
		if($qrywhere)
		{
			$qrywhere = $qrywhere ." and sexo='". $pessexo."'";
		} else 
		{
			$qrywhere = $qrywhere ." where sexo='". $pessexo."'";	
		}
	}
	
	

	$query = $query . $qrywhere .';';

	echo $query ;
	
	$dbhandle->query($query);
		

?>
 