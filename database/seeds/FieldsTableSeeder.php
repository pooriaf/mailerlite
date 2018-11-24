<?php

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Field::class, 10)->create();
    }
}
