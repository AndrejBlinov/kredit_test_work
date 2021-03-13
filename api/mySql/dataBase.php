<?
require_once(__DIR__ . "/ORM.php");

interface iSqlQuery {
    public function Exec(array $params);
}

//Класс для подключение к БД

class BD implements iSqlQuery{
    
    function Exec($params){
        $ormTable = new tableORMbooks_rent();
        if (isset($params['select'])){
            $result = $ormTable->get($params) ;
        }
        elseif(isset($params['insert'])){
            $result = $ormTable->save($params) ;
        }
        
        return $result;

    }
}

?>