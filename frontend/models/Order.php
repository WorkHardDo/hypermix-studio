<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 */
class Order extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%order}}';
    }

public function rules()
{
    return [
        [['id_user', 'service_type', 'source', 'singers', 'tonal', 'created_at', 'updated_at'], 'required'],
        [['id_user', 'singers', 'price', 'created_at', 'updated_at'], 'integer'],
        [['singers'], 'integer', 'min' => 1],
        [['description'], 'string'],
        [['service_type', 'social', 'same_track', 'source', 'tonal', 'status', 'project_name', 'result'], 'string', 'max' => 255],
    ];
}



    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        if ($this->service_type === 'mix') {
            $this->price = 2000 + ($this->singers * 1000);
        } elseif ($this->service_type === 'mastering') {
            $this->price = 1500;
        }
        return true;
    }
    return false;
}

}
