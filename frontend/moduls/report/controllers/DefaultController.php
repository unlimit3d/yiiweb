<?php

namespace frontend\moduls\report\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;

class DefaultController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
//        $sql = "SELECT J.date_add AS `วันที่เพิ่ม`,"
//                . "D.name AS `ประเภท`,"
//                . "J.device_sn AS `เลขครุภัณฑ์`,"
//                . "J.customer AS `ลูกค้า`,"
//                . " J.date_add AS `วันที่รับ`, FROM job AS J LEFT JOIN c_device_type AS D ON D.id = J.device_type ORDER BY J.date_add DESC";

        $sql = "SELECT c.`name` ,COUNT(t.id) total FROM job t
LEFT JOIN c_device_type c  on c.id = t.device_type
GROUP BY c.id";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($raw);
        $dataProvider = new ArrayDataProvider([
            'allModels' => $raw,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

//        print_r($dataProvider);
        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'raw' => $raw
        ]);
    }

}
