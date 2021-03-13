<?
require_once(__DIR__ . "/api/IOData.php");
$paramsArray = array(
    'select'=> array('*'),
    'where' =>array('id',"=","1"),
    'order'=>array(
        'by'=>"ID",
        'sort'=> "DESC",
    ),
    'limit'=> '10',

    'from'=>'books',
    //'insert'=>array('name'=>'Война и мир'),
    //'delete'=>array('id','>','1'),
    
);

$data = new IOData('MySql', $paramsArray);
$result = $data->getDataConnection();

echo("<pre>");
print_r($result);
echo("</pre>");
?>