<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Group;
use App\Models\Position;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Answer::factory(10)->create();
        Company::factory(1)->create();
        Employee::factory(50)->create();
        Feedback::factory(150)->create();
        Group::factory(5)->create();
        Position::factory(20)->create();
        Quiz::factory(10)->create();

        $answers = Answer::all();

        foreach (Quiz::all() as $quiz) {
            $quiz->answers()->attach($answers->random());
        }
    }
}
