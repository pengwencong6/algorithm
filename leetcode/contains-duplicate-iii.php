<?php


class Solution {

    function solution1($nums, $k, $t) {

        $map = [];

        foreach ($nums as $n) {

            //查找满足条件的数，nums [i] 和 nums [j] 的差的绝对值最大为 t

            foreach ($map as $m) {

                if(abs($m-$n)<=$t) return true;

            }

            array_push($map, $n);

            //维持一个固定长度的窗口

            if(count($map) == $k+1) array_shift($map);

        }

        return false;

    }


    public function solution2($nums,$k,$t)
    {

        $map=[];
        
        $count=count($nums);
        for ($i=0; $i <$count ; $i++) { 
            $map[]=[$nums[$i],$i];
        }
        sort($map);
       
        for ($i=0; $i <$count ; $i++) { 
            for ($j=$i+1; $j <$count ; $j++) { 
                if ($map[$j][0]-$map[$i][0]>$t) {

                    break;
                }
            
                if ($map[$j][0]-$map[$i][0]<=$t&&abs($map[$j][1]-$map[$i][1])<=$k) {
                   
                    return 1;
                }
               
            }
        }
       
        return 0;
    }

    public function solution3($nums,$k,$t)
    {
        $count=count($nums);
        for ($i=0; $i <$count ; $i++) { 
            for ($j=$i+1; $j <$count ; $j++) { 
                if ($j-$i>$k) {
                    break;
                }elseif($j-$i<=$k&&abs($nums[$j]-$nums[$i])<=$t){
                    
                    return 1;
                }
            }
        }

        return 0;
    }

}



$solution=new Solution();

$array=[1,5,9,1,5,9];

echo $solution->solution3($array,2,3);
