<?php
	require_once('config.php');

	class usuarios
	{
		private $codigo;
		private $usuario;
		private $nome;
		private $senha;
		private $mailUser;
		
		public function getCodigo(){
			return $this->codigo;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getMail(){
			return $this->mailUser;
		}

		public function setCodigo($value){
			$this->codigo = $value;
		}
		public function setUsuario($value){
			$this->usuario = $value;
		}
		public function setNome($value){
			$this->nome = $value;
		}
		public function setSenha($value){
			$this->senha = sha1(md5($value));
		}
		public function setMail($value){
			$this->mailUser = $value;
		}

		public function loadById($id){
			$sql = new sql('localhost', 'db_teste', 'postgres', 'postgres2000');
			$usuario = $sql->select("SELECT * FROM tb_usuarios WHERE codigo = :id", array(":id"=>$id));

			if(count($usuario) > 0){
				$row = $usuario[0];

				$this->setCodigo($row['codigo']);
				$this->setUsuario($row['usuario']);
				$this->setNome($row['nome']);
				$this->setSenha($row['senha']);
				$this->setMail($row['mail']);
			}
		}

		public function __toString(){
			return json_encode(array(
				"codigo"=>$this->getCodigo(),
				"usuario"=>$this->getUsuario(),
				"nome"=>$this->getNome(),
				"senha"=>$this->getSenha(),
				"mail"=>$this->getMail()
			));
		}
	}
?>