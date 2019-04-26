<?php
/**
 * 判断一个数字是否为质数
 *
 */


function isPrimeNumber($n) {
    if ($n <= 3) {
        return $n > 1;
    } else if ($n % 2 === 0 || $n % 3 === 0) { // 排除能被2整除的数(2x)和被3整除的数(3x)
        return false;
    } else { // 排除能被6x+1和6x+5整除的数
        for ($i = 5; $i * $i <= $n; $i += 6) {
            if ($n % $i === 0 || $n % ($i + 2) === 0) {
                return false;
            }
        }
        return true;
    }
}


var_dump(isPrimeNumber(1));
