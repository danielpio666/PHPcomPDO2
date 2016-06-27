<?

class Alunos {

	private $db;
	private $id;
	private $nome;
	private $fone;
	private $email;
	private $idade;
	private $sexo;
	private $nota;
	
	public function __construct(PDO $db){
		$this->db = $db;
	}

	public function Incluir() {

		try {
			$query = "INSERT INTO alunos (nome, email, fone, idade, sexo, nota) VALUES (:nome, :email, :fone, :idade, :sexo, :nota)";

			$stmt = $this->db->prepare($query);

			$stmt->bindValue(':nome',  $this->getNome());
			$stmt->bindValue(':email', $this->getEmail());
			$stmt->bindValue(':fone',  $this->getFone());
			$stmt->bindValue(':idade', $this->getIdade());
			$stmt->bindValue(':sexo',  $this->getSexo());
			$stmt->bindValue(':nota',  $this->getNota());

			if ($stmt->execute()) {
				echo "<script>alert('Dados salvos com sucesso!!!');</script>";
				return true;
			}
		} catch(PDOExeption $e) {
			die("Problemas com a gravação - Erro : ".$e->getCode()." - ".$e->getMessage());
		}	
	}

	public function Alterar() {
		try {
			$query = "UPDATE alunos SET 
						nome	= :nome, 
						email	= :email, 
						fone	= :fone, 
						idade	= :idade, 
						sexo	= :sexo,
						nota    = :nota
						WHERE id = :id ";

			$stmt = $this->db->prepare($query);

			$stmt->bindValue(':id',  	$this->getId());
			$stmt->bindValue(':nome',  	$this->getNome());
			$stmt->bindValue(':email', 	$this->getEmail());
			$stmt->bindValue(':fone',  	$this->getFone());
			$stmt->bindValue(':idade', 	$this->getIdade());
			$stmt->bindValue(':sexo',  	$this->getSexo());
			$stmt->bindValue(':nota',   $this->getNota());

			if ($stmt->execute()) {
				echo "<script>alert('Dados salvos com sucesso!!!');</script>";
				return true;
			}
		} catch(PDOExeption $e) {
			die("Problemas com a gravação - Erro : ".$e->getCode()." - ".$e->getMessage());
		}	
	}

	public function Excluir() {
		try {
			$query = "DELETE FROM alunos WHERE id = :id ";
			$stmt = $this->db->prepare($query);

			$stmt->bindValue(':id',  	$this->getId());

			if ($stmt->execute()) {
				echo "<script>alert('Registro Excluido com sucesso!!!');</script>";
				return true;
			}
		} catch(PDOExeption $e) {
			die("Problemas com a remoção do registro - Erro : ".$e->getCode()." - ".$e->getMessage());
		}	
	}

	public function Pesquisar($tipo) {

		if ($tipo == "all") {

			$query = "SELECT * FROM alunos ORDER BY nome";

			$stmt = $this->db->query($query);

			if (!$stmt->execute()) {
				echo "<script>alert('Problemas com o a pesquisa!!!');</script>";
				return false;
			} else {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}	
		
		} elseif ($tipo == "single") { 
		
			$query = "SELECT * FROM alunos WHERE id = :id";

			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $this->getId());

			if (!$stmt->execute()) {
				echo "<script>alert('Problemas com o Registro!!!');</script>";
				return false;
			} else {
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}
		} else {
			return false;
		}

	}

	public function getId()
	{
	    return $this->id;
	}
	
	public function setId($id)
	{
	    $this->id = $id;
	    return $this;
	}

	public function getNome()
	{
	    return $this->nome;
	}
	
	public function setNome($nome)
	{
	    $this->nome = $nome;
	    return $this;
	}

	public function getFone()
	{
	    return $this->fone;
	}
	
	public function setFone($fone)
	{
	    $this->fone = $fone;
	    return $this;
	}

	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}

	public function getIdade()
	{
	    return $this->idade;
	}
	
	public function setIdade($idade)
	{
	    $this->idade = $idade;
	    return $this;
	}
	public function getSexo()
	{
	    return $this->sexo;
	}
	
	public function setSexo($sexo)
	{
	    $this->sexo = $sexo;
	    return $this;
	}
	public function getNota()
	{
	    return $this->nota;
	}
	
	public function setNota($nota)
	{
	    $this->nota = $nota;
	    return $this;
	}

}

?>