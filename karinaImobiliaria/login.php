
<?php 
session_start();
require_once('config.php');
$result = Administrador::getList();


if (isset($_POST["login"])) {
	$usuario = $_POST['email_login'];
	$senha = $_POST['senha_login'];

$adm = new Administrador();
$adm->login($usuario,$senha);

if ($adm->getId()!=null){
	header('location:inicio.php'); exit;
}else{
	echo "Falha no login.";
}
}
 ?>
