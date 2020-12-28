<?php

use Illuminate\Database\Seeder;
use App\PassportId;

class PassportIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PassportId::class, 10)->create();
    }
}
