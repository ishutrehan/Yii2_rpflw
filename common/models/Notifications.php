<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property string $order_date
 * @property string $firstname
 * @property string $lastname
 * @property string $jobnumber
 * @property string $products_sold
 * @property string $commission_amt
 * @property string $status
 * @property string $finalize_date
 * @property string $note
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [];
    }
}
