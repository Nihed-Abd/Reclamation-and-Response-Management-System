<?PHP
	class reponse{
		private $id;
		private $reponse;
		private $idd;
		
		function __construct($id, $reponse, $idd)
        {
			$this->id = $id;
            $this->reponse = $reponse;
			$this->idd = $idd;
		}
		
		function getID(){
			return $this->id;
		}
		function getReponse(){
			return $this->reponse;
		}
		function getIDD(){
			return $this->idd;
		}
		
		function setName($reponse): void{
			$this->reponse=$reponse;
		}
	}

?>