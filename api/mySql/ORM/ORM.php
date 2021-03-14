<?
namespace ORM ;
require_once(__DIR__ . "/SqlConnect.php");

class ORM  extends MySqlConnection{

    private string $query = "";

    public function select($params){
        foreach( $params as $i=>$item )
        {
            empty($select) ? $select .=$item : $select .=",".$item ;
        }  	
        $this->query .=  " Select ".$select." from ".  $this->tableName  ;
        return $this;
    }

    public function where($params){
        $where = " Where ";
        $ar=array();
        foreach($params as $item){
            $ar[] = $item[0] . $item[1] . $item[2] ;
        }
        $where .= implode(' AND ',$ar); 	
        $this->query .= $where ;
        return $this;
    } 

    public function order($params){
        $this->$query .= " order by ". $params['by'].' '. $params["sort"] ;
        return $this;
    }

    public function limit($params){
        $this->$query .= " limit ". $params['limit'] ;
        return $this;
    }

    public function save($params) {
        if (isset($params['id'])) {
            $this->_update($params);
        } else {
            $this->_insert($params);
        }
        return $this;
    }

    public function delete() {
        $this->$query .= "DELETE from ". $this->tableName ;
        return $this;
    }

    private function _update($params) {
        $this->query .= "UPDATE ". $this->tableName ." SET ";
        $udate="";
        foreach( $params as $i=>$item )
        {
            empty($update) 
                ? $update .= $i.'="'.$item.'"' 
                : $select .=",".$i.'="'.$item.'"' ;
        } 
        $this->query .=  $update ;
        $this->where($params);
        return $this;
    } 
    
    private function _insert($params) {     
        $insertValue = "";
        $insertKey= "";
        foreach($params['insert'] as $key=>$value){
            empty($insertValue) ? 
                $insertValue.= '"'.$value.'"' : 
                $insertValue.= ',"'.$value.'"';
            empty($insertKey) ? 
                $insertKey.= $key : $insertKey.= " , ".$key;
        }
        $insertValue = '('.$insertValue.')';
        $insertKey =  '('.$insertKey.')';
        $this->query .=  "INSERT INTO ". $this->tableName ." ". $insertKey." VALUES ".$insertValue ;
        return $this;
    }

    public function queryExec () {
        $this->getConnection();
        if ($resultQuery = $this->connection->query($this->query)) {
            if(gettype($resultQuery)!=='boolean'){
                return $resultQuery->fetch_all() ;
            }
            else{
                return $resultQuery;
            }
        } 
        else{
            $result['error'] =  "Ошибка в запросе: " . $query ;
        }
        $this->closeConnection();
    }

}
?>