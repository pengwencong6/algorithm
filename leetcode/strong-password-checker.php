<?php 

/**
 * 一个强密码应满足以下所有条件：
由至少6个，至多20个字符组成。
至少包含一个小写字母，一个大写字母，和一个数字。
同一字符不能连续出现三次 (比如 "...aaa..." 是不允许的, 但是 "...aa...a..." 是可以的)。
编写函数 strongPasswordChecker(s)，s 代表输入字符串，如果 s 已经符合强密码条件，则返回0；否则返回要将 s 修改为满足强密码条件的字符串所需要进行修改的最小步数。
插入、删除、替换任一字符都算作一次修改
 */
class strongPasswordChecker 
{
	private $string='abcdefAg2ggggggggg';

	public function solution1()
	{
		$len=strlen($this->string);

		$changeNumnber=0;
		$agin=1;
		$status=array('a'=>0,'A'=>0,'n'=>0);

		for ($i=0; $i<$len ; ++$i) { 
			$ord=ord($this->string[$i]);
			if (97<=$ord&&$ord<=122) {
				$status['a']=1;
                
			}
			
			if (65<=$ord&&$ord<=90) {
				$status['A']=1;
				
			}
			

			if (48<=$ord&&$ord<=57) {
				$status['n']=1;
				
			}
			if ($i<=$len-2) {
				if ($this->string[$i]===$this->string[$i+1]) {
					$agin++;
					
				}elseif ($this->string[$i]!==$this->string[$i+1]&&$agin===2) {
					--$agin;
					
				}
			}
			
			
			if ($agin===3) {
				$this->string=substr_replace($this->string,'',$i,1);
				--$agin;
				$changeNumnber++;
				--$len;
				--$i;
				
			}
		}
		if ($status['a']==0) {
				$this->string.='a';
				$changeNumnber++;
				
		}
		if($status['A']==0){
				$this->string.='A';
				$changeNumnber++;
				
		}
		if($status['n']==0){
				$this->string.='2';
				$changeNumnber++;
				
		}
		if ($len+$changeNumnber<6) {
			$diff=6-$len+$changeNumnber;
		
			echo $changeNumnber+=$diff;

		}elseif ($len+$changeNumnber>20) {
			$diff1=$len+$changeNumnber-20;
			
			echo $changeNumnber+$diff1;

		}else{
			echo $changeNumnber;
			echo $this->string;
			
		}
		if ($changeNumnber==0) {
			echo 0;
		}
		

	}
	
}


$strongPasswordChecker =new strongPasswordChecker ();

$strongPasswordChecker ->solution1();