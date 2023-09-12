<?php
include_once('IPrototype.php');

class MaleProto extends IPrototype
{
	public $gender = "雄性";
	
	public $mated;

	public function __construct()
	{
        $this->horns = true;
		$this->hair = "short";
		$this->weight = "300";
	}

	function __clone(){}
}