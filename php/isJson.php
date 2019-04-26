<?php
/**
 * 判断字符串是否为json字符串
 *   - 如果能返回数据,则为json
 */

function isJson($str = '')
{
    $data     = json_decode($str, true);
    if ($data && (is_object($data)) || is_array($data))
    {
        return $data;
    }

    return false;
}


$str = '["123123"]';

$res = isJson($str);

var_dump($res);
