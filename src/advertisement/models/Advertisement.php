<?php

namespace ant\advertisement\models;

use Yii;

/**
 * This is the model class for table "{{%advertisement}}".
 *
 * @property int $id
 * @property string $placeholder_id
 * @property string|null $name
 * @property string|null $source_url
 * @property string|null $target_url
 * @property string|null $content
 * @property int $type
 * @property int $status
 * @property int $order
 */
class Advertisement extends \yii\db\ActiveRecord
{
	public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%advertisement}}';
    }
	
	public function behaviors() {
		return [
            'file' => [
                'class' => \ant\file\behaviors\AttachmentBehavior::className(),
                'attribute' => 'file',
            ],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['placeholder_id', 'type'], 'required'],
            [['content'], 'string'],
            [['type', 'status', 'order'], 'integer'],
            [['placeholder_id'], 'string', 'max' => 50],
            [['name', 'source_url', 'target_url'], 'string', 'max' => 255],
			[['file'], 'safe'],
        ];
    }
	
	public function getPlaceholder() {
		return $this->hasOne(AdvertisementPlaceholder::class, ['id' => 'placeholder_id']);
	}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'placeholder_id' => 'Placeholder ID',
            'name' => 'Name',
            'source_url' => 'Source Url',
            'target_url' => 'Target Url',
            'content' => 'Content',
            'type' => 'Type',
            'status' => 'Status',
            'order' => 'Order',
        ];
    }
}
