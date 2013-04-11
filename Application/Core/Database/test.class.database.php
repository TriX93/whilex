<?php
require_once 'class.database.php';

$db = Database::init();
$users = $db->select('users')->fields(array('id', 'nick'))->orderby('id')->run()->fetchAllAssoc(); 

echo "Initial data: <br /><pre>"; 
var_dump($users); 
echo "</pre>"; 

$fields = array('nick' => 'Claudio'.time()); 
$db->insert('users')->fields($fields)->run();
$lastInsertId = $db->lastInsertId();

echo '<br >';
echo 'Last: id:'.$lastInsertId;
echo '<br >';

$users = $db->select('users')->fields(array('id', 'nick'))->orderby('id')->run()->fetchAllAssoc(); 

echo "Data after insert: <br /><pre>"; 
var_dump($users); 
echo "</pre>"; 

$updatefields = array('nick' => 'Claudios'.time());
$db->update('users')->fields($updatefields)->where('id', $lastInsertId)->run(); 
$users = $db->select('users')->fields(array('id', 'nick'))->orderby('id')->run()->fetchAllAssoc(); 

echo "Data after update: <br /><pre>"; 
var_dump($users); 
echo "</pre>";

?>