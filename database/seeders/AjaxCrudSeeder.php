<?php

namespace Database\Seeders;

use App\Models\AjaxCrud;
use Illuminate\Database\Seeder;

class AjaxCrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AjaxCrud::factory()->count(50)->create();
    }
}
