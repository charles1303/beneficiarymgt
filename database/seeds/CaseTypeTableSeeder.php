<?php

use Illuminate\Database\Seeder;
use App\Model\CaseType;

class CaseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CaseType::create(['description' => 'Medical']);
        CaseType::create(['description' => 'Tuition']);
        CaseType::create(['description' => 'Empowerment']);
        CaseType::create(['description' => 'Accommodation']);
    }
}
