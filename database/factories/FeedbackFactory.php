<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer_id' => rand(1, 10),
            'comment' => $this->faker->text(30),
            'quiz_id' => rand(1, 10),
            'employee_id' => rand(1, 50)
        ];
    }
}
