<?php

require __DIR__ . '/vendor/autoload.php';
use App\Controllers\PageController;
use App\Config\ClientPDO;
use App\Models\Page;

// OK
// $sd = new TestController();
// $sd->printt('dfsdf');
// exit();

$url = $_GET['url'] ?? '';


$parts = explode('/', $url);
$friendly = $parts[0] ?? '';
echo $friendly . '<br>';
// $df = new PageController("dfdfdsfsdf"); //ok

$clientPDO = ClientPDO::getInstance();
$pdo = $clientPDO->getClient();

// $sql = 'SELECT * FROM pages';

// $statement = $pdo->query($sql);

// // get all publishers
// $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($publishers);
// echo '</pre>';
// exit();
$controller = new PageController(new Page($pdo));
// $controller->getById('1');
//$controller->show($friendly);
//
//
//echo '<pre>';
//var_dump($controller->index());
//echo '</pre>';
//exit();

if ($friendly === '') {
//   $controller->index();
} else {
   $controller->show($friendly);
}
