<?php
/**
 * 有效数字
 */
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
       $count=strlen($s);
		$add=array();
		$jian=array();
		$kong=array();
		$dian=array();
        $number=0;
        $e=array();
        $k=0;
		for ($i=0; $i <$count ; $i++) { 
			if (48<=ord($s[$i])&&ord($s[$i])<=57) {
				if ($k===0) {
					$number=$i;
					$k++;
				}
				
			}elseif($s[$i]==='+'){
				array_push($add, $i);
			}elseif ($s[$i]==='-') {
				array_push($jian, $i);
			}elseif ($s[$i]==='.') {
				array_push($dian, $i);
			}elseif ($s[$i]===' ') {
				array_push($kong, $i);
			}elseif ($s[$i]==='e') {
				array_push($e, $i);
			}
		}
        if($number!=0||$k!=0){
		if (count($add)!=0) {
			if (count($add)>1||$add[0]!=0) {
			return 0;
		    }
		}

		if (count($jian)!=0) {
			if (count($jian)>1||$jian[0]!=0) {
			return 0;
		    }
		}
		
		if (count($dian)!=0) {
			if (count($dian)>1) {
			   return 0;
			
		    }elseif($dian[0]==0&&48>ord($s[1])||ord($s[1])>57){
		    	return 0;
		    }
		}
        if (count($e)!=0) {
			if (count($e)>1||$count<3) {
				return 0;
			}elseif ($e[0]!=$count-2) {
				return 0;
			}
		}
		$kongN=count($kong);
		
			if ($kongN>1) {
			    for ($i=0; $i <$kongN-1 ; $i++) { 
			    	if ($kong[$i]+1==$kong[$i+1]&&$kong[0]>$number||$number>$kong[$kongN-1]) {
			    		return 1;

			    	}else{
			    		return 0;
			    	}
			    	
			    }
			}elseif($count!=1&&$kongN==1){
				return 1;
			}elseif($kongN==0){
				return 1;
			}
            
        }else{
            return 0;
        }
		}
    
}