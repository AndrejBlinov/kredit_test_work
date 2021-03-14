<?
require_once(__DIR__ . "/api/IOData.php");
$paramsArray = array(
    'select'=> array('*'),
    'where' =>array(array('id',"=","1"),array('name',"<>",'""')),
    'order'=>array(
        'by'=>"ID",
        'sort'=> "DESC",
    ),
    'limit'=> '10',
    'from'=>'books',
    //'insert'=>array('name'=>'Война и мир'),
    //'delete'=>array('id','>','1'),
    //'update'=>array('name'=>'Война и мир'),
    
);

$data = new IOData('MySql');
$result = $data->getDataConnection($paramsArray);

echo("<pre>");
print_r($result);
echo("</pre>");
?>