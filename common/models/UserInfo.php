<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users_info".
 *
 * @property integer $user_id
 * @property string $avatar
 * @property integer $gender
 * @property integer $dob
 * @property string $country
 * @property string $city
 * @property string $about
 *
 * @property Users $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'dob'], 'integer'],
            [['about'], 'string'],
            [['avatar'], 'string', 'max' => 256],
            [['country', 'city'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '#',
            'avatar' => 'Avatar',
            'gender' => 'Пол',
            'dob' => 'Дата рождения',
            'country' => 'Страна',
            'city' => 'Город',
            'about' => 'Обо мне',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
