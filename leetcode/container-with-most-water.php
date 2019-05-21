<?php
/*
*给定 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。
*在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)
*找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
*/

/**
 * 暴力解法
 */
class solution 
{
	$array=array(2,3,10,43,23,18,10);

	$height=2;
	
	public function violence()
	{
		$count=count($this->array);

		$container=$this->height*min($this->array[0],$this->array[1]);
		if($count==2){
			return $container;
		}else{
			$i=0;
			$j=$i+1;
			$container=0;
			for($i;$i<$count;$i++){
				for($j;$j<$count;$j++){

					$temContainer=$this->height*min($this->array[$i],$this->array[$j]);
					if ($temContainer>$container) {
						$container=$temContainer;
					}
					$height+=2;
				}
				$height=2;
			}
		}

		return $container;
	}
}

/**
 * 双指针
 */
class solution2 
{
	$array=array(2,3,10,43,23,18,10);

	$count=count($this->array);

	$height=2*($this->count-1);

	$head=0;

	$tail=$this->count-1;

	$container=0;
	
	public function maxArea()
	{
		while ($this->head!=$this->tail) {
			$container=max($container,min($this->array[$this->head],$this->array[$this->tail])*$this->height);
			if ($this->head>$this->tail) {
				$this->tail--;
				$this->height-=2;
			}else{
				$this->head--;
				$this->height-=2;
			}
		}

		return $container;
	}
}