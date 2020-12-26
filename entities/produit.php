<?PHP
class Produits{
	private $pid;
	private $pname;
	private $pcategory;
	private $pprice;
	function __construct($pname,$pcategory,$pprice){	
		$this->pname=$pname;
		$this->pcategory=$pcategory;
		$this->pprice=$pprice;
		
	}
	
	function getpid(){
		return $this->pid;
	}
	function getpname(){
		return $this->pname;
	}
	function getpcategory(){
		return $this->pcategory;
	}
	function getpprice(){
		return $this->pprice;
	}


	function setpid($pid){
		$this->pid=$pid;
	}
	function setpname($pname){
		$this->pname=$pname;
	}
	function setpcategory($pcategory){
		$this->pcategory=$pcategory;
	}
	function setpprice($pprice){
		$this->pprice=$pprice;
	}
    
}

?>