<?
require_once(__DIR__ . "/api/IOData.php");

/*
    Страница оформления нового заказа.
*/

//    параметры для фронта. Получаем цену аренды книг , чтобы выполнить условие
//    В форме невозможно указать сумму, меньшую чем 30% от стоимости аренды, равной стоимости аренды за 1 день, умноженной на срок.
$paramsArray = array(
    'select'=> array('*'),
    'where' =>array('',"","1"),
    'from'=>'books_rent_cost',
);

$data = new IOData('MySql', $paramsArray);
$result = $data->getDataConnection();

echo("<pre>");
print_r($result);
echo("</pre>");
?>