<?PHP
class rating{
	private $idpr;
	private $idc;
	private $idp;
	private $rating;
	function __construct($idc,$idp,$rating){	
		$this->idc=$idc;
		$this->idp=$idp;
		$this->rating=$rating;
		
	}
	
	function getidpr(){
		return $this->idpr;
	}
	function getidc(){
		return $this->idc;
	}
	function getidp(){
		return $this->idp;
	}
	function getrating(){
		return $this->rating;
	}


	function setidpr($idpr){
		$this->idpr=$idpr;
	}
	function setidc($idc){
		$this->idc=$idc;
	}
	function setidp($idp){
		$this->idp=$idp;
	}
	function setrating($rating){
		$this->rating=$rating;
	}
    
}

?>