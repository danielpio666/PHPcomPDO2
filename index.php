<?php

@ini_set('display_errors', 'on');
@error_reporting(E_ALL ^ E_NOTICE);
@ini_set('error_reporting', E_ALL);

require_once "classes/Alunos.php";

try 
{
	$conexao = new PDO("mysql:host=localhost;dbname=queen584_aula","queen584_aula","myaula2016");
} 	catch(PDOExeption $e) {
		die("Problemas com a conexao - Erro : ".$e->getCode()." - ".$e->getMessage());
}

if (isset($_GET['op'])) {
	$op = $_GET['op'];

	$alunos = new Alunos($conexao);

	if (isset($_POST['btn-grava'])) {	

		if ($_GET['op'] == 'INC') {
			$alunos->setNome($_POST['nome'])
				->setEmail($_POST['email'])
				->setFone($_POST['fone'])
				->setIdade($_POST['idade'])
				->setSexo($_POST['sexo'])
				->setNota($_POST['nota']);
			
			$resultado = $alunos->Incluir();
			echo "<script>window.location.href='index.php?op=PES';</script>";
								
		} elseif ($_GET['op'] == 'ALT') {
			$alunos->setId($_GET['cod'])
				->setNome($_POST['nome'])
				->setEmail($_POST['email'])
				->setFone($_POST['fone'])
				->setIdade($_POST['idade'])
				->setSexo($_POST['sexo'])
				->setNota($_POST['nota']);
			
			$resultado = $alunos->Alterar();
			echo "<script>window.location.href='index.php?op=PES';</script>";
		}	
	}

	if ($op == 'ALT') { 
		$cod = $_GET['cod'];
		$alunos->setID($cod);
		$dados = $alunos->Pesquisar('single');
	} elseif ( $op == 'EXC') {
		$cod = $_GET['cod'];
		$alunos->setID($cod);
		$alunos->Excluir();
		
		echo "<script>window.location.href='index.php?op=PES';</script>";
	}

} else {
	$cod = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Fase 2</title>
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<header class="myCabecalho">
		<h2>Fase 2</h2>
	</header>
	<nav class="myMenu">
		<div class="opcoes"><a href="<?=$_SERVER['PHP_SELF']?>?op=PES">Pesquisar</a></div>
		<div class="opcoes"><a href="<?=$_SERVER['PHP_SELF']?>?op=INC">Incluir</a></div>
	</nav>
	<main class="myMain">
		<?
		if (isset($_GET['op'])) {
			if ($_GET['op'] != 'PES') {
				if ($_GET['op'] == 'INC') {
					echo "<h2>:: Incluir Alunos</h2><br>";
				} elseif ($_GET['op'] == 'ALT') {
					echo "<h2>:: Alterar Alunos</h2><br>";
				}	
				?>

				<form id="frm-alunos" name="frm-alunos" method="post" action="<?=$_SERVER['PHP_SELF']?>?op=<?=$op?>&cod=<?=$cod?>">
					<ul>
						<li>
							<input name="nome" id="nome" size="50" type="text" placeholder="Nome..." required autofocus value="<?=($op != 'INC' ? $dados['nome'] : "")?>" />
						</li>
						<li>
							<input name="fone" id="fone" size="30" type="text" placeholder="Fone..." value="<?=($op != 'INC' ? $dados['fone'] : "")?>" />
						</li>
						<li>
							<input name="email" id="email" size="50" type="email" placeholder="E-Mail..." required value="<?=($op != 'INC' ? $dados['email'] : "")?>" />
						</li>
						<li>
							<input name="idade" id="idade" size="5" type="number" placeholder="Idade" maxlength="3" max='150' min='1' value="<?=($op != 'INC' ? $dados['idade'] : "")?>"  />
						</li>
						<li>
							<select name="sexo" id="sexo" placeholder="Sexo" >
								<option value="-1">Sexo</option>
								<option value="M" <? if ($op != 'INC' && $dados['sexo'] == 'M') { ?> selected <? } ?> >Masculino</option>
								<option value="F" <? if ($op != 'INC' && $dados['sexo'] == 'F') { ?> selected <? } ?> >Feminino</option>
							</select>
						</li>
						<li>
							<input name="nota" id="nota" size="3" type="number" placeholder="Nota" max='10' min='0' required value="<?=($op != 'INC' ? $dados['nota'] : "")?>" />
						</li>
						<li>
							<button class="btn" type="submit" value="654321" name="btn-grava" id="btn-grava">
								Gravar
							</button>
							<button class="btn" type="button" name="btn-voltar" id="btn-voltar" onclick="location.href='index.php?op=PES'">
								Voltar
							</button>
						</li>
					</ul>
				</form>
			<? } else { 	
				$dados = $alunos->Pesquisar('all');
				
				echo "
				<table width='100%' border='0' cellspacing='5' cellpadding='5'>
					<theader>
						<tr>
							<th width='10%'>ID</th>
							<th width='77%'>Aluno</th>
							<th width='3%'>Nota</th>
							<th width='10%' colspan='2'>Opções</th>
						</tr>
					</theader>
					<tbody>		
				";

				foreach($dados as $myAluno) {
					echo "
					<tr>
						<td align='right'>{$myAluno['id']}</td>
						<td>{$myAluno['nome']}</td>
						<td align='center'>{$myAluno['nota']}</td>
						<td align='center'><a href='".$_SERVER['PHP_SELF']."?op=ALT&cod=".$myAluno['id']."'>ALT</a></td>
						<td align='center'><a href='".$_SERVER['PHP_SELF']."?op=EXC&cod=".$myAluno['id']."'>EXC</a></td>
					</tr>
					";
				}

				echo "</tbody></table>";

		} } ?>
	</main>
	<footer class="myRodape">
		<div class="copy">... Fase 2 ... PHP com PDO ... Copyright &copy; 2016 ...</div>
	</footer>

</body>
</html>