<?php
class Test{
	public $name;
    public function setName($name){
    	$this->name=$name;
    }
    public function getName(){
    	return $this->name;
    }
}
class Employee extends Test{
	public function __toString(){
		echo $this->name;
	}
}
$me1 = new Employee();
$me1->setName('Joshua');
echo $me1->getName();
