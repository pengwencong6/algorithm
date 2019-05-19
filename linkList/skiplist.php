<?php
/*
*跳跃表的PHP实现
*
*/

class Node
{
    
    //节点数据
    public $data;
    // 下一节点
    public $next;   
    //拥有的等级数
    public $level;

    // 前驱
    public $previous = NULL;   
    //索引表
    public $forward = [];
    
    //索引
    public $index;

    public function __construct($value, $level=1)
    {
        
        $this->level = $level;
        $this->data = $value;
        $this->next = NULL;
        $this->previous=NULL;
        
        for ($i = 0; $i < $level; $i++) {

            $this->forward[$i] = array();
        }
    }

}



class SkipList
{
    //最大等级
    private $maxLevel;
    
    //头节点
    public $header;

    public function __construct($maxLevel)
    {
        $this->maxLevel = $maxLevel;
        $this->header = new Node(-1);
    }
    // 查找节点
    public function find($item) 
    {
      
    }

    // （在节点后）插入新节点
    public function insertS($news) 
    {
        $step=count($news)/2;
        $index=0;
        $nextIndex=$step;
        foreach ($news as $new) {
            $newNode = new Node($new);
            $current = $this->header;
            if ($current->next == null) {
                $current->next=$newNode;
                $newNode->previous=$current;
                $newNode->index=$index;
                
                $index++;

            }else{

                while ($current->next->data <= $new) {
                    $current = $current->next;
                }

               
                $newNode->index=$index;
                $index++;
                $newNode->next=$current->next;
                $current->next->previous=$newNode;
                $newNode->previous=$current;
                $current->next=$newNode;
                
            }
        }

        return true;
       
    }

    // 顺序插入新节点
    public function insert($item, $new) 
    {
        $newNode = new Node($new);
        $current = $this->find($item);
        $current->next->previous=$newNode;
        $newNode->previous=$current;
        $newNode->next = $current->next;
        $current->next = $newNode;
        return true;
    }

    // 更新节点
    public function update($old, $new) 
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }
        while ($current->next != null) {
            if ($current->data == $old) {
                break;
            }
            $current = $current->next;
        }
        return $current->data = $new;
    }


    // 从链表中删除一个指定节点
    public function delete($item) 
    {
        $current = $this->find($item);
        if ($current->next != null) {
            $current->next->previous = $current->previous;
            $current->previous->next=$current->next;
            echo $current->data;
            unset($current);
            return true;
        }
        echo $current->data;
        unset($current);

        return true;
    }

    // 显示链表中的元素
    public function display() {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    }

    // 显示链表中节点的索引
    public function displayindex() {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data ;
            echo "<br>";
            var_dump($current->next->forward );
            echo "<br>";
            $current = $current->next;
        }
    }

    // 更新链表中节点的索引
    public function updateindex() {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data ;
            echo "<br>";
            var_dump($current->next->forward );
            echo "<br>";
            $current = $current->next;
        }
    }
}



$testData = [898888, 300, 234, 123, 333, 456, 23, 99];

$skipList = new SkipList(3);

$skipList->insertS($testData);

echo '插入的节点为'.'<br>';
$skipList->display();

echo '<br>';
echo '删除的节点为'.'<br>';
//$skipList->delete(300);
echo '<br>';
echo '查找的节点为'.'<br>';
$skipList->find(23);
echo '<br>';
echo '查找的节点索引数组为'.'<br>';
$skipList->displayindex();


