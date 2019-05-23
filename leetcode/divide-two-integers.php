<?php 
/**给定两个整数，被除数 dividend 和除数 divisor。将两数相除，要求不使用乘法、除法和 mod 运算符。
返回被除数 dividend 除以除数 divisor 得到的商。
 * 
 */
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        if ($divisor == 0 || ($dividend == INT_MIN && $divisor == -1)) return INT_MAX;
        $m = abs($dividend);
         $n = abs($divisor);
         $res = 0;
        $sign = (($dividend < 0) ^ ($divisor < 0)) ? -1 : 1;
        if ($n == 1) return $sign == 1 ? $m : -$m;
        while ($m >= $n) {
            $t = $n;
             $p = 1;
            while ($m >= ($t << 1)) {
                $t <<= 1;
                $p <<= 1;
            }
            $res += $p;
            $m -= $t;
        }
        return $sign == 1 ? $res : -$res;
    }

 
}

$Solution=new Solution();

echo $Solution->divide(-2147483648,-1);