<?php
/**
 * 更平均的字符串散列方法, 采用crc32
 *
 */


function hash_func(&$keyword, $n)
{
    $hash = crc32($keyword) >> 16 & 0x7fff;
    return $hash % $n;
}


$str = "xjaisjd13879123noaajsd12379";
$n = 20;

var_dump(hash_func($str, $n));
