<?php 
require_once('config.php');
$result = Administrador::getList();


//var_dump($result); 
/*
$mat1 = $result[0];
echo $mat1['id'];
echo $mat1['nome'];
echo $mat1['email'];
echo $mat1['senha'];

$mat2 = $result[1];
*/

foreach ($result as $adm ) {
	foreach ($adm as $key => $value) {
		echo $key.": ".$value."<br>";
	}
}
/*
$result = Administrador::search('r');
foreach ($result as $adm ) {
	foreach ($adm as $key => $value) {
		echo $key.": ".$value."<br>";
	}
} */

//$adm = new Administrador();
//$validado = $adm->login('email', 'sad');
//echo $validado;


//$adm = new Administrador('Segur Anssa', 'seg@uranssa.com', 'seg@bb');
//$adm->insert();
//echo $adm->getId();

$adm = new Administrador();
//$adm->update(4,'Tauane Greg Duck', 'tgd@');

//$adm->setId(3);
//$adm->delete();

$adm->login('email', 'sad');
if ($adm->getId()!=null){
	echo "Bem vindo(a) ".$adm->getNome().". <br> Login efetuado com sucesso.";
}else{
	echo "Falha no login.";
}
?>