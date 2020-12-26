<?PHP
class reclamation{
	private $id_reclamation;
	private $nom;
	private $email;
    private $message;
    private $confirmer;
	function __construct($nom,$email,$message,$confirmer){
		$this->nom=$nom;
		$this->email=$email;
        $this->message=$message;
        $this->$confirmer=$confirmer;	
		
	}
	
	function getid_reclamation(){
		return $this->id_reclamation;
	}
	function getnom(){
		return $this->nom;
	}
	function getemail(){
		return $this->email;
	}
	function getmessage(){
		return $this->message;
    }
    function getconfirmer(){
		return $this->confirmer;
	}


	function setid_reclamation($id_reclamation){
		$this->id_reclamation=$id_reclamation;
	}
	function setnom($nom){
		$this->nom=$nom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setmessage($message){
		$this->message=$message;
    }
    function setconfirmer($confirmer){
		$this->confirmer=$confirmer;
	}
	
}

?>