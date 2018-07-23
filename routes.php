<?php

$path = trim(dirname($_SERVER['SCRIPT_NAME']), "/");

return [
    //GET
    $path => "controller/index.php",
    "{$path}/admin" => "controller/admin.php",
    "{$path}/candidates-reg" => "controller/candidatereg.php",
    "{$path}/login" => "controller/login.php",
    "{$path}/logout" => "controller/logout.php",
    "{$path}/register" => "controller/register.php",
    //POST
    "{$path}/formhandle" => "model/login.model.php",
    "{$path}/adminformhandle" => "model/adminformhandle.php",
    "{$path}/approvalhandle" => "model/approvalhandle.php",
    "{$path}/candidatereg" => "model/candidatereg.model.php",
    "{$path}/partyleadreghandle" => "model/partyleadreghandle.php",
    "{$path}/registerhandle" => "model/register.model.php",
    "{$path}/logout" => "controller/logout.php",
    "{$path}/confirmemail" => "controller/confirmemail.php"
];
