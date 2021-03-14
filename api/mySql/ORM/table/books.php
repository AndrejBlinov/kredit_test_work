<?
namespace ORM ;
require_once(__DIR__ . "/../ORM.php");

class ORM_books extends ORM {
    
    private $id;
	private $name;

    public $tableName = "books";

    public function __construct() {
	}

    public function getId() {
		return $this->id;
	}

    public function getBooks_name() {
		return $this->name;
	}

	public function setBooks_name($name) {
		$this->name = $name;
	}
}

?>