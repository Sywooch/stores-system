<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%coordinates}}".
 *
 * @property integer $id
 * @property string $lat
 * @property string $lng
 */
class Coordinate extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%coordinates}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['lat', 'lng'], 'required'],
			[['lat', 'lng'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'lat' => Yii::t('app', 'Latitude'),
			'lng' => Yii::t('app', 'Longitude'),
		];
	}

	/**
	 * @inheritdoc
	 * @return CoordinateQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CoordinateQuery(get_called_class());
	}

	public function getStore()
	{
		return $this->hasOne(Store::className(), ['coordinate_id' => 'id']);
	}
}
