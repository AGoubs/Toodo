<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = professor::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'firstname' => $this->faker->firstName(),
      'lastname' => $this->faker->lastName(),
      'photo' => $this->faker->url(),
      'user_id' => User::all()->random()->id,
    ];
  }
}
