<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string|null $judul
 * @property string|null $penulis
 * @property string|null $penerbit
 * @property string|null $tahunTerbit
 *
 * @property KategoriBukuRelasi[] $kategoriBukuRelasis
 * @property KoleksiPribadi[] $koleksiPribadis
 * @property Peminjaman[] $peminjamen
 * @property UlasanBuku[] $ulasanBukus
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahunTerbit'], 'safe'],
            [['judul', 'penulis', 'penerbit', 'tahunTerbit'], 'required'],
            [['judul', 'penulis', 'penerbit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'penulis' => 'Penulis',
            'penerbit' => 'Penerbit',
            'tahunTerbit' => 'Tahun Terbit',
        ];
    }

    /**
     * Gets query for [[KategoriBukuRelasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriBukuRelasis()
    {
        return $this->hasOne(KategoriBukuRelasi::class, ['buku_id' => 'id']);
    }

    /**
     * Gets query for [[KoleksiPribadis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKoleksiPribadis()
    {
        return $this->hasMany(KoleksiPribadi::class, ['buku_id' => 'id']);
    }

    /**
     * Gets query for [[Peminjamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::class, ['buku_id' => 'id']);
    }

    /**
     * Gets query for [[UlasanBukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUlasanBukus()
    {
        return $this->hasMany(UlasanBuku::class, ['buku_id' => 'id']);
    }
}
