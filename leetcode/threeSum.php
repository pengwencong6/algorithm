<?php 

/**
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，
 *使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 */
class threeSum 
{
	private $nums=array(1,2,7,4,7,9,6,3,54,32,46,54,29,43,23,42,-54,-24,-25,-3,-2,-8,-5,-4,-56,-3,-7,-4,-23,-34);

	

	public function solution1()
	{
		$count=count($this->nums);
		$orther=array();
		for ($i=0; $i <$count ; $i++) { 
			for ($j=$i+1; $j <$count ; $j++) { 
				for ($k=$j+1; $k <$count ; $k++) { 

					if ($this->nums[$i]+$this->nums[$j]+$this->nums[$k]==0) {
					    $orther=[$this->nums[$i],$this->nums[$j],$this->nums[$k]];
					}
				}
			}
		}
	}

	public function solution2()
	{
		$count=count($this->nums);
		$orther=array();
		$solution=array();
		for ($i=0; $i <$count ; $i++) { 
			for ($j=$i+1; $j <$count ; $j++) { 
				if ($orther[$this->nums[$j]]!==NULL) {
					$solution=  [$orther[$this->nums[$j]],$this->nums[$i],-($this->nums[$i]+$this->nums[$j])];
				}else{
					$orther[$j]=-($this->nums[$i]+$this->nums[$j]);
				}
			}
		}
	}

	public function solution3()
	{
		$count=count($this->nums);
		$newNums=sort($this->nums);
		
		$orther=array();
		for ($i=1; $i <$count ; $i++) { 
			$first=0;
		    $last=$count-1;
		    do{
				$pan=$this->nums[$i]+$this->nums[$first]+$this->nums[$last];
				
				
				if ($pan===0) {
					$orther=[$this->nums[$i],$this->nums[$first],$this->nums[$last]];
				}
				if ($pan>0&&$last>$i) {
					
					while ($this->nums[$last]===$this->nums[--$last]&&$pre>$i){
						$last-=2;
					}
					--$last;
				}elseif ($pan<0&&$first<$i) {

					while ($this->nums[$first]===$this->nums[++$first]&&$next<$i){
						$first+=2;
					}
					++$first;
				}else{
					break;
				}
			}while(1);
		}

	}



}

$threeSum=new threeSum();

$start=time();
for ($i=0; $i <10000; $i++) { 
	$threeSum->solution3();
}

$end=time();

echo $end-$start; 

