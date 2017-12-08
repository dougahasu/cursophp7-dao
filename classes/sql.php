<?php
	class sql extends PDO{
		private $conn;

		public function __construct($bdHost, $bdNome, $bdUser, $bdPWS){
			$this->conn = new PDO("pgsql:host=$bdHost;dbname=$bdNome", $bdUser, $bdPWS);
		}

		private function setParams($statment, $parameters = array()){
			foreach ($parameters as $key => $value) {
				$this->setParam($statment,$key, $value);
			}
		}

		private function setParam($statment, $key, $value){
			$statment->bindParam($key, $value);
		}

		public function query($rawQuery, $params = array()){
			$stmt = $this->conn->prepare($rawQuery);
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt;
		}

		public function select($rawQuery, $params = array()):array{
			$stmt = $this->query($rawQuery, $params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>