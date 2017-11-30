<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/Config/autoload.php';
use Helpers\Handlers;
echo "<h2> index file</h2>";
echo \App\Controllers\User::$hello . "</br>";
echo \App\Models\User::$hello;
echo "Test commit for github"."</br>";
$db = new \Config\Db();
//$result = $db->execute('CREATE TABLE Foo (id SERIAL)');
//var_dump($result);
$result_new = $db->query('SELECT * FROM Authors WHERE id>3');
Handlers::eco_dump($result_new);