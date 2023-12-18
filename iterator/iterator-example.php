<?php
/**
 * 具體聚合
 * Class ConcreteAggregate
 */
class ConcreteAggregate implements IteratorAggregate
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
     * @return ConcreteIterator|\Traversable
     */
    public function getIterator(): Traversable
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

# Client 客戶端
$concreteAggregate = new ConcreteAggregate();

// 往迭代器增加資料
$concreteAggregate->add('鍋子');
$concreteAggregate->add('柯達押');
$concreteAggregate->add('侯子');
$concreteAggregate->add('賴皮鬼');

// 透過聚合取得實作
$concreteIterator = $concreteAggregate->getIterator();
foreach ($concreteIterator as $concrete) {
    echo $concrete . "<br>";
}

// 迭代對象
$values = array('鍋子','柯達押','侯子','賴皮鬼');
// 進行迭代操作
$it = new ConcreteIterator($values);
foreach ($it as $key => $value) {
    echo '鍵值'.$key.':'.$value. "<br>";
}


?>