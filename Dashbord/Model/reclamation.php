<?PHP
	class reclamation{
		private $id;
		private $name;
		private $mail;
		private $type;		
        private $message;	
        private $idRec;	
		
		function __construct($id, $name, $mail, $type ,$message ,$idRec)
        {
			$this->id = $id;
            $this->name = $name;
            $this->mail = $mail;
            $this->type = $type;
            $this->message = $message;
            $this->idRec = $idRec;
		}
		
		function getID(){
			return $this->id;
		}
		function getName(){
			return $this->name;
		}
		function getMail(){
			return $this->mail;
		}
		function getType(){
			return $this->type;
		}
        function getMessage(){
			return $this->message;
		}
        function getIDRec(){
			return $this->idRec;
		}
		
		function setName($name): void{
			$this->name=$name;
		}
		function setMail($mail): void{
			$this->mail=$mail;
		}
		function setType($type): void{
			$this->type=$type;
		}
        function setMessage($message): void{
			$this->message=$message;
		}
        function setIDRec($idRec): void{
			$this->idRec=$idRec;
		}
	}

?>