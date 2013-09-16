<?php

/**
 * This is the model class for table "history".
 *
 * The followings are the available columns in table 'history':
 * @property integer $ID
 * @property integer $playerID
 * @property integer $from
 * @property integer $to
 * @property string $date
 * @property integer $amount
 */
class History extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('playerID', 'required'),
			array('playerID, from, to, amount', 'numerical', 'integerOnly'=>true),
			array('date', 'safe'),
			array('playerID', 'required', 'message' => 'A játékos nem lehet üres!'),  
			array('to', 'required', 'message' => 'A club nem lehet üres!'),  
			array('date', 'required', 'message' => 'A dátum nem lehet üres!'),  
			array('amount', 'required', 'message' => 'Az összeg nem lehet üres!'),  
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, playerID, from, to, date, amount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'player'=>array(self::BELONGS_TO, 'Player', 'playerID'),
			'club1'=>array(self::BELONGS_TO, 'Club', 'to'),
			'club2'=>array(self::BELONGS_TO, 'Club', 'from'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'playerID' => 'Player',
			'from' => 'From',
			'to' => 'To',
			'date' => 'Date',
			'amount' => 'Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);

		$criteria->compare('playerID',$this->playerID);

		$criteria->compare('from',$this->from);

		$criteria->compare('to',$this->to);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider('History', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function ajaxDropdownlistRefresh() 
	{
	
		$return_value="";
	
		$player_model=Player::model()->find('ID=:ID', array(':ID'=>(int) $_POST['playerID']));
	
		$data=Club::model()->findAll();
		$data=CHtml::listData($data,'ID','name');
		foreach($data as $value=>$name)
		{
			if($player_model['clubID'] != $value) $return_value .= CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}
		
		echo $return_value;
		return $return_value; //a visszatérési érték csak a unit teszthez kell. lehet nem a legszebb megoldás, hogy van echo és ez is...
	
	}
	
	public function isLastReplacementForPlayer($playerID, $historyID) 
	{
	
		$sql = parent::findByAttributes(array('playerID'=>$playerID), array('order'=>'date DESC'));
		if($sql['ID'] == $historyID) return true;
		else return false;
	
	}
	
}