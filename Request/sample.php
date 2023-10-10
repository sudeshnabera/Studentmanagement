<?php
$value="anirban";
$password="1234";
$result = $db->fetch("SELECT * FROM users WHERE username = :username AND password = :password", ["username" => $value, "password"=> $password] );

"SELECT * FROM users WHERE username = $value";
"SELECT * FROM users WHERE username = anirban AND password=1234";

$result = $db->fetch("SELECT * FROM users WHERE id = :id", ["id" => 1]);
"SELECT * FROM users WHERE id=1
