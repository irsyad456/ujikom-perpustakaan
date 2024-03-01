<?php
// Example: fixtures/LoadFixtures.php
namespace app\fixtures;

use yii\test\FixtureTrait;
use app\fixtures\BukuFixture;

class LoadFixtures
{
    use FixtureTrait;

    public function loadAllFixtures()
    {
        // Load fixtures here
        $this->loadFixture(BukuFixture::class);
    }
}

// Run this command to load all fixtures:
// yii load-fixtures/load-all-fixtures
