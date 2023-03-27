<?php

namespace Database\Seeders;

use App\Models\User;
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
    User::create([
      'login' => 'admin@chess.tj',
      'role' => 'admin',
      'password' => bcrypt('aHq7UoXD'),
    ]);

    $this->call([
      NewsSeeder::class,
      ArticlesSeeder::class,
      PlayersSeeder::class,
      TournamentsSeeder::class,
    ]);
  }
}
