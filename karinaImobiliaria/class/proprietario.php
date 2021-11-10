<?php 
class Proprietario
{
	private $id;
	private $nome;
    private $cpf;
    private $data_nascimento;
    private $rg;
    private $endereco_atual;
    private $estado_civil;
    private $nacionalidade;
    private $profissao;
    private $rne;
    private $agencia;
    private $conta;
    private $banco;
    private $celular;
    

	public function getId()
	{
		return $this->id;
	} 
	public function setId($value)
	{
		$this->id = $value;
	}
	public function getNome()
	{
		return $this->nome;
	} 
	public function setNome($value)
	{
		$this->nome = $value;
	}
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($value)
    {
    $this->cpf = $value;
    }
    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }
    public function setData_nascimento($value)
    {
        $this->data_nascimento = $value;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($value)
    {
        $this->rg = $value;
    }
    public function getEndereco_atual()
    {
        return $this->endereco_atual;
    }
    public function setEndereco_atual($value)
    {
        $this->endereco_atual = $value;
    }
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }
    public function setEstado_civil($value)
    {
        $this->estado_civil = $value;
    }
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
    public function setNacionalidade($value)
    {
        $this->nacionalidade = $value;
    }
    public function getProfissao()
    {
        return $this->profissao;
    }
    public function setProfissao($value)
    {
        $this->profissao =$value;
    }
    public function getRne()
    {
        return $this->rne;
    }
    public function setRne($value)
    {
        $this->rne =$value;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    public function setAgencia($value)
    {
        $this->agencia = $value;
    }
    public function getConta()
    {
        return $this->conta;
    }
    public function setConta($value)
    {
        $this->conta = $value;
    }
    public function getBanco()
    {
        return $this->banco;
    }
    public function setBanco($value)
    {
        $this->banco = $value;
    }
	public function getCelular()
	{
		return $this->celular;
	} 
	public function setCelular($value)
	{
		$this->celular = $value;
	} 


	public function loadById($id)
	{//carrega por ID
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM proprietario WHERE id_pro = :id", array(":id"=>$id));
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM proprietario ORDER BY nome_pro");
	} 

	public static function search($pro){
		$sql = new Sql();
		return $sql->select("SELECT * FROM proprietario WHERE nome_pro LIKE :nome",array(":nome"=>"%".$adm."%")); 
	}


	public function setData($data)
	{
		$this->setId($data['id_pro']);
		$this->setNome($data['nome_pro']);
        $this->setCpf($data['cpf_pro']);
        $this->setConta($conta['conta_pro']);
        $this->setCelular($celular['celular_pro']);
        $this->setAgencia($agencia['agencia_pro']);
        $this->setRne($rne['rne_pro']);
        $this->setProfissao($profissao['profissao_pro']);
        $this->setNacionalidade($nacionalidade['nacionalidade_pro']);
        $this->setEndereco_atual($endereco_atual['endereco_atual_pro']);
        $this->setEstado_civil($estado_civil['estado_civil_pro']);
        $this->setRg($rg['rg_pro']);
        $this->setData_nascimento($data_nascimento['data_nascimento_pro']);
	}

	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_pro_insert(:nome, :cpf, :data_nascimento, :rg, :endereco_atual, :estado_civil, :nacionalidade, :profissao, :rne, :agencia, :conta, :banco, :celular)", array(
			":nome"=>$this->getNome(),
            ":cpf"=>$this->getCpf(),
			":data_nascimento"=>$this->getData_nascimento(),
            ":rg"=>$this->getRg(),
            ":endereco_atual"=>$this->getEndereco_atual(),
            ":estado_civil"=>$this->getEstado_civil(),
            ":nacionalidade"=>$this->getNacionalidade(),
            ":profissao"=>$this->getProfissao(),
            ":rne"=>$this->getRne(),
            ":agencia"=>$this->getAgencia(),
            ":conta"=>$this->getConta(),
            ":banco"=>$this->getBanco(),
            ":celular"=>$this->getCelular()
		));
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}

	public function update($id, $nome, $cpf, $data_nascimento, $rg, $endereco_atual, $nacionalidade, $profissao, $rne, $agencia, $conta, $banco, $celular)
	{
        $this->setId($id);
		$this->setNome($nome);
        $this->setCpf($cpf);
        $this->setData_nascimento($data_nascimento);
        $this->setRg($rg);
        $this->setEndereco_atual($endereco_atual);
        $this->setNacionalidade($nacionalidade);
        $this->setProfissao($profissao);
        $this->setRne($rne);
        $this->setAgencia($agencia);
        $this->setConta($conta);
        $this->setBanco($banco);
        $this->setCelular($celular);
		$sql = new Sql();
		$sql->query("UPDATE proprietario SET nome_pro = :nome, cpf_pro = :cpf, data_nascimento_pro = :data_nascimento, rg_pro = :rg, endereco_atual_pro = :endereco_atual, estado_civil_pro = :estado_civil, nacionalidade_pro = :nacionalidade, profissao_pro = :profissao, rne_pro = :rne, agencia_pro = :agencia, conta_pro = :conta, banco_pro = :banco, celular_pro = :celular  WHERE id_pro = :id",array(
			":id"=>$id,
			":nome"=>$nome,
			":cpf"=>$cpf,
            ":data_nascimento"=>$data_nascimento,
            ":rg"=>$rg,
            ":endereco_atual"=>$endereco_atual,
            ":estado_civil"=>$estado_civil,
            ":nacionalidade"=>$nacionalidade,
            ":profissao"=>$profissao,
            ":rne"=>$rne,
            ":agencia"=>$agencia,
            ":conta"=>$conta,
            ":banco"=>$banco,
            ":celular"=>$celular
		));
	}

	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM proprietario WHERE id_pro = :id",array(":id"=>$this->getId()));
	}  

	public function __construct($nome="", $cpf="", $data_nascimento="", $rg="", $endereco_atual="", $estado_civil="", $nacionalidade="", $profissao="", $rne="", $agencia="", $conta="", $banco="", $celular="")
	{
		$this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->rg = $rg;
        $this->endereco_atual = $endereco_atual;
        $this->estado_civil = $estado_civil;
        $this->nacionalidade = $nacionalidade;
        $this->profissao = $profissao;
        $this->rne = $rne;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->banco = $banco;
        $this->celular = $celular;
	}
	
	public function __toString()
	{
		return json_encode(array(
			"id_pro"=>$this->getId(),
			"nome_pro"=>$this->getNome(),
            "cpf_pro"=>$this->getCpf(),
            "data_nascimento_pro"=>$this->getData_nascimento(),
            "rg_pro"=>$this->getRg(),
            "endereco_atual_pro"=>$this->getEndereco_atual(),
            "estado_civil_pro"=>$this->getEstado_civil(),
            "nacionalidade_pro"=>$this->getNacionalidade(),
            "profissao_pro"=>$this->getProfissao(),
            "rne_pro"=>$this->getRne(),
            "agencia_pro"=>$this->getAgencia(),
            "conta_pro"=>$this->getConta(),
            "banco_pro"=>$this->getBanco(),
            "celular_pro"=>$this->getCelular()
		));
	}

}

?>