<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "koleksi_pribadi".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $buku_id
 *
 * @property Buku $buku
 * @property User $user
 */
class KoleksiPribadi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'koleksi_pribadi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'buku_id'], 'integer'],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::class, 'targetAttribute' => ['buku_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'buku_id' => 'Book ID',
        ];
    }

    /**
     * Gets query for [[Buku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(Buku::class, ['id' => 'buku_id']);
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
