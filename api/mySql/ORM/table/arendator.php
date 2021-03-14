<?
namespace ORM ;
require_once(__DIR__ . "/../ORM.php");

class ORM_arendator extends ORM {
    
    private $id;
	private $name;

    public $tableName = "arendator";

    public function __construct() {
	}

    public function getId() {
		return $this->id;
	}

    public function getArendator_name() {
		return $this->name;
	}

	public function setArendator_name($name) {
		$this->name = $name;
	}
}

?>