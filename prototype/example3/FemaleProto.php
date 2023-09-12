<?php
include_once('IPrototype.php');

class FemaleProto extends IPrototype
{
    public $gender = "雌性";

	public $lamb;

	public function __construct()
	{
		$this->horns = false;
        $this->hair = "long";
		$this->weight = "160";
	}

	function __clone(){}
}