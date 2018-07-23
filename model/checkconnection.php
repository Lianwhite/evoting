<?php

class checkconnection
{
    public static function isConnected()
{
    $connected = @fsockopen("www.example.com", 80); 

    if ($connected){

        $is_conn = true; //action when connected

        fclose($connected);

    }else{

        $is_conn = false; //action in connection failure

    }

    return $is_conn;
}
}