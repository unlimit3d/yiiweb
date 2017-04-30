<?php

namespace frontend\models;
use frontend\models\CDeviceType;
use frontend\models\CStatus;
use frontend\models\CRapid;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property string $date_add
 * @property string $device_type
 * @property string $device_sn
 * @property string $customer
 * @property string $date_recept
 * @property string $job_rapid
 * @property string $job_status
 * @property string $date_end
 * @property string $job_note
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer', 'customer', 'job_rapid', 'job_status', 'date_recept'],'required', 'message'=>'โปรดป้อนข้อมูล'],
            [['date_add', 'date_recept', 'date_end'], 'safe'],
            [['job_note'], 'string'],
            [['device_type', 'device_sn', 'customer', 'job_rapid', 'job_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_add' => 'วันที่แจ้ง',
            'device_type' => 'ประเภท',
            'device_sn' => 'เลขครุภัณฑ์',
            'customer' => 'ผู้แจ้ง',
            'date_recept' => 'วันที่รับงาน',
            'job_rapid' => 'เร่งด่วน',
            'job_status' => 'สถานะ',
            'date_end' => 'วันที่สิ้นสุด',
            'job_note' => 'หมายเหตุ',
        ];
    }
    
    public function getDevicetype(){
        //hasOne join 1:1
        return $this->hasOne(CDeviceType::className(),['id'=>'device_type']); //คีย์ตารางที่จะ Join นำ
    }
    
    public function getCStatus(){
        return $this->hasOne(CStatus::className(),['id'=>'job_status']);
    }
    
    public function getCRapid(){
        return $this->hasOne(CRapid::className(),['id'=>'job_rapid']);
    }
}
