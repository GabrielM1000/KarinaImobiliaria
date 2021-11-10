<?php
 date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
</head>
<body>
    <form action="proprietario.php" method="post">
	<fieldset>
	<legend>Ficha De Cadastro Proprietario</legend>
	<p>
<label>
	<span>Nome:</span>
<input size="50" type="text" name="nome_pro" id="" value="">
</label>
</p>
<p>
<label>
	<span>CPF:</span>
<input size="25" type="text"  maxlength="14" name="cpf_pro" id="" value="" OnKeyPress="formatar('###-###-###-##', this)">
</label>
</p>
<p>
<label>
	<span>Data de Nacimento:</span>
<input  type="date" name="data_nascimento_pro" id="" value="">
</label>
</p>
<p>
<label >
	<span>Rg:</span>
	<input size="50" type="text" name="rg_pro" id="" OnKeyPress="formatar('##-###-###-#', this)">
</label>
</p>
<p>
<label>
	<span>Endereço Atual:</span>
	<input size="15" type="text" name="endereco_atual_pro" maxlength="15">
</label>
</p>
<p>
<fieldset>
	<legend>Estado Civil:</legend>
	<label>
	<span>Casado:</span>
	<input type="checkbox" name="casado"/>
	</label>
	<br>
	<label>
	<span>Solteiro:</span>
	<input type="checkbox" name="solteiro"/>
	</label>
	<br>
	<label>
	<span>Separado:</span>
	<input type="checkbox" name="Separado"/>
	</label>
	<br>
	<label>
	<span>Divorciado:</span>
	<input type="checkbox" name="Divorciado"/>
	</label>
	<br>
	<label>
	<span>Viuvo:</span>
	<input type="checkbox" name="viuvo"/>
	</label>
</fieldset>
</p>
<p>
<label>
	<span>Nacionalidade:</span>
	<input size="15" type="text" name="nacionalidade_pro" >
</label>
</p>
<p>
<label>
	<span>RNE:</span>
	<input size="15" type="text" name="rne_pro" >
</label>
</p>
<p>
<label>
	<span>Profisão:</span>
	<input size="15" type="text" name="profissao_pro">
</label>
</p>
<p>
<label>
	<span>Agencia:</span>
	<input size="15" type="text" name="agencia_pro" >
</label>
</p>
<p>
<label>
	<span>Conta:</span>
	<input size="15" type="text" name="conta_pro" >
</label>
</p>
<p>
<label>
	<span>Banco:</span>
	<input size="15" type="text" name="banco_pro" >
</label>
</p>
<p>
<label>
	<span>Celular:</span>
	<input size="15" type="text" name="celular_pro" OnKeyPress="formatar('##-#####-####', this)">
</label>
</p>
<input type="submit" value="Cadastrar" class="botao" name="btn_cadastro">
</fieldset>
    </form>
</body>
</html>