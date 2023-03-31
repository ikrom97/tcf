<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'login' => 'admin@chess.tj',
      'role' => 'admin',
      'password' => bcrypt('aHq7UoXD'),
    ]);
  }
}
