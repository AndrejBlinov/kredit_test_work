<?
namespace ORM ;
require_once(__DIR__ . "/../ORM.php");

class ORM_books_rent_cost extends ORM {
    
    private $id;
	private $book_id;
    private $rent_cost;

    public $tableName = "books_rent_cost";

    public function __construct() {
	}

    public function getId() {
		return $this->id;
	}

    public function get_book_id() {
		return $this->book_id;
	}

	public function set_book_id($book_id) {
		$this->book_id = $book_id;
	}

    public function get_rent_cost() {
		return $this->book_id;
	}

	public function set_rent_cost($rent_cost) {
		$this->rent_cost = $rent_cost;
	}
}

?>