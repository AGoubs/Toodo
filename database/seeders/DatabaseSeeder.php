<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Professor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->create([
      'name' => 'admin',
      'email' => 'admin@softui.com',
      'password' => Hash::make('secret')
    ]);
    Professor::factory(5)->create();
    Course::factory(5)->create();
    Lesson::factory(100)->create();
  }
}
