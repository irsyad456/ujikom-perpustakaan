<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ulasan_buku".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $buku_id
 * @property string|null $ulasan
 * @property int|null $rating
 *
 * @property Buku $buku
 * @property User $user
 */
class UlasanBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ulasan_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'buku_id', 'rating'], 'integer'],
            [['ulasan'], 'string'],
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
            'user_id' => 'User',
            'buku_id' => 'Buku',
            'ulasan' => 'Ulasan',
            'rating' => 'Rating',
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
