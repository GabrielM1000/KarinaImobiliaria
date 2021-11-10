
<?php
include 'banco.php';
if (!isset($_SESSION)) session_start();
$nome = $_SESSION['NOME_FUNC'];
$status = $_SESSION['STATUS_FUNC'];
$pieces = explode(" ", $nome);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title>Karina Imobiliaria</title>
</head>
<body>
	<div id="principal">
			<div id="cabecalho">
				<div id="titulo_topo">
					<h1> Karina Imobiliaria </h1>
				</div>
			</div>	<!-- fim cabecalho -->
			<br>
	<div id="usuario"> <p><a href="index.php?"><i class="fas fa-times"></i> Encerrar sessão </a> </p>	</div>
	<br>
	<div id="usuario"> <p><a href="restrito.php?link=1"> <i class="fas fa-times"></i> Inicio </a> </p>	</div>
	
			<div id="corpo">	 
				<div id="esquerdo">	
				<p>
				<b>  Bem vindo(a)  </b>	
					</p>
						<div id="sessao"> <h4>Cadastro</h4>	
						<ul>	
							<li><a href="inicio.php?link=2">Proprietario</a>	</li>
							<li><a href="inicio.php?link=3">Inquilino</a>	</li>
							<li><a href="inicio.php?link=4">Imoveis</a>	</li>
						</ul>
						</div>
						<div id="sessao"> <h4>AGENDAMENTO</h4>
						<ul>	
							<li><a href="restrito.php?link=14">Consultar</a>	</li>
							<li><a href="calendario.php?" target="_blank">Calendario</a>	</li>
						</ul>	
						</div>
						<?php   if ($status ==1){       ?>
						<div id="sessao"> <h4>FUNCIONARIO</h4>
							<ul>	
							<li><a href="restrito.php?link=5">Cadastrar</a>	</li>
							<li><a href="restrito.php?link=16">Consultar</a>	</li>
						</ul>
						</div>
						<?php  }else {                  ?>
							<?php  }                          ?>

						<div id="sessao"> <h4>ADMNISTRADOR</h4>
							<ul>	
							<li><a href="restrito.php?link=31">Procedimentos</a>	</li>
							<li><a href="restrito.php?link=36">Pacotes</a>	</li>
							<li><a href="restrito.php?link=42">Whatsapp</a>	</li>
							<?php   if ($status ==1){       ?>
							<li><a href="restrito.php?link=45">Gerar Relatorio</a>	</li>
							<?php  }else {                  ?>
							<?php  }                          ?>
						</ul>
						</div>	
				</div><!-- fim esquerdo-->
				<div id="direito">
					<?php 	
						//session_start();

						//if ($_SESSION["id_admin"]!= "") { #se diferente de vazio passou na validação
							// exibe o usuario adm da sessão
						//	echo $_SESSION['id_admin']." - ".$_SESSION['nome_admin'];
	if (isset($_GET['link'])) {
		
							$link = $_GET['link'];
							$pag[1]= "home.php";
							$pag[2]= "frm_pro.php";
							$pag[3]= "frm_inq.php";
							if (!empty($link)) { 
								if (file_exists($pag[$link])) {
									include $pag[$link];
								}else{
									if (isset($_GET['lin'])) {
										$id = $_GET['lin'];
										echo $id;
						
										$sql = "select * from moto where id_mot='$id'";
										$resultado = mysqli_query($db, $sql);
										#armazenado a quantidade de linhas que retorna do $sql
										$total = mysqli_num_rows($resultado);
										#contruindo uma matriz 
										$linha = mysqli_fetch_assoc($resultado);
?>
										<form action="alteramoto.php" method="post" enctype="multipart/form-data">
										<fieldset>
										<legend>Alterar Moto</legend>
										<label>
										<span>Codigo:</span>
										<input type="text" name="txt_codigo" value="<?php echo $linha['codigo_mot'] ?>">
</label>
<br>
<label >
	<span>Nome:</span>
	<input type="text" name="txt_nome" value="<?php echo $linha['Nome_mot']?>">
</label>
<br>
<label >
	<span>Marca:</span>
	<input type="text" name="txt_marca" value="<?php echo $linha['marca_mot'] ?>">
</label>
<br>
<label>
	<span>Descrição:</span>
	<input type="text" name="txt_descri" value="<?php echo $linha['descricao_mot'] ?>">
</label>
<br>	
<label>
	<form action="img.php" method="post">
	<span>IMG:</span>
<input type="file" name="img_prod" id="" value="<?php echo $linha['img_mot'] ?>">
</form>
</label>
<br>
<label> 
   <span>Preço:</span>
    <input type="text" name="txt_preco" value="<?php echo $linha['Preco_mot']?>">
</label>
<br>
<label >
	<span>Status:</span>
	<input type="checkbox" name="txt_status">
</label>
<br>
<input type="submit" value="Alterar" class="botao" name="btn_alterarmoto">
</fieldset>
    </form>
<?php
									
									}
									include "home.php";
								}
								
							}
							else{
								if (isset($_GET['lin'])) {
									$id = $_GET['lin'];
									echo $id;
					
									$sql = "select * from moto where id_mot='$id'";
									$resultado = mysqli_query($db, $sql);
									#armazenado a quantidade de linhas que retorna do $sql
									$total = mysqli_num_rows($resultado);
									#contruindo uma matriz 
									$linha = mysqli_fetch_assoc($resultado);
?>
									<form action="alteramoto.php" method="post" enctype="multipart/form-data">
									<fieldset>
									<legend>Alterar Moto</legend>
									<label>
									<span>Codigo:</span>
									<input type="text" name="txt_codigo" value="<?php echo $linha['codigo_mot'] ?>">
</label>
<br>
<label >
<span>Nome:</span>
<input type="text" name="txt_nome" value="<?php echo $linha['Nome_mot']?>">
</label>
<br>
<label >
<span>Marca:</span>
<input type="text" name="txt_marca" value="<?php echo $linha['marca_mot'] ?>">
</label>
<br>
<label>
<span>Descrição:</span>
<input type="text" name="txt_descri" value="<?php echo $linha['descricao_mot'] ?>">
</label>
<br>	
<label>
<form action="img.php" method="post">
<span>IMG:</span>
<input type="file" name="img_prod" id="" value="<?php echo $linha['img_mot'] ?>">
</form>
</label>
<br>
<label> 
<span>Preço:</span>
<input type="text" name="txt_preco" value="<?php echo $linha['Preco_mot']?>">
</label>
<br>
<label >
<span>Status:</span>
<input type="checkbox" name="txt_status">
</label>
<br>
<input type="submit" value="Alterar" class="botao" name="btn_alterarmoto">
</fieldset>
</form>
<?php
								}
								include "home.php";
							}
							}else{
								if (isset($_GET['lin'])) {
									$id = $_GET['lin'];
									echo $id;
					
									$sql = "select * from moto where id_mot='$id'";
									$resultado = mysqli_query($db, $sql);
									#armazenado a quantidade de linhas que retorna do $sql
									$total = mysqli_num_rows($resultado);
									#contruindo uma matriz 
									$linha = mysqli_fetch_assoc($resultado);
?>
									<form action="alteramoto.php" method="post" enctype="multipart/form-data">
									<fieldset>
									<legend>Alterar Moto</legend>
									<label>
									<span>Codigo:</span>
									<input type="text" name="txt_codigo" value="<?php echo $linha['codigo_mot'] ?>">
</label>
<br>
<label >
<span>Nome:</span>
<input type="text" name="txt_nome" value="<?php echo $linha['Nome_mot']?>">
</label>
<br>
<label >
<span>Marca:</span>
<input type="text" name="txt_marca" value="<?php echo $linha['marca_mot'] ?>">
</label>
<br>
<label>
<span>Descrição:</span>
<input type="text" name="txt_descri" value="<?php echo $linha['descricao_mot'] ?>">
</label>
<br>	
<label>
<form action="img.php" method="post">
<span>IMG:</span>
<input type="file" name="img_prod" id="" value="<?php echo $linha['img_mot'] ?>">
</form>
</label>
<br>
<label> 
<span>Preço:</span>
<input type="text" name="txt_preco" value="<?php echo $linha['Preco_mot']?>">
</label>
<br>
<label >
<span>Status:</span>
<input type="checkbox" name="txt_status">
</label>
<br>
<input type="submit" value="Alterar" class="botao" name="btn_alterarmoto">
</fieldset>
</form>
<?php
								}
								include "home.php";
							}		
					 ?>
					 

				</div><!-- fim direito-->
				
			</div><!-- fim corpo -->
			
			<div id="rodape">
			<a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-google"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <p class="direitos"> Copyright Misael ©

 <?php echo date("Y");?>. Todos os direitos reservados.</p>
			</div>
        
	</div> <!-- fim principal -->
</body>
</html>
<?php

?>