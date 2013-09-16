<?php

class HistoryTest extends CDbTestCase
{
	protected $object;
	
    protected function setUp()
    {
        parent::setUp();
        $this->object = new History;
    }

    protected function tearDown()
    {
        unset($this->object);
    }

	public $fixtures=array(
		'histories'=>'History',
	);

	public function testModel()
    {
        $this->assertInstanceOf('History', $this->object);
        $this->assertEquals('history', $this->object->tableName());
    }
	
	public function testRules()
    {
        $this->assertInternalType('array', $this->object->rules());
    }
	
	public function testajaxDropdownlistRefresh()
    {
		$_POST['playerID']=2;
		$return_value = $this->object->ajaxDropdownlistRefresh();
		$this->assertTrue(!strstr($return_value,'value="2"'));
    }
	
	public function testisLastReplacementForPlayer()
    {
		$playerID=3;
		$historyID=2;
		$this->assertTrue($this->object->isLastReplacementForPlayer($playerID, $historyID));
    }
	
	public function testInsert()
    {
		$this->object->setAttributes(array(
			'playerID'=>'1',
			'from'=>'1',
			'to'=>'2',
			'date'=>'2013-04-01 12:12:01',
			'amount'=>'1400',
		));
		$this->assertTrue($this->object->save());
    }
}