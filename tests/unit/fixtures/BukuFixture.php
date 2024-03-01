<?php

namespace tests\unit\fixtures;

use Faker\Generator;
use yii\test\ActiveFixture;

class BukuFixture extends ActiveFixture
{
    // The Model For It's Seeders
    public $modelClass = 'app\models\Buku';

    // Total Data To Generate
    public $totalCount = 10;

    // Faker Generator
    public $dataGenerator;

    public function init()
    {
        $this->dataFile = __DIR__ . '/data/buku.php';
        parent::init();
        $this->dataGenerator = new Generator();
    }

    protected function generateBookTitle()
    {
        return $this->dataGenerator->sentence();
    }

    protected function generateName()
    {
        return $this->dataGenerator->name();
    }

    protected function getRandomDate()
    {
        $startDate = strtotime('2024-01-01');
        $endDate = strtotime('2024-01-29');

        return date('Y-m-d', mt_rand($startDate, $endDate));
    }
}
