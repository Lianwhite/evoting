<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function me(){
    echo "First Function";
    me1();  
}
function me1(){
    echo "Second Function";
}
me();