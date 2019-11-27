<?php
/**
 * 在数组的某个位置插入数组
 *
 */

function array_insert (&$array, $position, $insert_array) 
{
    $first_array = array_splice ($array, 0, $position);
    $array = array_merge ($first_array, $insert_array, $array);
}


$arr = array(
   111, 222,333,444,555
);

print_r($arr);

$temp[2] = 111222;
array_insert($arr,1,$temp);
print_r($arr);
