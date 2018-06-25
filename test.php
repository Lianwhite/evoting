<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$startdate = strtotime("2018/06/22");
$end = strtotime("2018/06/25");
$today = strtotime("today midnight");
if($today >= $startdate && $today <= $end){
    echo "Active";
} else {
    echo "Ended";
}
