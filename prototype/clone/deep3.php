<?php

// 變數賦值，深複製
$a = 1;
$b = $a;

$b = 2;
echo 'A = ' . $a . '<br>';    // 變數值複製，對新對象的改變不會對原本的變數a作改變
echo 'B = ' . $b . '<br>';