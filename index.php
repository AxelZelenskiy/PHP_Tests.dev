<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/Config/autoload.php';
use Helpers\Handlers;
use App\Models\User;
echo "<h2> index file</h2>";
echo \App\Controllers\User::$hello . "</br>";
echo \App\Models\User::$hello;
echo "Test commit for github"."</br>";
//$db = new \Config\Db();
//$result = $db->execute('CREATE TABLE Foo (id SERIAL)');
//var_dump($result);
//$result_new = $db->query('SELECT * FROM Authors WHERE id>3');
//Handlers::eco_dump($result_new);
//$setting = \App\Traits\Settings::getInstance();
//Handlers::eco_dump($setting->data);
//Handlers::eco_dump($setting->data['user']);
//$setting->data['user'] = 'new_user';
//Handlers::eco_dump($setting->data['user']);
//$user = \App\Models\User::FindAll();
//Handlers::eco_dump($user);
//function sendMail(\App\Models\Model $user,$message = '') {
//    echo "Message send to ".$user->Name . " with surname ". $user->Surname;
//    echo "</br>".$message;
//}
//sendMail($user[1],'Hello world');
//Handlers::eco_dump(\App\Models\User::findById(66));
//$user2 = new \App\Models\User();
//$user2->Name = 'Alfonso';
//$user2->Surname= 'Del Gaddo';
//$user2->email = 'alfonso@mail.com';
//$user2->books = 'Woman!!! More Woman!!!';
//$user2->insert();
//echo "<h2> Trying to insert second sheet</h2>";
//$user2->insert();
$user_n = User::findById(1);
//Handlers::eco_dump($user_n);
echo "<h2>{$user_n->Surname}</h2>";
$user_n->books = 'Ancient Greece books';
echo "<h2>{$user_n->Surname}</h2>";
echo $user_n->id;
$user_n->save();
$user_n1 = new User();
$user_n1->Name = 'Rubinio';
$user_n1->Surname = 'Rubin';
$user_n1->email = 'Rubinio@yahoo.com';
$user_n1->save();
$user_n1->books = "Stones is our friends";
$user_n1->save();


