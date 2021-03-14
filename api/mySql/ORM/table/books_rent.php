<?
namespace ORM ;
require_once(__DIR__ . "/../ORM.php");

class ORM_books_rent extends ORM {
    
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
}

?>