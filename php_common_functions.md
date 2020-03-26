# PHP常用函数

## 生成指定长度的随机字符串

```php
function getRandomString($len, $chars=null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

var_dump(getRandomString(32));
```

## 判断一个数字是否为质数
```php
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
```

## 判断字符串是否为json字符串
> 如果能返回数据,则为json
```php
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
```

## 可以与Java互相实别的3DES加密
```php
class EncryptLib
{
    private $_key = "";

    public function __construct($key) {
        $this->_key = $key;
    }

    public function encrypt($str) {
        $td = $this->gettd();
        $ret = mcrypt_generic($td, $this->pkcs5_pad($str, 8));
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $this->strToHex($ret);
    }

    public function decrypt($str) {
        $td = $this->gettd();
        $ret = $this->pkcs5_unpad(mdecrypt_generic($td, $this->hexToStr($str)));
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $ret;
    }

    private function pkcs5_pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    private function pkcs5_unpad($text) {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) {
            return false;
        }
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }

    private function getiv() {
        return pack('H16', '0000000000000000');
    }

    private function gettd() {
        $iv = $this->getiv();
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
        @mcrypt_generic_init($td, $this->_key, $iv);
        return $td;
    }

    private function strToHex($string){
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return strtolower($hex);
    }

    private function hexToStr($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }

}
```

## 在数组的某个位置插入数组
```php
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
```

## 获取实现某接口的类
```php
function getImplementingClasses($interfaceName) {
    return array_filter(
     get_declared_classes(),
     function($className) use ($interfaceName) {
      return in_array($interfaceName, class_implements($className));
     }
    );
}
```

## 获取今日开始时间戳和结束时间戳
```php
$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday   = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

var_dump($beginToday);
var_dump($endToday);
```

## 获取昨日起始时间戳和结束时间戳
```php
$beginYesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));  
$endYesterday   = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;

var_dump($beginYesterday);
var_dump($endYesterday);
```

## 获取本周起始时间戳和结束时间戳
```php
$beginThisweek  = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('y'));
$endThisweek    = time();

var_dump($beginThisweek);
var_dump($endThisweek);
```

## 获取上周起始时间戳和结束时间戳
```php
$beginLastweek  = mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
$endLastweek    = mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));

var_dump($beginLastweek);
var_dump($endLastweek);
```

## 获取本月起始时间戳和结束时间戳 
```php
$beginThismonth = mktime(0,0,0,date('m'),1,date('Y'));  
$endThismonth   = mktime(23,59,59,date('m'),date('t'),date('Y'));

var_dump($beginThismonth);
var_dump($endThismonth);
```

## 上个月的起始时间
```php
$beginTime     = strtotime(date('Y-m-01 00:00:00',strtotime('-1 month')));
$endTime       = strtotime(date("Y-m-d 23:59:59", strtotime(-date('d').'day')));
var_dump($beginTime);
var_dump($endTime);
```

## 本年度超止时间
```php
$begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
$end_year = strtotime(date("Y",time())."-12"."-31"); //本年结束
var_dump($begin_year);
var_dump($end_year);
```

## 更平均的字符串散列方法, 采用crc32
```php
function hash_func(&$keyword, $n)
{
    $hash = crc32($keyword) >> 16 & 0x7fff;
    return $hash % $n;
}

$str = "xjaisjd13879123noaajsd12379";
$n = 20;

var_dump(hash_func($str, $n));
```
