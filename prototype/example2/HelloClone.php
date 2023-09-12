<?php
class TestClone
{
    private $builtInConstructor;
    public function __construct()
    {
        echo "嗨,Clone!<br />";
        $this->builtInConstructor = "建立建構子<br />";
    }

    public function working()
    {
        echo $this->builtInConstructor;
        echo "工作中<br />";
    }
}

$original = new TestClone(); // 印出 "嗨,Clone!"
$original->working(); // 印出 "建立建構子" "工作中"

// Clone不會執行此建構子，不會印出 嗨,Clone!
$cloneIt = clone $original;
$cloneIt->working();