<?
class MySql {
    const login = "mysql" ;
    const password = "mysql" ;
    const BDname= "kredit_test_work" ;
    const host= "localhost" ;
    protected $connection;

    protected function getConnection () {
        $this->connection = new mysqli(self::host , self::login, self::password, self::BDname);
        if ($this->connection->connect_error) {
            $this->connection = "Ошибка в подключении к БД : ".$this->connection->connect_error;
        } 
    }

    protected function closeConnection () {
        if (!empty( $this->connection)){
            $this->connection->close();
        }
    }
}
?>