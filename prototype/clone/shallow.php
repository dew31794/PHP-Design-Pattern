<?php

// 對象賦值，淺複製，引用物件變數
class Test{
    public $a = 1;
}
$test1 = new Test(); // 建立新物件
$test2 = $test1;  // 變數賦值

$test1->a = 2;   // 修改 TEST1 的 A 變數，TEST2 的 A變數 也随之改變
echo 'TEST1 = ' . $test1->a . '<br>';
echo 'TEST2 = ' . $test2->a . '<br>';   // 淺複製

