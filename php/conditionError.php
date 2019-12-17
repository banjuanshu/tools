<?php
// 三元运算符的使用问题

date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海


$a = 1;
$b = 1;

$c = 2;
$d = 3;

$s = ($a == $b) ? 2 : ($c < $b) ? 0 : 1;


var_dump($s);

$s = ($a == $b) ? 2 : (($c < $b) ? 0 : 1);
var_dump($s);

