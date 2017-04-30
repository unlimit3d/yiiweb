<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_status".
 *
 * @property integer $id
 * @property string $name
 * @property string $hidden
 */
class CStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['hidden'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'สถานะ',
            'hidden' => 'ซ่อน',
        ];
    }
}
