<?
require_once(__DIR__ ."/SqlConnect.php");


class tableORMbooks_rent extends MySql {
    
    private $id;
	private $book_id;
	private $arendator_id;
	private $rent_time;
	private $deposit;

    public $tableName = "books_rent";

    public function __construct() {
	}

    public function getId() {
		return $this->id;
	}

    public function setBook_id($book_id) {
		$this->book_id = $book_id;
	}
	
	public function getBook_id() {
		return $this->book_id;
	}

    public function getBook_name() {
		return 'book_id';
	}
	
	public function setArendator_id($arendator_id) {
		$this->arendator_id = $arendator_id;
	}
	
	public function getArendator_id() {
		return $this->arendator_id;
	}

    public function getArendator_name() {
		return 'arendator_id';
	}
	
	public function setRent_time($rent_time) {
		$this->rent_time = $rent_time;
	}
	
	public function getRent_time() {
		return $this->rent_time;
	}
    
    public function getRent_time_name() {
		return 'rent_time';
	}
	
	public function setDeposit($deposit) {
		$this->deposit = $deposit;
	}
	
	public function getDeposit() {
		return $this->deposit;
	}
    
    public function getDeposit_name() {
		return 'deposit';
	}

    public function save() {
        if (isset($this->id)) {
            $this->_update();
        } else {
            $this->_insert();
        }
    }

    private function _update() {
        $this->getConnection();

        $this->closeConnection();
    }
    
    private function _insert() {
        $this->getConnection(); 

        $query = "INSERT INTO ". $this->tableName ;
        $value ="(";
        $value .= $this->book_id;
        $value .= "," .$this->arendator_id;
        $value .= "," .$this->rent_time;
        $value .= "," .$this->deposit;
        $value .=")";

        $keys = "(";
        $keys .= $this->getArendator_name();  
        $keys .= "," .$this->getRent_time_name();
        $keys .= "," .$this->getDeposit_name();
        $keys .=")";

        $query .= " ". $keys ." VALUES ". $value; 
        $result = $this->queryExec($query);
        $new_id = $this->connection->insert_id;
        $this->id = $new_id;
        $this->closeConnection();
        return $new_id;
    }

    public function get($params) {
        $this->getConnection(); 
        $result=[];
        foreach( $params['select'] as $i=>$item )
        {
            empty($select) ? $select .=$item : $select .=",".$item ;
        } 
        $query = "Select ".$select . " from ". $params['from'] ;
        $query .= " Where ". $params['where'][0] . $params['where'][1] . $params['where'][2] ;
        if (isset($params['order'])){
            $query .= " order by ". $params['order']['by'].' '. $params['order']["sort"] ;
        }
        if (isset($params['limit'])){
            $query .= " limit ". $params['limit'] ;
        }
        $resultQuery = $this->queryExec($query);
        while($obj = $resultQuery->fetch_object()){
            $result[] = $obj;
        } 
        $this->closeConnection();
        return $result;
    }

    private function queryExec (string $query) {
        if ($resultQuery = $this->connection->query($query)) {
            return $resultQuery ;
        } 
        else{
            return "Ошибка в запросе: " . $query ;
        }
    }
}

?>