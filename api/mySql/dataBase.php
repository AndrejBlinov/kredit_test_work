<?
require_once(__DIR__ . "/ORM/include.php");

interface iSqlQuery {
    public function Exec(array $params);
} 

//Класс для подключение к БД

class BD implements iSqlQuery{
    
    public function Exec($params){
        if ( isset($params['from']) )
        {
            switch($params['from']){
                case 'books':
                    $ormTable = new ORM\ORM_books();
                break;
                case 'arendator':
                    $ormTable = new ORM\ORM_arendator();
                break;
                case 'books_rent':
                    $ormTable = new ORM\ORM_books_rent();
                break;
                case 'books_rent_cost':
                    $ormTable = new ORM\ORM_books_rent_cost();
                break;
            }
            if (isset($params['select'])){
                $result = $ormTable->select($params['select'])
                    ->where($params['where'])
                    ->queryExec() ;
            }
            elseif(isset($params['delete'])){
                $result = $ormTable->delete($params)
                    ->where($params['where'])
                    ->queryExec() ;
            }
            elseif(isset($params['insert']) || isset($params['update'])) {
                    $result = $ormTable->save($params) 
                        ->queryExec() ;
            } 
        }
        else{
            return $result['error'] = "не задана таблица для работы";
        }
        
        return $result;

    }
}

?>