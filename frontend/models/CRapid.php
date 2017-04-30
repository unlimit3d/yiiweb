<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_rapid".
 *
 * @property integer $id
 * @property string $name
 * @property string $hidden
 */
class CRapid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_rapid';
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
            'name' => 'เร่งด่วน',
            'hidden' => 'ซ่อน',
        ];
    }
}
