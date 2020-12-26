<?PHP
class Survey{
	private $ids;
	private $nom;
	private $question;
    private $type;
    
	function __construct($nom,$question,$type){	
		$this->nom=$nom;
		$this->question=$question;
		$this->type=$type;
	}
	
	function getids(){
		return $this->ids;
	}
	function getnom(){
		return $this->nom;
	}
	function getquestion(){
		return $this->question;
	}
	function gettype(){
		return $this->type;
	}


	function setids($ids){
		$this->ids=$ids;
	}
	function setnom($nom){
		$this->nom=$nom;
	}
	function setquestion($question){
		$this->question=$question;
	}
	function settype($type){
		$this->type=$type;
	}
    
}

?>