<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "line_bot".
 *
 * @property integer $id
 * @property string $type
 * @property integer $list_id
 */
class LineBot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'line_bot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'list_id'], 'required'],
            [['list_id'], 'integer'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'list_id' => 'List ID',
        ];
    }
}
