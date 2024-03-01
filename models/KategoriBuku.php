<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_buku".
 *
 * @property int $id
 * @property string|null $namaKategori
 *
 * @property KategoriBukuRelasi[] $kategoriBukuRelasis
 */
class KategoriBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namaKategori'], 'string', 'max' => 255],
            [['namaKategori'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namaKategori' => 'Nama Kategori',
        ];
    }

    /**
     * Gets query for [[KategoriBukuRelasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriBukuRelasis()
    {
        return $this->hasMany(KategoriBukuRelasi::class, ['kategoribuku_id' => 'id']);
    }
}
