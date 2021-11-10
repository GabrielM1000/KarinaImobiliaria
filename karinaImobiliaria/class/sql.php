<?php 
class Sql extends PDO
{
	private $cn;

	public function __construct()
	{
		$this->cn = new PDO("mysql:host=localhost;dbname=imobiliaria","root","usbw"); 
	}
	private function setParams($comando, $parametros = array())
	{
		foreach ($parametros as $key => $value){
			$this->setParam($comando,$key,$value);
		}
	}
	private function setParam($comando,$key,$value)
	{
		$comando->bindParam($key,$value);
	}
	public function query($comandoSql,$params = array())
	{
		$stmt= $this->cn->prepare($comandoSql);
		$this->setParams($stmt,$params);
		$stmt->execute();
		return $stmt;
	}
	public function select($comandoSql, $params = array())
	{
		$stmt = $this->query($comandoSql, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>