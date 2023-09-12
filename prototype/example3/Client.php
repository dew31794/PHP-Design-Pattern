<?php
function pageAutoloader($className){
	include $className . '.php';
}

spl_autoload_register('pageAutoloader');

class Client
{
	private $sheep1;
	private $sheep2;

	private $c1Sheep;
	private $c2Sheep;
	private $updatedCloneSheep;

	public function __construct()
	{
		// 原型
		$this->sheep1 = new MaleProto();
		$this->sheep2 = new FemaleProto();

		// 複製
		$this->c1Sheep = clone $this->sheep1;
		$this->c2Sheep = clone $this->sheep2;

		// 基因突變的怪胎雌羊
		$this->updatedCloneSheep = clone $this->sheep2;

		// Update Clone
		$this->c1Sheep->mated 	= "true"; 		// 是否發生行為
		$this->c2Sheep->lamb 	= 2;			// 幾隻小羊
		
		$this->updatedCloneSheep->horns  = true;	// 是否有羊角
		$this->updatedCloneSheep->hair 	 = "long";	// 毛的長短
		$this->updatedCloneSheep->weight = "160";	// 重量

		$this->showSheep($this->c1Sheep); 
		$this->showSheep($this->c2Sheep);
		$this->showSheep($this->updatedCloneSheep);
	}

	private function showSheep(IPrototype $sheep)
	{
		echo "有無羊角： " .($sheep->horns? "有":"無") . "<br />";
		echo "毛的長短： " . $sheep->hair . "<br />";
		echo "大約重量： " . $sheep->weight . "<br />";
		echo "性別： " . $sheep->gender . "<br />";
		if ($sheep->gender == "雌性"){
			echo "幾隻小羊：" . ($sheep->lamb?$sheep->lamb:0) . "<p/>";
		}else{
			echo "是否發生行為： " . $sheep->mated . "<p/>";
		}
	}
}

$example = new Client();