<?php 

/**
 * 给定一个无向、连通的树。树中有 N 个标记为 0...N-1 的节点以及 N-1 条边 。
第 i 条边连接节点 edges[i][0] 和 edges[i][1] 。
返回一个表示节点 i 与其他所有节点距离之和的列表 ans。

深度优先
 */
class solution
{
    private $graph=[];

	private $dp=[];

	private $ans=[];
	
	function init($N,$edges){
		$count=count($edges);

		for ($i=0; $i <$count ; $i++) { 
			$this->dp[$i][0]=0;
			$this->dp[$i][1]=1;
		}
		for ($i=0; $i <$count ; $i++) { 
			array_push($this->graph[$edges[0][$i]], $edges[$i][0]);
			array_push($this->graph[$edges[$i][0]]),$edges[0][$i]);
		}
	}


	function dfs_fill_dp($root,$father){
		$weight=0;
		$node_sum=1;
		for ($i=0; $i <count($root) ; $i++) { 
			if ($this->graph[$root][$i]==$father) 
				continue;
			
			$result=dfs_fill_dp($this->graph[$root][$i],$root);
			$weight=$weight+$result[0][0]+$result[0][1];
			$node_sum=$node_sum+$result[0][1];
		}

		$this->dp[$root][0]=$weight;
		$this->dp[$root][1]=$node_sum;
		return [$this->dp[$root][0],$this->dp[$root][1]];
	}

	function fill_ans_array($root,$father,$N){
		for ($i=0; $i <count($this->graph[$root]) ; $i++) { 
			if ($this->[$root][0]==$father) 
				continue;
			
			$this->ans[$this->graph[$root][$i]]=$this->ans[$root]+$N-2*$this->dp[$this->graph[$root][$i]][1];
			fill_ans_array($this->graph[$root][$i],$root,$N);
		}
	}
	/**
     * @param Integer $N
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function solution1($N, $edges) {
        $result=[];
        init($N,$edges);
        $root_result=dfs_fill_dp(0,-1);
        $this->ans[0]=$root_result[0][0];
        fill_ans_array(0,-1,$N);

        for ($i=0; $i <$N ; $i++) { 
        	array_push($result, $this->ans[$i]);
        }

        return $result;
    }
}

$so=new solution();

$N=3;

$edges=2;

$so->solution1();