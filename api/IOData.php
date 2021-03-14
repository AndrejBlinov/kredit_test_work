<?

interface iSelectData {
    public function getDataConnection(array $params);
}

//класс интерфейс для определения источника получения данных
class IOData implements iSelectData{

    private string $ConnType ="" ;


    function __construct( string $ConectionType) 
    { 
        $this->ConnType = $ConectionType;
    }
 
    public function getDataConnection($params){
        //выбираем тип подключение.
        if($this->ConnType==="MySql"){
            require_once(__DIR__ . "/mySql/dataBase.php");
            $dataBase = new BD();
            $result = $dataBase->Exec($params);
        }
        return $result;
    }
}