<?php
/*
 *  BugFree is free software under the terms of the FreeBSD License.
 *  @link        http://www.bugfree.org.cn
 *  @package     BugFree
 */

/**
 * Description of ResultHistory
 *
 * @author youzhao.zxw<swustnjtu@gmail.com>
 * @version 3.0
 */


/**
 * This is the model class for table "result_history".
 *
 * The followings are the available columns in table 'result_history':
 * @property integer $id
 * @property string $action_field
 * @property string $old_value
 * @property string $new_value
 * @property integer $resultaction_id
 *
 * The followings are the available model relations:
 * @property ResultAction $resultaction
 */
class ResultHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ResultHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
                return '{{result_history}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action_field, resultaction_id', 'required'),
			array('resultaction_id', 'numerical', 'integerOnly'=>true),
			array('action_field', 'length', 'max'=>45),
			array('old_value, new_value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, action_field, old_value, new_value, resultaction_id', 'safe', 'on'=>'search'),
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
			'resultaction' => array(self::BELONGS_TO, 'ResultAction', 'resultaction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'action_field' => 'Action Field',
			'old_value' => 'Old Value',
			'new_value' => 'New Value',
			'resultaction_id' => 'Resultaction',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('action_field',$this->action_field,true);
		$criteria->compare('old_value',$this->old_value,true);
		$criteria->compare('new_value',$this->new_value,true);
		$criteria->compare('resultaction_id',$this->resultaction_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}