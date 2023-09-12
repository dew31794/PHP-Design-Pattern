<?php
// 對象賦值，深複製，引用物件變數
class Test{
    public $a = 1;
}

$test1 = new Test();  // 建立新物件
$test2 = clone $test1;  // 使用 clone 類別複製對像

$test1->a = 2;
echo 'TEST1 = ' . $test1->a . '<br>';
echo 'TEST2 = ' . $test2->a . '<br>';