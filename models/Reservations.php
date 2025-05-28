<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservations".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $table_id
 * @property string $date
 *
 * @property Tables $table
 * @property User $user
 */
class Reservations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'table_id'], 'integer'],
            [['date', 'table_id'], 'required'],
            [['date'], 'safe'],
            [['table_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tables::class, 'targetAttribute' => ['table_id' => 'id']],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'table_id' => 'Номер столика',
            'date' => 'Дата (ггг-мм-дд 24:12)',
        ];
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(Tables::class, ['id' => 'table_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
