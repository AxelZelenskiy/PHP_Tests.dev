<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/Config/autoload.php';
echo "<h2> index file</h2>";
echo \App\Controllers\User::$hello . "</br>";
echo \App\Models\User::$hello;
echo "Test commit for github";