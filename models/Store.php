<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%stores}}".
 *
 * @property integer $id
 * @property integer $coordinate_id
 * @property string $name
 * @property string $description
 */
class Store extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%stores}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['coordinate_id'], 'integer'],
			[['description'], 'string'],
			[['name'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'coordinate_id' => Yii::t('app', 'Coordinate ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
		];
	}

	/**
	 * @inheritdoc
	 * @return StoreQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new StoreQuery(get_called_class());
	}

	public function getCoordinate()
	{
		return $this->hasOne(Coordinate::className(), ['id' => 'coordinate_id']);
	}

	public function beforeDelete()
	{
		if (parent::beforeDelete()) {
			if (!$this->coordinate->delete()) {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}
}
