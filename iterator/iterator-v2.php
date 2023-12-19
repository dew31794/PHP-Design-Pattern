<?php
/**
 * 此版本取消實作 IteratorAggregate、以及Traversable應用
 */


/**
 * 具體聚合
 * Class ConcreteAggregate
 */
class ConcreteAggregate
{
    private $data = [];

    /**
     * 往迭代器裡添加資料
     */
    public function add($name)
    {
        $this->data[] = $name;
    }

    /**
     * 取得迭代器
     * @return ConcreteIterator
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ConcreteIterator($this->data);
    }
}

/**
 * 具體迭代器
 * Class ConcreteIterator
 */
class ConcreteIterator implements Iterator
{
    private $key = 0; //目前指向位子
    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->key = 0;
    }

    /**
     * 返回當前元素
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        // TODO: Implement current() method.
        return $this->data[$this->key];
    }

    /**
     * 前往下一個元素
     */
    public function next(): void
    {
        // TODO: Implement next() method.
        $this->key++;
    }

    /**
     * 返回當前元素的鍵值
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        // TODO: Implement key() method.
        return $this->key;
    }

    /**
     * 檢查當前位置是否有效
     */
    public function valid(): bool
    {
        // TODO: Implement valid() method.
        return isset($this->data[$this->key]);
        // 當迭代對象數組中如果有null值不得中斷驗證
        // return count($this->data) > $this->key;
    }

    /**
     * 將 Iterator 退回第一個元素
     */
    public function rewind(): void
    {
        // TODO: Implement rewind() method.
        $this->key = 0;
    }
}

    # ------------ Client 客戶端 ------------
    // 實作聚合，將資料新增進集合物件中
    $concreteAggregate = new ConcreteAggregate();

    // 往迭代器增加資料
    $concreteAggregate->add('鍋子');
    $concreteAggregate->add('柯達押');
    $concreteAggregate->add('侯子');
    $concreteAggregate->add('賴皮鬼');

    // 透過聚合去實作
    $concreteIterator = $concreteAggregate->getIterator();
    foreach ($concreteIterator as $concrete) {
        echo $concrete . "<br>";
    }

    # --------------------------------------
    // 迭代對象
    $values = array('郭小銘','柯文子','侯子王','賴著不走');
    // 進行迭代操作
    $iterator = new ConcreteIterator($values);
    foreach ($iterator as $key => $value) {
        echo '鍵值'.$key.':'.$value. "<br>";
    }

    # --------------------------------------
    // 迭代對象
    $values = array('首富','無業遊民','市長','副總統');
    // 進行迭代操作
    $iterator = new ConcreteIterator($values); 
        
    // 顯示集合迭代器的值
    echo $iterator->current() . "<br>"; 

    // 使用next()函數移動，元素進入下一個位置
    $iterator->next(); 
    echo $iterator->current() . "<br>"; 

    $iterator->next(); 
    echo $iterator->current() . "<br>";

    $iterator->next(); 
    echo $iterator->current() . "<br>";

    # --------------------------------------
    // 迭代對象
    $values = array('小郭','小柯','小猴','小賴');
    // 進行迭代操作
    $iterator = new ConcreteIterator($values); 

    // 檢查當前位置是否有效
    while($iterator->valid()) { 
        echo $iterator->current() . "<br>";
        $iterator->next(); 
    } 

    # --------------------------------------
    $values = array(
        0 => '小郭',
        1 => '小柯',
        3 => '小猴',
        2 => '小賴'
    );
    // 進行迭代操作
    $iterator = new ConcreteIterator($values); 
    
    // 檢查可跌代對象的有效性
    while($iterator->valid()) { 
        $iterator->next(); 
    } 

    // 移至起始位置
    $iterator->rewind(); 
    
    // 顯示當前元素
    echo $iterator->current(); 
?>