<?php
date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海

//获取今日开始时间戳和结束时间戳

$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday   = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

var_dump($beginToday);
var_dump($endToday);



//获取昨日起始时间戳和结束时间戳  
$beginYesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));  
$endYesterday   = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;

var_dump($beginYesterday);
var_dump($endYesterday);



//获取本周起始时间戳和结束时间戳
$beginThisweek  = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('y'));
$endThisweek    = time();

var_dump($beginThisweek);
var_dump($endThisweek);


//获取上周起始时间戳和结束时间戳
$beginLastweek  = mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
$endLastweek    = mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));

var_dump($beginLastweek);
var_dump($endLastweek);


//获取本月起始时间戳和结束时间戳  
$beginThismonth = mktime(0,0,0,date('m'),1,date('Y'));  
$endThismonth   = mktime(23,59,59,date('m'),date('t'),date('Y'));

var_dump($beginThismonth);
var_dump($endThismonth);


//上个月的起始时间:
$beginTime     = strtotime(date('Y-m-01 00:00:00',strtotime('-1 month')));
$endTime       = strtotime(date("Y-m-d 23:59:59", strtotime(-date('d').'day')));
var_dump($beginTime);
var_dump($endTime);

// 本年度超止时间
$begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
$end_year = strtotime(date("Y",time())."-12"."-31"); //本年结束
var_dump($begin_year);
var_dump($end_year);

