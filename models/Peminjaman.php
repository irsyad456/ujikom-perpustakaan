<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $buku_id
 * @property string|null $tanggal_peminjaman
 * @property string|null $tanggal_pengembalian
 * @property string|null $status_peminjaman
 *
 * @property Buku $buku
 * @property User $user
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'buku_id'], 'integer'],
            [['tanggal_peminjaman', 'tanggal_pengembalian'], 'safe'],
            ['tanggal_pengembalian', 'compare', 'compareAttribute' => 'tanggal_peminjaman', 'operator' => '>'],
            [['status_peminjaman'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::class, 'targetAttribute' => ['buku_id' => 'id']],
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
            'buku_id' => 'Book',
            'tanggal_peminjaman' => 'Borrow date',
            'tanggal_pengembalian' => 'Return date',
            'status_peminjaman' => 'Borrow status',
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
