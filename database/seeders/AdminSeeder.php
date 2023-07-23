<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'email_verified_at' => now(),
      'password' => '$2y$10$dvIROOHeN9pDW6gKxeB/tuaXy.LOKS6W09eCSb7zODYyD8JZtPliu', // password
    ])->assignRole('writer', 'admin');
  }
}