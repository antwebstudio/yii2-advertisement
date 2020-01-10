<?php

namespace ant\advertisement\models;

use Yii;

/**
 * This is the model class for table "{{%advertisement_placeholder}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string $handle
 * @property string|null $setting
 * @property int $status
 */
class AdvertisementPlaceholder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%advertisement_placeholder}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['handle'], 'required'],
            [['setting'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['handle'], 'string', 'max' => 50],
            [['handle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'handle' => 'Handle',
            'setting' => 'Setting',
            'status' => 'Status',
        ];
    }
	
	public function getRandomAdvertisement() {
		return $this->hasOne(Advertisement::class, ['placeholder_id' => 'id'])
			->orderBy(new \yii\db\Expression('rand()'));
	}
	
	public function getAdvertisements() {
		return $this->hasMany(Advertisement::class, ['placeholder_id' => 'id']);
	}
}
