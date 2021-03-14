<?
require_once(__DIR__ . "/../api/IOData.php");

/*
    Страница оформления нового заказа.
*/

//    параметры для фронта. Получаем цену аренды книг , чтобы выполнить условие
//    В форме невозможно указать сумму, меньшую чем 30% от стоимости аренды, равной стоимости аренды за 1 день, умноженной на срок.
//      Так же для формы потребуются справочники книг и арендаторов (для редактирования к примеру.)
$paramsArray = array(
    'select'=> array('*'),
    'where' =>array(array('id',"=","1")),
    'from'=>'books_rent_cost',
);

$data = new IOData('MySql');
$result = $data->getDataConnection($paramsArray);
echo("<pre> Справочник цен <br>");
print_r($result);
echo("</pre>");

$paramsArray = array(
    'select'=> array('*'),
    'where' =>array(array('id',"=","1")),
    'from'=>'books', 
);
$result = $data->getDataConnection($paramsArray);

echo("<pre> Справочник книг<br>");
print_r($result);
echo("</pre>");

/*  после внесения всех данных в форме сохраняем привязку в таблицу. Сделаем тестовы массив входных параметров.
    Тут надо было сделать через демона и пускать в очередь, но....
*/
$paramsArray = array(
    'insert'=>array('book_id'=>1,'arendator_id'=>1,'rent_time'=>date("Y-m-d"),'deposit'=>500),
    'from'=>'books_rent',
);
$result = $data->getDataConnection($paramsArray);

echo("<pre> Справочник книг<br>");
print_r($result);
echo("</pre>");

?>