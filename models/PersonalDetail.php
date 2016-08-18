<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "personal_detail".
 *
 * @property integer $p_id
 * @property string $p_name
 * @property string $p_nick_name
 * @property string $p_DOB
 * @property string $p_fname
 * @property string $p_pic
 * @property string $p_gender
 * @property string $p_Skill
 */
class PersonalDetail extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal_detail';
    }

    /**
     * @inheritdoc
     */
    public $file;
    public function rules()
    {
        return [
            [['p_name', 'p_nick_name', 'p_fname','p_DOB' ,'p_gender', 'p_email'], 'required'],
            [['p_name', 'p_nick_name', 'p_DOB', 'p_fname', 'p_gender'], 'string', 'max' => 255],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'ID',
            'p_name' => '  Name',
            'p_nick_name' => ' Nick Name',
            'p_DOB' => 'Dob',
            'p_fname' => 'Father Name',
            'p_pic' => 'Picture',
            'p_gender' => 'Gender',
            'p_Skill' => 'Skills',
            'p_email' => 'E-mail',
        ];
    }
    public function getPerson()
    {
        return $this->find()->select(['p_name','p_id']) ->asArray()->all();
    }
    public function getImageurl($data)
    {
        return Yii::$app->request->BaseUrl.'/uploads/'.$data->p_pic;
    }
}
