<?php 
class Inquilino
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
    private $condicao_pagamento
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
	public function getCelular()
	{
		return $this->celular;
	} 
	public function setCelular($value)
	{
		$this->celular = $value;
	} 
    public function getCondicao_pagamento()
	{
		return $this->condicao_pagamento;
	} 
	public function setCondicao_pagamento($value)
	{
		$this->condicao_pagamento = $value;
	} 


	public function loadById($id)
	{//carrega por ID
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM inquilino WHERE id_inq = :id", array(":id"=>$id));
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM inquilino ORDER BY nome_inq");
	} 

	public static function search($pro){
		$sql = new Sql();
		return $sql->select("SELECT * FROM inquilino WHERE nome_inq LIKE :nome",array(":nome"=>"%".$adm."%")); 
	}


	public function setData($data)
	{
		$this->setId($data['id_inq']);
		$this->setNome($data['nome_inq']);
        $this->setCpf($data['cpf_inq']);
        $this->setCelular($celular['celular_inq']);
        $this->setAgencia($condicao_pagamento['condicao_pagamento_inq']);
        $this->setRne($rne['rne_inq']);
        $this->setProfissao($profissao['profissao_inq']);
        $this->setNacionalidade($nacionalidade['nacionalidade_inq']);
        $this->setEndereco_atual($endereco_atual['endereco_atual_inq']);
        $this->setEstado_civil($estado_civil['estado_civil_inq']);
        $this->setRg($rg['rg_inq']);
        $this->setData_nascimento($data_nascimento['data_nascimento_inq']);
	}

	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_inq_insert(:nome, :cpf, :data_nascimento, :rg, :endereco_atual, :estado_civil, :nacionalidade, :profissao, :rne, :condicao_pagamento, :celular)", array(
			":nome"=>$this->getNome(),
            ":cpf"=>$this->getCpf(),
			":data_nascimento"=>$this->getData_nascimento(),
            ":rg"=>$this->getRg(),
            ":endereco_atual"=>$this->getEndereco_atual(),
            ":estado_civil"=>$this->getEstado_civil(),
            ":nacionalidade"=>$this->getNacionalidade(),
            ":profissao"=>$this->getProfissao(),
            ":rne"=>$this->getRne(),
            ":condicao_pagamento"=>$this->getCondicao_pagamento(),
            ":celular"=>$this->getCelular()
		));
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}

	public function update($id, $nome, $cpf, $data_nascimento, $rg, $endereco_atual, $nacionalidade, $profissao, $rne, $condicao_pagamento, $celular)
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
        $this->setCondicao_pagamento($condicao_pagamento);
        $this->setCelular($celular);
		$sql = new Sql();
		$sql->query("UPDATE inquilino SET nome_inq = :nome, cpf_inq = :cpf, data_nascimento_inq = :data_nascimento, rg_inq = :rg, endereco_atual_inq = :endereco_atual, estado_civil_inq = :estado_civil, nacionalidade_inq = :nacionalidade, profissao_inq = :profissao, rne_inq = :rne, condicao_pagamento_inq = :condicao_pagamento, celular_pro = :celular  WHERE id_inq = :id",array(
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
            ":condicao_pagamento"=>$condicao_pagamento,
            ":celular"=>$celular
		));
	}

	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM inquilino WHERE id_inq = :id",array(":id"=>$this->getId()));
	}  

	public function __construct($nome="", $cpf="", $data_nascimento="", $rg="", $endereco_atual="", $estado_civil="", $nacionalidade="", $profissao="", $rne="", $condicao_pagamento="", $celular="")
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
        $this->condicao_pagamento = $condicao_pagamento;
        $this->celular = $celular;
	}
	
	public function __toString()
	{
		return json_encode(array(
			"id_inq"=>$this->getId(),
			"nome_inq"=>$this->getNome(),
            "cpf_inq"=>$this->getCpf(),
            "data_nascimento_inq"=>$this->getData_nascimento(),
            "rg_inq"=>$this->getRg(),
            "endereco_atual_inq"=>$this->getEndereco_atual(),
            "estado_civil_inq"=>$this->getEstado_civil(),
            "nacionalidade_inq"=>$this->getNacionalidade(),
            "profissao_inq"=>$this->getProfissao(),
            "rne_inq"=>$this->getRne(),
            "condicao_pagamento_inq"=>$this->getAgencia(),
            "celular_inq"=>$this->getCelular()
		));
	}

}

?>