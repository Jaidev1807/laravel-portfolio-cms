<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Education;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Skill::truncate();
        Experience::truncate();
        Project::truncate();
        
        User::factory()->count(2)->create();
        Skill::factory()->count(1)->create();
        Project::factory()->count(4)->create();
        Experience::factory()->count(2)->create();
    }
}
