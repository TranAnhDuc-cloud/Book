<?php

use App\BookRecord;
use Illuminate\Database\Seeder;

class BookRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\BookRecord::class,50)->create();
    }
}
