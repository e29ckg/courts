<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "judgement".
 *
 * @property string $black_number
 * @property string $doc_type_id
 * @property string $black_append
 * @property string $red_number
 * @property string $doc_style_id
 * @property string $file_name
 * @property integer $file_size
 * @property string $scan_by
 * @property string $scan_datetime
 * @property string $upload_by
 * @property string $upload_datetime
 * @property integer $transfer_status
 * @property integer $file_page
 * @property string $create_at
 */
class Jud extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $file;

    const UPLOAD_FOLDER = '/scan_system/PDFServer/';

    public static function tableName() {
        return 'judgement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['doc_style_id', 'doc_type_id', ], 'required'],
                [['file_size', 'transfer_status', 'file_page'], 'integer'],
                [['create_at'], 'safe'],
                [['black_number', 'doc_type_id'], 'string', 'max' => 100],
                [['black_append', 'scan_by'], 'string', 'max' => 50],
                [['red_number'], 'string', 'max' => 20],
                [['doc_style_id', 'file_name'], 'string', 'max' => 255],
                [['scan_datetime', 'upload_datetime'], 'string', 'max' => 14],
                [['upload_by'], 'string', 'max' => 13],
                [['file'], 'file','skipOnEmpty' => false],
        ];
    }
    
    

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'black_number' => 'Black Number',
            'doc_type_id' => 'ประเภทเอกสาร',
            'black_append' => 'Black Append',
            'red_number' => 'Red Number',
            'doc_style_id' => 'เรื่อง',
            'file_name' => 'File Name',
            'file_size' => 'File Size',
            'scan_by' => 'Scan By',
            'scan_datetime' => 'Scan Datetime',
            'upload_by' => 'Upload By',
            'upload_datetime' => 'Upload Datetime',
            'transfer_status' => 'Transfer Status',
            'file_page' => 'File Page',
            'create_at' => 'Create At',
            'file' => 'เอกสาร'
        ];
    }

    public static function getUploadPath() {
//    return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
        return $_SERVER['DOCUMENT_ROOT'] . self::UPLOAD_FOLDER;
    }

    public static function getUploadUrl() {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

}
