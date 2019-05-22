<?php

/**
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，
 *使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 */
class TwoSum 
{
	private $nums=array(2,3,1,8,4,8,3,0,6,5);

	private $sum=4;

	
	
	public function solution1()
	{
		$count=count($this->nums);
		for($i=0;$i<$count;$i++){
			for ($j=0; $j <$count ; $j++) { 
				if ($this->nums[$i]+$this->nums[$j]==$this->sum) {
					print_r(array($this->nums[$i] ,$this->nums[$j] ));
				}
			}
		}
	}

	public function solution2()
	{
		$count=count($this->nums);
		$other=array();
		for ($i=0; $i<$count ; $i ++) { 
			$other[$this->sum-$this->nums[$i]]=$this->nums[$i];
		}

		for ($j=0; $j <$count ; $j++) { 
			if ($other[$this->nums[$j]]!==NULL) {
				print_r(array($this->nums[$j],$other[$this->nums[$j]]));
			}
		}
	}

	public function solution3()
	{
		$count=count($this->nums);
		$other=array();
		for ($i=0; $i <$count ; $i++) { 
			if ($other[$this->nums[$i]]!=NULL) {
				print_r(array($this->nums[$i],$other[$this->nums[$i]]));
			}else{
				$other[$this->sum-$this->nums[$i]]=$this->nums[$i];
			}
		}
	}
}

$twosum=new TwoSum();

$twosum->solution1();

echo "<br>";

$twosum->solution2();

