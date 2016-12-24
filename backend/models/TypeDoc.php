<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type_doc".
 *
 * @property integer $id_type
 * @property string $type_doc_name
 */
class TypeDoc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_doc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type', 'type_doc_name'], 'required'],
            [['id_type'], 'integer'],
            [['type_doc_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_type' => 'Id Type',
            'type_doc_name' => 'Type Doc Name',
        ];
    }
}
