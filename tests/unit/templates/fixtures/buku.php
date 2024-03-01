<?php

$faker = Faker\Factory::create();

return [
    'judul' => $faker->word(),
    'penulis' => $faker->firstName(),
    'penerbit' => $faker->company(),
    'tahunTerbit' => $faker->date()
];
