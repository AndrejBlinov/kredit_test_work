<?

interface iSelectData {
    public function getDataConnection();
}

//класс интерфейс для определения источника получения данных
class IOData implements iSelectData{
    private string $ConnType ="123" ;
    private array $params ;

    function __construct( string $ConectionType , array $arrayName) 
    {
        $this->params = $arrayName; 
        $this->ConnType = $ConectionType;
    }
 
    public function getDataConnection(){
        //выбираем тип подключение.
       
        if($this->ConnType==="MySql"){
            $result = $this->DataMySql() ;
        }
        return $result;
    }

    private function DataMySql() {
        require_once(__DIR__ . "/mySql/dataBase.php");
        $dataBase = new BD();
        $result = $dataBase->Exec($this->params);
        return  $result;
    }
}