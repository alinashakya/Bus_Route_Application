<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property integer $id
 * @property string $name
 * @property string $createdDate
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'createdDate'], 'required'],
            [['createdDate'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'createdDate' => 'Created Date',
        ];
    }
}
