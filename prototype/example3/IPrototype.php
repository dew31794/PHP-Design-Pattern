<?php
abstract class IPrototype
{
	// 是否有羊角
	public $horns;
	// 毛的長短
	public $hair;
	// 重量大小
	public $weight;
	
	abstract function __clone();
}