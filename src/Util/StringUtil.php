<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | user : 放下
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2019/7/26 17:13
// +----------------------------------------------------------------------


namespace WGCYunPay\Util;


class StringUtil
{
    public static function round(int $len = 6): string
    {
        $str = 'a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9';
        $arr = explode(' ', $str);
        $rand_keys = array_rand($arr, $len);
        shuffle($rand_keys);
        $code = '';
        foreach ($rand_keys as $index=>$key){
            $code .= $arr[$key];
        }
        return $code;
    }

    public static function unCame(string $str){
        $str = preg_replace_callback('/([A-Z]{1})/',function($matches){
            return '_'.strtolower($matches[0]);
        },$str);
        return ltrim($str, '_');
    }
}
