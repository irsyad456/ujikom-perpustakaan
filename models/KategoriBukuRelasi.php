<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_buku_relasi".
 *
 * @property int $id
 * @property int|null $buku_id
 * @property int|null $kategoribuku_id
 *
 * @property Buku $buku
 * @property KategoriBuku $kategoribuku
 */
class KategoriBukuRelasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_buku_relasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buku_id', 'kategoribuku_id'], 'required'],
            [['buku_id', 'kategoribuku_id'], 'integer'],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::class, 'targetAttribute' => ['buku_id' => 'id']],
            [['kategoribuku_id'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriBuku::class, 'targetAttribute' => ['kategoribuku_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buku_id' => 'Book id',
            'kategoribuku_id' => 'Book category',
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
     * Gets query for [[Kategoribuku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategoribuku()
    {
        return $this->hasOne(KategoriBuku::class, ['id' => 'kategoribuku_id']);
    }
}
