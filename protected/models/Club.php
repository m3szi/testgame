<?php

/**
 * This is the model class for table "club".
 *
 * The followings are the available columns in table 'club':
 * @property integer $ID
 * @property string $name
 * @property integer $age
 */
class Club extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'club';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('age', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>125),
			array('age', 'required', 'message' => 'A kor nem lehet üres!'),  
			array('name', 'required', 'message' => 'A név nem lehet üres!'),  
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, name, age', 'safe', 'on'=>'search'),
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
			'history1' => array(self::HAS_MANY, 'History', 'to'),
			'history2' => array(self::HAS_MANY, 'History', 'from'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'name' => 'Name',
			'age' => 'Age',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('age',$this->age);

		return new CActiveDataProvider('Club', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Club the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}