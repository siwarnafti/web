<?PHP
class reponse{
    private $idr;
    private $ids;
	private $idc;
	private $reponse;

    
	function __construct($ids,$idc,$reponse){	
        $this->ids=$ids;
        $this->idc=$idc;
		$this->reponse=$reponse;

	}
	
	function getidr(){
		return $this->idr;
	}
	function getidc(){
		return $this->idc;
    }
    function getids(){
		return $this->ids;
	}
	function getreponse(){
		return $this->reponse;
	}

	function setidr($idr){
		$this->idr=$idr;
	}
	function setidc($idc){
		$this->idc=$idc;
    }
    function setids($ids){
		$this->ids=$ids;
	}
	function setreponse($reponse){
		$this->reponse=$reponse;
	} 
}

?>