<?php

namespace Database\Factories;

use App\Models\course;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = course::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name' => $this->faker->jobTitle(),
      'professor_id' => Professor::all()->random()->id,
      'user_id' => User::all()->random()->id,
    ];
  }
}
