<?php

/**
 * This is the model class for table "player".
 *
 * The followings are the available columns in table 'player':
 * @property integer $ID
 * @property integer $clubID
 * @property string $name
 * @property integer $age
 * @property string $nation
 */
class Player extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clubID, age', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>125),
			array('nation', 'length', 'max'=>2),
			array(  
				'name',  
				'match',  
				'pattern' => '/^[A-Za-z0-9\' ]+$/',  
				'message' => 'Csak betűket, számokat, szünetet és aposztróf jelet használhatsz!'  
			),
			array('name', 'required', 'message' => 'A név nem lehet üres!'),  
			array('age', 'required', 'message' => 'A kor nem lehet üres!'),
			array('nation', 'required', 'message' => 'A nemzet nem lehet üres!'),  				
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, clubID, name, age, nation', 'safe', 'on'=>'search'),
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
			'club'=>array(self::BELONGS_TO, 'Club', 'clubID'),
			'history' => array(self::HAS_MANY, 'History', 'playerID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'clubID' => 'Club',
			'name' => 'Name',
			'age' => 'Age',
			'nation' => 'Nation',
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

		$criteria->compare('clubID',$this->clubID);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('age',$this->age);

		$criteria->compare('nation',$this->nation,true);

		return new CActiveDataProvider('Player', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Player the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}