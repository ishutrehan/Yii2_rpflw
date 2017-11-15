<?php

namespace app\models;

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
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_date', 'firstname', 'lastname', 'jobnumber', 'products_sold', 'commission_amt', 'status', 'finalize_date', 'note'], 'required'],
            [['note'], 'string'],
            [['order_date', 'firstname', 'lastname', 'products_sold', 'status', 'finalize_date'], 'string', 'max' => 255],
            [['jobnumber', 'commission_amt'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_date' => 'Order Date',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'jobnumber' => 'Jobnumber',
            'products_sold' => 'Products Sold',
            'commission_amt' => 'Commission Amount',
            'status' => 'Status',
            'finalize_date' => 'Finalize Date',
            'note' => 'Note',
        ];
    }
}
