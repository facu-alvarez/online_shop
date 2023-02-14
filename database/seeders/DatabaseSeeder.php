<?php

namespace Database\Seeders;

use Domains\Catalog\Models\Variant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Variant::factory(50)->create();
    }
}
